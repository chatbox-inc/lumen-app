<?php
namespace Chatbox\Message;
use Illuminate\Support\ServiceProvider;
use Chatbox\Message\Http\MessageController;

/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2016/08/06
 * Time: 1:36
 */
abstract class MessageServiceProvider extends ServiceProvider
{
    protected $key = "message";

    protected $default = true;

    protected $controllerName = MessageController::class;
    /**
     * 定義するもの
     *
     * - インターフェイス
     * - HTTP API
     *
     */
    public function register()
    {
        $this->setRoute($this->app);
        $this->app->singleton($this->key,function(){
            return $this->getMessageService();
        });
        $this->app->alias(get_class($this),$this->key);
        if($this->default){
            $this->app->singleton(MessageServiceInterface::class,function(){
                return $this->getMessageService();
            });
        }
    }


    public function setRoute($app){
        // 単一メッセージの取得
        $entry = $this->default?"message":"message/{$this->key}";
        $app->get("/{$entry}/{uid}",$this->controllerName."@get");
        // 複数メッセージの取得
        $app->get("/{$entry}/",$this->controllerName."@search");
        // メッセージの投稿
        $app->post("/{$entry}/",$this->controllerName."@write");
        // メッセージの更新
        $app->put("/{$entry}/{uid}",$this->controllerName."@rewrite");
        // メッセージの削除
        $app->delete("/{$entry}/{uid}",$this->controllerName."@delete");
    }

    abstract public function getMessageService():MessageServiceInterface;

}