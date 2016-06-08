# Lumen Applications Template 

[![Deploy](https://www.herokucdn.com/deploy/button.png)](https://heroku.com/deploy)

````
$ composer create-project chatbox-inc/lumen myProject dev-master --prefer-dist
````

## 基本方針

Lumenアプリケーション構築スケルトンとして。

各種サービス・プロバイダの機能は以下を参照
https://github.com/chatbox-inc/lumen-providers

Submodule化してもルートファイルが多くて何かと不便なので、Submodule対応は進めない方向で。

### 参照

デフォルトのConfigなど
https://github.com/laravel/lumen-framework/tree/master/config

初期構築ファイルは
https://github.com/laravel/lumen


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



