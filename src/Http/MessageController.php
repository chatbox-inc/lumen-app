<?php
namespace Chatbox\Message\Http;
use Chatbox\Message\MessageServiceInterface;

/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2016/08/06
 * Time: 2:02
 */
class MessageController
{
    protected $message;

    protected $request;

    public function __construct(
        MessageServiceInterface $message,
        MessageRequest $request
    ){
        $this->request = $request;
        $this->message = $message;
    }

    public function get($id)
    {
        $message = $this->message->find($id);

        return [
            "message" => $message
        ];
    }

    public function search(){
        $conj = $this->request->getConjection();
        $page = $this->request->getPager();
        $conj["pager"] = $page;
        $messages = $this->message->fetch($conj);

        return [
            "messages" => $messages,
            "pager" => $page
        ];
    }

    public function write(){
        $message = $this->request->getMessage();
        $message = $this->message->write($message);
        return [
            "uid" => $message->getUid()
        ];
    }

    public function rewrite($uid){
        $message = $this->request->getMessage();
        $this->message->rewrite($uid,$message);
        return [];
    }

    public function delete($uid){
        $this->message->remove([
            "id" => $uid
        ]);
        return [];
    }

}