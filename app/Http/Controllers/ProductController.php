<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        // 検索
        if ($request->keyword) {

            // 全角スペースを半角に変換
            $keyword = str_replace('　', ' ', $request->keyword);

            // スペースで分割
            $keywords = explode(' ', $keyword);

            $query->where(function ($q) use ($keywords) {

                foreach ($keywords as $word) {

                    if ($word !== '') {

                        $q->orWhere('name', 'like', '%' . $word . '%')
                          ->orWhere('price', 'like', '%' . $word . '%');

                    }

                }

            });
        }

        // 並び替え
        if ($request->sort == 'high') {
            $query->orderBy('price', 'desc');
        } elseif ($request->sort == 'low') {
            $query->orderBy('price', 'asc');
        }

        $products = $query->paginate(6)->appends($request->query());

        return view('products.index', compact('products'));
    }


    // 商品詳細
    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('products.show', compact('product'));
    }


    // 商品編集画面
    public function edit($id)
    {
        $product = Product::findOrFail($id);

        return view('products.edit', compact('product'));
    }


    // 商品更新処理
    public function update(Request $request, $id)
    {

        // バリデーション
        $request->validate([

            'name' => 'required',

            'price' => 'required|numeric|between:0,10000',

            'season' => 'required',

            'image' => 'required|mimes:png,jpeg',

            'description' => 'required|max:120',

        ], [

            'name.required' => '商品名を入力してください',

            'season.required' => '季節を選択して下さい',

            'image.required' => '商品画像を登録してください',
            'image.mimes' => '.png または .jpeg 形式でアップロードしてください',

            'description.required' => '商品説明を入力してください',
            'description.max' => '120文字以内で入力してください',

        ]);


        $product = Product::findOrFail($id);

        // 季節（複数チェック対応）
        $season = $request->season ? implode(',', $request->season) : null;

        // 画像アップロード対応
        if ($request->hasFile('image')) {

            $file = $request->file('image');

            $filename = time() . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('images'), $filename);

            $product->image = $filename;
        }

        // 更新
        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'season' => $season,
            'description' => $request->description,
        ]);

        // 一覧へ戻る
        return redirect('/products');
    }
    public function destroy(Product $product)
{
    $product->delete();
    return redirect('/products');
}
}