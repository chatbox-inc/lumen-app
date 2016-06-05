<?php

require_once __DIR__.'/../vendor/autoload.php';

try {
    (new \Dotenv\Dotenv(__DIR__.'/../'))->load();
} catch (\Dotenv\Exception\InvalidPathException $e) {
    throw $e;
}

$app = new Laravel\Lumen\Application(
    realpath(__DIR__.'/')
);

$app->withFacades();

$app->withEloquent();

//$app->register(\Chatbox\WebHook\WebHookServiceProvider::class);


$app->get("/",function(){
    return "application sample";
});

$app->post("/",function(WebHookService $webHookService){

    $webHookService->load("");

    return $webHookService->handle();

    return [
        "status" => "OK"
    ];
});

return $app;
