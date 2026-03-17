@extends('layouts.app')

@section('content')

<style>

/* 現在ページをオレンジ色 */
.page-number.active{
    background:#f7b500;
    color:white;
}

</style>

<h1 class="title">商品一覧</h1>

<div class="layout">

<!-- サイドバー -->
<div class="sidebar">

<form method="GET" action="/products" onsubmit="return checkSearch()">

<input type="text" 
name="keyword" 
id="keyword"
placeholder="商品名で検索" 
value="{{ request('keyword') }}">

<p id="search-error" style="color:red; font-size:14px; display:none;">
商品名を入力してください
</p>

<button class="search-btn">検索</button>

</form>

<h3>価格順で表示</h3>

<form method="GET" action="/products">

<input type="hidden" name="keyword" value="{{ request('keyword') }}">

<select name="sort">

<option value="">価格で並び替え</option>

<option value="high" {{ request('sort') == 'high' ? 'selected' : '' }}>
高い順
</option>

<option value="low" {{ request('sort') == 'low' ? 'selected' : '' }}>
安い順
</option>

</select>

<button class="search-btn">並び替え</button>

</form>

</div>


<!-- 商品一覧 -->
<div class="products">

@foreach($products as $product)

<a href="/products/{{ $product->id }}">

<div class="card">

<img src="{{ asset('images/' . $product->image) }}" alt="">

<div class="card-body">

<p>{{ $product->name }}</p>

<p>¥{{ number_format($product->price) }}</p>

</div>

</div>

</a>

@endforeach

</div>

</div>


<!-- pagination -->
<div class="pagination">

@if ($products->onFirstPage())
<span class="page-arrow">‹</span>
@else
<a class="page-arrow" href="{{ $products->previousPageUrl() }}">‹</a>
@endif


@for ($i = 1; $i <= $products->lastPage(); $i++)

@if ($i == $products->currentPage())

<span class="page-number active">
{{ $i }}
</span>

@else

<a class="page-number" href="{{ $products->url($i) }}">
{{ $i }}
</a>

@endif

@endfor


@if ($products->hasMorePages())
<a class="page-arrow" href="{{ $products->nextPageUrl() }}">›</a>
@else
<span class="page-arrow">›</span>
@endif

</div>


<script>

function checkSearch(){

const keyword = document.getElementById("keyword").value.trim();
const error = document.getElementById("search-error");

if(keyword === ""){
    error.style.display = "block";
    return false;
}

error.style.display = "none";
return true;

}

</script>

@endsection