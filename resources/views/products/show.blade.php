@extends('layouts.app')

@section('content')

<style>

/* 商品名・値段と同じ幅 */
.input-text{
width:300px;
padding:6px;
}

/* 商品説明（横幅＋高さを広げる） */
.description-box{
width:640px;
height:120px;
padding:6px;
}

/* 商品説明エリア */
.description-area{
margin-top:20px;
}

.delete-icon{
font-size:24px;
color:#ff4d4d;
position:absolute;
right:370px;
background:none;
border:none;
cursor:pointer;
}

</style>

<div class="detail-container">

    <!-- 上段：画像 + 商品情報 -->
    <div class="top-area" style="display: flex; gap: 40px;">

        <!-- 左：画像 -->
        <div class="image-area" style="flex: 1;">
            <img src="/images/{{ $product->image }}" class="product-img" style="width: 100%; max-width: 300px;">
        </div>

        <!-- 右：商品情報 -->
        <div class="info-area" style="flex: 2;">

            <div class="form-group">
                <label>商品名</label><br>
                <input type="text" value="{{ $product->name }}" class="input-text">
            </div>

            <div class="form-group" style="margin-top: 20px;">
                <label>値段</label><br>
                <input type="text" value="{{ $product->price }}" class="input-text">
            </div>

            <div class="form-group" style="margin-top: 20px;">
                <label>季節</label><br>
                <input type="radio" name="season" {{ $product->season == '春' ? 'checked' : '' }}> 春
                <input type="radio" name="season" {{ $product->season == '夏' ? 'checked' : '' }}> 夏
                <input type="radio" name="season" {{ $product->season == '秋' ? 'checked' : '' }}> 秋
                <input type="radio" name="season" {{ $product->season == '冬' ? 'checked' : '' }}> 冬
            </div>

        </div>

    </div>

    <!-- 下段：ファイル選択 + 商品説明 -->
    <div class="bottom-area" style="margin-top: 40px;">

        <label class="file-btn">
            ファイルを選択
            <input type="file" name="image">
        </label>

        <div class="description-area">
            <label><strong>商品説明</strong></label><br>
            <textarea class="description-box">{{ $product->description }}</textarea>
        </div>

        <div class="button-area">

<a href="/products" class="btn-back">
戻る
</a>

<button class="btn-save">
変更を保存
</button>

<form action="/products/{{ $product->id }}" method="POST">
@csrf
@method('DELETE')

<button type="submit" class="delete-icon"
onclick="return confirm('本当に削除しますか？')">
🗑
</button>

</form>

</div>

    </div>

</div>

@endsection