<?php
namespace Chatbox\PageApp;

use Chatbox\Lumen\Providers\SessionServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\FileViewFinder;
use Illuminate\Session\Middleware\StartSession;
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2016/06/05
 * Time: 23:37
 */
class PageAppServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->extend('view.finder', function (FileViewFinder $finder) {
            $finder->addLocation(__DIR__."/../views/");
            return $finder;
        });
        $this->app->register(SessionServiceProvider::class);

        // start session is terminable and it should be registered as global
        $this->app->middleware([
            StartSession::class
        ]);

        $app = $this->app;

        $app->group([
        ],function($router){
            $router->get("/",function(Request $request){
                $counter = $request->session()->get("counter",5);
                $request->session()->put("counter",$counter+1);
                return view("welcome",[
                    "counter" => $counter
                ]);
            });
        });

    }

}