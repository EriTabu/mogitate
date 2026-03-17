<!DOCTYPE html>

<html lang="ja">

<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="/css/style.css">
<title>mogitate</title>

<style>

body{
background:#f5f5f5;
margin:0;
font-family:Arial, Helvetica, sans-serif;
}

/* ヘッダー */

.header{
background:white;
padding:20px 40px;
border-bottom:1px solid #eee;
}

.logo{
color:#f7b500;
font-size:28px;
font-family:serif;
font-style:italic;
}

/* コンテンツ */

.container{
max-width:1200px;
margin:0 auto;
padding:30px;
}

/* タイトル */

.title{
font-size:28px;
margin-bottom:20px;
text-align:center;
}

/* レイアウト */

.layout{
display:flex;
gap:40px;
align-items:flex-start;
}

/* サイドバー */

.sidebar{
width:250px;
background:white;
padding:20px;
border-radius:10px;
box-shadow:0 2px 8px rgba(0,0,0,0.05);
}

/* 検索フォーム */

.sidebar input{
width:100%;
padding:10px;
border:1px solid #ddd;
border-radius:5px;
margin-bottom:10px;
box-sizing:border-box;
}

.sidebar select{
width:100%;
padding:10px;
border:1px solid #ddd;
border-radius:5px;
margin-top:10px;
margin-bottom:10px;
box-sizing:border-box;
}

.search-btn{
width:100%;
background:#f7b500;
border:none;
padding:10px;
border-radius:5px;
color:white;
font-weight:bold;
cursor:pointer;
}

.sidebar button{
width:100%;
background:#f7b500;
border:none;
padding:10px;
border-radius:5px;
color:white;
font-weight:bold;
cursor:pointer;
}

/* 商品グリッド */

.products{
flex:1;
display:grid;
grid-template-columns:repeat(3,1fr);
gap:25px;
}

/* 商品カード */

.card{
background:white;
border-radius:12px;
overflow:hidden;
box-shadow:0 4px 10px rgba(0,0,0,0.05);
transition:0.2s;
}

.card:hover{
transform:translateY(-3px);
}

.card img{
width:100%;
height:220px;
object-fit:cover;
}

.card-body{
display:flex;
justify-content:space-between;
padding:15px;
font-size:16px;
color:#333;
}

/* 商品リンク */

.products a{
text-decoration:none;
color:#333;
}

/* pagination */

.pagination{
display:flex;
justify-content:center;
align-items:center;
gap:10px;
margin-top:40px;
}

.pagination svg{
width:18px;
}

.pagination span,
.pagination a{
display:flex;
align-items:center;
justify-content:center;
width:36px;
height:36px;
border-radius:50%;
background:white;
box-shadow:0 2px 4px rgba(0,0,0,0.08);
text-decoration:none;
color:#333;
font-size:14px;
}

.pagination .active span{
background:#f7b500;
color:white;
}

.pagination a:hover{
background:#f0f0f0;
}

/* ===============================
商品詳細ページ
=============================== */

.product-detail{
max-width:900px;
margin:0 auto;
}

.detail-top{
display:flex;
gap:60px;
align-items:flex-start;
margin-top:30px;
}

.product-image img{
width:350px;
border-radius:10px;
}

/* 商品情報 */

.product-info{
flex:1;
}

.product-info label{
display:block;
margin-top:15px;
font-weight:bold;
}

.product-info input{
width:400px;
padding:8px;
margin-top:5px;
border:1px solid #ddd;
border-radius:5px;
}

/* 季節 */

.season{
margin-top:10px;
}

/* ファイル選択 */

.file-select{
margin-top:20px;
}

/* 商品説明 */

.description{
margin-top:20px;
}

.description textarea{
width:400px;
height:120px;
border:1px solid #ddd;
border-radius:5px;
padding:10px;
resize:none;
}

/* ボタン */

.button-area{
display:flex;
justify-content:center;
align-items:center;
gap:20px;
margin-top:30px;
}

.btn-back{
background:#ddd;
padding:10px 40px;
border-radius:6px;
text-decoration:none;
color:#333;
}

.btn-save{
background:#f7b500;
border:none;
padding:10px 40px;
border-radius:6px;
color:white;
font-weight:bold;
cursor:pointer;
}

.delete-icon{
margin-left:30px;
font-size:22px;
color:red;
cursor:pointer;
}

</style>

</head>

<body>

<header class="header">
<div class="logo">
<a href="/products" style="text-decoration:none; color:#f7b500;">
mogitate
</a>
</div>
</header>

<div class="container">

@yield('content')

</div>

</body>

</html>
