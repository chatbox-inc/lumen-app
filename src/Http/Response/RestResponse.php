<?php
namespace Chatbox\LumenApp\Http\Response;
use Chatbox\LumenApp\ResponseFactoryInterface;
use Exception;
use Illuminate\Http\JsonResponse;

/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2016/08/08
 * Time: 1:25
 */
class RestResponse implements ResponseFactoryInterface
{
    public function renderContent($data)
    {
        // TODO: Implement renderContent() method.
    }

    public function renderException(Exception $e)
    {
        // TODO: Implement renderException() method.
    }

    public function make($status,array $body=[],array $header=[]){
        return JsonResponse::create($body,$status,$header);
    }

    protected function defaultHeader(){
        return [];
    }

    public function ok(array $body=[]){
        $body["status"] = "OK";
        return $this->make(200,$body,$this->defaultHeader());
    }

    public function bad(array $body=[]){
        $body["status"] = "BAD";
        return $this->make(400,$body,$this->defaultHeader());
    }

    public function error(array $body=[]){
        $body["status"] = "ERROR";
        return $this->make(500,$body,$this->defaultHeader());
    }

}