<?php
namespace Chatbox\RestApp;

use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use Chatbox\Lumen\Http\Middlewares\RestAPIMiddleware;
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2016/06/05
 * Time: 23:37
 */
class RestApiServiceProvider extends ServiceProvider
{
    public function register()
    {
        $app = $this->app;

        $app->group([
            "middleware" => RestAPIMiddleware::class
        ],function($router){
            $router->get("/api/master",function(){
                return ["hoge"=>"piyo"];
            });

            $router->get("/api/error",function(){
                throw new \Exception();
            });
        });

    }

}