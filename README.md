# Lumen Applications Template 

[![Deploy](https://www.herokucdn.com/deploy/button.png)](https://heroku.com/deploy)

````
$ composer create-project chatbox-inc/lumen myProject dev-master --prefer-dist
````

## 基本方針

REST APIアプリケーション構築スケルトンとして。

backend ディレクトリはフレームワーク層として極力触らない形で。

index.php などのファイル側でServiceProviderを差し込みアプリケーションを定義出来るように。

config ディレクトリは完全に取っ払ってしまっているので、
デフォルトのディレクトリ設定などは以下のURLを参照。

https://github.com/laravel/lumen-framework/tree/master/config

初期構築ファイルは

https://github.com/laravel/lumen

を参照。

### bootstrap.php

参照パスの固定などartisanも含む全アプリケーションで共通の設定のみ行う。


## Packages

- Lumen Framework
- psysh http://psysh.org/#install
- IDE HELPER 
- homestead 
- CORS 対応 barryvdh/laravel-cors

### homestead

PHP7による環境構築。以下のコマンドでサーバ起動が可能

````
$ vendor/bin/homestead make
$ vagrant up
````

### IDE HELPER

````
$ php artisan ide-helper:generate
$ php artisan ide-helper:meta
````

参考：http://qiita.com/mikakane/items/f763bb5738886cc532fe


### barryvdh/laravel-cors

https://github.com/barryvdh/laravel-cors

CORS対応のためのモジュール

利用には以下の記述が必要

````
$app->register(\Barryvdh\Cors\LumenServiceProvider::class);
$app->config("cors");
````



