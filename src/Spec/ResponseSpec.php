<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2016/08/07
 * Time: 17:49
 */

namespace Chatbox\Message\Spec;


trait ResponseSpec
{
    public function isOk(){
        assert($this->response()->getStatusCode() === 200);
    }

}