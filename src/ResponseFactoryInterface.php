<?php
namespace Chatbox\LumenApp;

use Exception;


interface ResponseFactoryInterface{

    public function renderContent($data);

    public function renderException(Exception $e);

}