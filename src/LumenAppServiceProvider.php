<?php
namespace Chatbox\LumenApp;
use Chatbox\LumenApp\Http\Response\APIResponse;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Support\ServiceProvider;
use Chatbox\LumenApp\Exceptions\Handler;


/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2016/08/08
 * Time: 1:37
 */
class LumenAppServiceProvider extends ServiceProvider
{
    public function register()
    {
        $app = $this->app;
        $this->registerResponseFactory($app);
        $this->registerExceptionHadler($app);
    }

    protected function registerResponseFactory($app){
        $app->singleton(ResponseFactoryInterface::class,function(){
            return new APIResponse();
        });
    }

    protected function registerExceptionHadler($app){
        $app->singleton(ExceptionHandler::class,Handler::class);
    }
}