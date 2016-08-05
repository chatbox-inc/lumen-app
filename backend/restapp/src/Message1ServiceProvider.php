<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2016/08/06
 * Time: 3:21
 */

namespace Chatbox\RestApp;


use Chatbox\Message\MessageServiceProvider;
use Chatbox\Message\MessageServiceInterface;

class Message1ServiceProvider extends MessageServiceProvider
{
    public function getMessageService():MessageServiceInterface
    {
        return new Message1();
    }
}