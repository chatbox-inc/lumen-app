<?php

require_once __DIR__.'/../vendor/autoload.php';

try {
    (new \Dotenv\Dotenv(__DIR__.'/../'))->load();
} catch (\Dotenv\Exception\InvalidPathException $e) {
    throw $e;
}

$app = new Laravel\Lumen\Application(
    realpath(__DIR__.'/app')
);

$app->withFacades();

$app->withEloquent();

$app->singleton(\Illuminate\Contracts\Debug\ExceptionHandler::class,function(){
    $handler = new \Chatbox\Lumen\Exceptions\Handler();
    // set your Reporters;
    return $handler;
});

$app->register(\Chatbox\PageApp\PageAppServiceProvider::class);
$app->register(\Chatbox\RestApp\RestApiServiceProvider::class);

return $app;
