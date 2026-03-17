@extends('layouts.app')

@section('content')

<style>

.season-group input[type="checkbox"]{
appearance:none;
width:16px;
height:16px;
border:2px solid #999;
border-radius:50%;
display:inline-block;
position:relative;
}

.season-group input[type="checkbox"]:checked{
border:5px solid #2b7cff;
}

</style>

<div class="container">

<p style="color:#5aa9e6;">商品一覧 ＞ {{ $product->name }}</p>

<form action="/products/{{ $product->id }}" method="POST" enctype="multipart/form-data">

@csrf
@method('PUT')

<div style="display:flex; gap:60px; align-items:flex-start; margin-top:30px;">

<!-- 左側画像 -->
<div>

<img src="/images/{{ $product->image }}" width="300">

<br><br>

<label style="padding:8px 16px; background:#eee; cursor:pointer;">
ファイルを選択
<input type="file" name="image" style="display:none;">
</label>

<span style="margin-left:10px;">
{{ $product->image }}
</span>

<br>

@error('image')
<p style="color:red; font-size:14px; margin-top:6px;">商品画像を登録してください</p>
<p style="color:red; font-size:14px; margin-top:2px;">「.png」または「.jpeg」形式でアップロードしてください</p>
@enderror

</div>


<!-- 右側フォーム -->
<div style="width:400px;">

<p>商品名</p>

@error('name')
<p style="color:red;">{{ $message }}</p>
@enderror

<input type="text"
name="name"
value="{{ old('name',$product->name) }}"
style="width:100%; padding:10px; border:1px solid #ddd; border-radius:6px;">


<p style="margin-top:20px;">値段</p>

@if($errors->has('price'))
<p style="color:red;">値段を入力してください</p>
<p style="color:red;">数値で入力してください</p>
<p style="color:red;">0～10000円以内で入力してください</p>
@endif

<input type="text"
name="price"
value="{{ old('price',$product->price) }}"
style="width:100%; padding:10px; border:1px solid #ddd; border-radius:6px;">


<p style="margin-top:20px;">季節</p>

<div class="season-group">

<label>
<input type="checkbox" name="season[]" value="春"
{{ str_contains($product->season,'春') ? 'checked' : '' }}>
春
</label>

<label style="margin-left:20px;">
<input type="checkbox" name="season[]" value="夏"
{{ str_contains($product->season,'夏') ? 'checked' : '' }}>
夏
</label>

<label style="margin-left:20px;">
<input type="checkbox" name="season[]" value="秋"
{{ str_contains($product->season,'秋') ? 'checked' : '' }}>
秋
</label>

<label style="margin-left:20px;">
<input type="checkbox" name="season[]" value="冬"
{{ str_contains($product->season,'冬') ? 'checked' : '' }}>
冬
</label>

</div>

@error('season')
<p style="color:red;">{{ $message }}</p>
@enderror


<p style="margin-top:20px;">商品説明</p>

<textarea
name="description"
style="width:100%; height:120px; padding:10px; border:1px solid #ddd; border-radius:6px;"
>{{ old('description',$product->description) }}</textarea>

@if($errors->has('description'))
<p style="color:red;">商品説明を入力してください</p>
<p style="color:red;">120文字以内で入力してください</p>
@endif


<br><br>

<div style="display:flex; gap:20px; align-items:center;">

<a href="/products/{{ $product->id }}"
style="padding:10px 40px; background:#eee; text-decoration:none; color:black; border-radius:6px;">
戻る
</a>

<button
type="submit"
style="padding:10px 40px; background:#f5b800; border:none; border-radius:6px;">
変更を保存
</button>

</div>

</div>

</div>

</form>


<form action="/products/{{ $product->id }}" method="POST"
style="margin-top:20px; text-align:right;">

@csrf
@method('DELETE')

<button
onclick="return confirm('本当に削除しますか？')"
style="background:none; border:none; font-size:22px; color:red;">
🗑
</button>

</form>

</div>

@endsection