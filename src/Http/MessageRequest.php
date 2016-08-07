<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2016/08/06
 * Time: 2:05
 */

namespace Chatbox\Message\Http;


use Illuminate\Http\Request;
use Illuminate\Validation\Factory;
use Illuminate\Validation\ValidationException;

class MessageRequest
{
    protected function request():Request{
        return app(Request::class);
    }

//    public function getUid(){
//        $uid = $this->request()->route("uid");
//        return $this->validate("uid",$uid,[
//            "uid" => "string"
//        ]);
//    }

    public function getConjection(){
        $conj = $this->request()->get("conj",[]);
        return $this->validate("conj",$conj,[
            "conj" => "array"
        ]);
    }

    public function getPager(){
        $pager = $this->request()->get("pager",[]);
        return $this->validate("pager",$pager,[
            "pager" => "array"
        ]);
        return $pager;
    }

    public function getMessage(){
        $mes = $this->request()->get("message");
        return $this->validate("message",$mes,[
            "message" => "array"
        ]);
    }

    protected function validate($key,$value,$rules,$message=[]){
        /** @var Factory $validator */
        $validator = app("validator");
        $val = $validator->make([
            $key => $value
        ],$rules,$message);
        if($val->passes()){
            return $value;
        }else{
            throw new ValidationException($val);
        }
    }


}