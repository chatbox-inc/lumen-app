<?php

require_once __DIR__.'/../vendor/autoload.php';

$app = new Laravel\Lumen\Application(
    realpath(__DIR__)
);

$app->withFacades();

$app->withEloquent();

$app->singleton(\Illuminate\Contracts\Debug\ExceptionHandler::class,function(){
    $handler = new \Chatbox\Lumen\Exceptions\Handler();
    // set your Reporters;
    return $handler;
});

$app->register(\Chatbox\LumenApp\LumenAppServiceProvider::class);

$app->get("/",function(){
    return [
        "message" => "hello lumen application "
    ];
});

return $app;
