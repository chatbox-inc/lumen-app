<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2016/08/06
 * Time: 3:21
 */

namespace Chatbox\RestApp;


use Chatbox\Message\Storage\Eloquent\MessageService;

class Message2 extends MessageService
{
    protected $table = "cb_message2";
}