<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2016/08/06
 * Time: 2:05
 */

namespace Chatbox\Message\Http;


use Illuminate\Http\Request;

class MessageRequest
{
    protected function request():Request{
        return app(Request::class);
    }

    public function getUid(){
        $id = $this->request()->route("uid");
        return $id;
    }

    public function getConjection(){
        $id = $this->request()->get("conj");
        return $id;
    }

    public function getPager(){
        $id = $this->request()->get("pager");
        return $id;
    }

    public function getMessage(){
        $id = $this->request()->get("message");
        return $id;
    }


}