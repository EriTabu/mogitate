# mogitate（商品管理アプリ）

## 概要

mogitateは、フルーツ商品の一覧表示・検索・並び替え・登録・編集・削除を行うことができる商品管理アプリです。
Laravelを使用してCRUD機能を実装しています。

---

## 機能一覧

* 商品一覧表示
* 商品検索（商品名）
* 商品価格並び替え（高い順 / 低い順）
* 商品詳細表示
* 商品登録
* 商品編集
* 商品削除

---

## 使用技術

* PHP 8.x
* Laravel 10.x
* MySQL
* Docker
* nginx
* Blade
* CSS

---

## 環境構築

### 1. リポジトリをクローン

```
git clone https://github.com/yourname/mogitate.git
cd mogitate
```

### 2. Docker起動

```
docker compose up -d --build
```

### 3. Laravel初期設定

```
docker compose exec php bash
composer install
cp .env.example .env
php artisan key:generate
```

### 4. マイグレーション

```
php artisan migrate
```

### 5. シーディング（必要な場合）

```
php artisan db:seed
```

---

## URL

商品一覧ページ

```
http://localhost/products
```

---

## ディレクトリ構成

```
.
├ docker
├ html
│  ├ app
│  ├ bootstrap
│  ├ config
│  ├ database
│  ├ public
│  ├ resources
│  ├ routes
│  └ vendor
└ README.md
```

---

## ER図

```
+-------------+
|  products   |
+-------------+
| id          |
| name        |
| price       |
| image       |
| description |
| season      |
| created_at  |
| updated_at  |
+-------------+
```

---

## テーブル仕様

### products

| カラム名        | 型         | 説明   |
| ----------- | --------- | ---- |
| id          | bigint    | 主キー  |
| name        | varchar   | 商品名  |
| price       | integer   | 価格   |
| image       | varchar   | 商品画像 |
| description | text      | 商品説明 |
| season      | varchar   | 季節   |
| created_at  | timestamp | 作成日時 |
| updated_at  | timestamp | 更新日時 |

---

## 今後の改善

* バリデーションメッセージの改善
* UI/UXの改善
* 画像アップロードの最適化
* テストコードの追加

---
# mogitate（モギタテ）

## 概要

mogitateは、商品情報を管理するためのWebアプリケーションです。
商品を登録・編集・削除することができ、カテゴリーや旬の情報を管理することができます。

---

## 使用技術

* PHP 8.x
* Laravel 10.x
* MySQL
* Docker
* Nginx

---

## 機能一覧

* 商品一覧表示
* 商品登録
* 商品編集
* 商品削除
* 画像アップロード
* カテゴリー管理
* 旬情報管理


---

## テーブル構成

### products（商品）

| カラム名        | 型         | 説明      |
| ----------- | --------- | ------- |
| id          | bigint    | 主キー     |
| name        | string    | 商品名     |
| price       | integer   | 価格      |
| image       | string    | 商品画像    |
| description | text      | 商品説明    |
| category_id | bigint    | カテゴリーID |
| created_at  | timestamp | 作成日時    |
| updated_at  | timestamp | 更新日時    |

---

### categories（カテゴリー）

| カラム名       | 型         | 説明     |
| ---------- | --------- | ------ |
| id         | bigint    | 主キー    |
| name       | string    | カテゴリー名 |
| created_at | timestamp | 作成日時   |
| updated_at | timestamp | 更新日時   |

---

### seasons（旬）

| カラム名       | 型         | 説明   |
| ---------- | --------- | ---- |
| id         | bigint    | 主キー  |
| name       | string    | 旬    |
| created_at | timestamp | 作成日時 |
| updated_at | timestamp | 更新日時 |

---

### product_season（商品_旬）

| カラム名       | 型      | 説明   |
| ---------- | ------ | ---- |
| product_id | bigint | 商品ID |
| season_id  | bigint | 旬ID  |

---

## ER図

![ER図](ER.png)


## 作成者



ERIKO KOIKE
