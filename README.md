# Lumen アプリケーション・フレームワーク

[![Latest Stable Version](https://poser.pugx.org/chatbox-inc/lumen-app/version)](https://packagist.org/packages/chatbox-inc/lumen-app)

アプリケーションで必須の構成ResponseとExceptionをコンテナに登録する。

## 内部構造

### Exception Handler 

ExceptionHandler はデフォルトをベースに、
render側では `\Chatbox\LumenApp\RequestRendererInterface::renderException()`に例外をPassするだけの対応

例外処理に伴う切り分けの責務などは`\Chatbox\LumenApp\RequestRendererInterface`に委譲し、
ExceptionHandlerでは例外の切り替えを行うのみに徹する。

### \Chatbox\LumenApp\RequestRendererInterface

コンテンツ及び例外のRenderに関する一切の処理を司る。

Middlewareから参照して全てのContents付きResponseを整形したり、

受け取ったExceptionを処理してResponseに変換したりする。

#### `renderContent()`

暗黙のコールを仕様に含まない。

Middleware等でResponse処理の共通整形などをかける際に利用する。

#### `renderException()`

ExceptionHandler内でコールされる。

## Usage

Service Provider を登録して利用

````
$app->register(\Chatbox\LumenApp\LumenAppServiceProvider::class);
````

挙動の制御はコンテナ登録or書き換えを経由して行う。

レスポンス周りを修正する場合は`ResponseFactoryInterface::class`で修正。

````
$app->singleton(ResponseFactoryInterface::class,function(){
    return new APIResponse();
});

````