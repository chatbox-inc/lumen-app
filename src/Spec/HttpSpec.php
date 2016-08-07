<?php
namespace Chatbox\Message\Spec;
use Chatbox\Message\MessageInterface;
use Illuminate\Http\Response;

/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2016/08/07
 * Time: 17:30
 */
class HttpSpec
{
    use ResponseSpec;

    protected $lumen;

    protected $entry;

    /**
     * HttpSpec constructor.
     * @param $lumen
     */
    public function __construct($lumen,$entry="message")
    {
        $this->entry = $entry;
        $this->lumen = $lumen;
    }

    /**
     * @return Response;
     */
    public function response(){
        $response = $this->lumen->response();
        return $response;
    }

    public function get($token){
        $this->lumen->get($this->entry."/$token");
        return $this;
    }

    public function post($message){
        $this->lumen->post($this->entry,[
            "message" => $message
        ]);
        return $this;
    }

    public function put($token,$message){
        $this->lumen->put($this->entry."/$token",[
            "message" => $message
        ]);
        return $this;
    }

    public function delete($token){
        $this->lumen->delete($this->entry."/$token");
        return $this;
    }

    public function getUid(){
        $body = $this->response()->getOriginalContent();
        return array_get($body,"uid");
    }

    public function getMessage(){
        $body = $this->response()->getOriginalContent();
        return array_get($body,"message");
    }

    public function assertResponseHasUid(){
        $uid = $this->getUid();
        assert(is_string($uid));
    }

    public function assertResponseHasMessage(){
        $message = $this->getMessage();
        assert($message instanceof MessageInterface);
    }

    public function assertResponseHasException(){

    }






}