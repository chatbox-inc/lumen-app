# Lumen Applications Template 

[![Deploy](https://www.herokucdn.com/deploy/button.png)](https://heroku.com/deploy)

````
$ composer create-project chatbox-inc/lumen myProject dev-master --prefer-dist
````

## 基本方針

REST APIアプリケーション構築スケルトンとして。

アプリケーションの本体はこちらに。

https://github.com/chatbox-inc/lumen-app


を参照。

Submodule化してもルートファイルが多くて何かと不便なので、Submodule対応は進めない方向で。

### 参照

デフォルトのConfigなど
https://github.com/laravel/lumen-framework/tree/master/config

初期構築ファイルは
https://github.com/laravel/lumen

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



