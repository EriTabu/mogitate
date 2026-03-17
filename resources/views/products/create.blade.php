<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>商品追加</title>
</head>
<body>

<h1>商品追加</h1>

<form action="/products/store" method="POST">
@csrf

<p>商品名</p>
<input type="text" name="name">

<p>価格</p>
<input type="text" name="price">

<p>季節</p>

<label><input type="checkbox" name="season[]" value="春"> 春</label>
<label><input type="checkbox" name="season[]" value="夏"> 夏</label>
<label><input type="checkbox" name="season[]" value="秋"> 秋</label>
<label><input type="checkbox" name="season[]" value="冬"> 冬</label>

<p>商品説明</p>
<textarea name="description"></textarea>

<p>画像</p>
<input type="text" name="image">

<br><br>

<button type="submit">追加</button>

</form>

</body>
</html>