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

class Message2ServiceProvider extends MessageServiceProvider
{
    protected $key = "sub";

    protected $default = false;

    public function getMessageService():MessageServiceInterface
    {
        return new Message2();
    }
}