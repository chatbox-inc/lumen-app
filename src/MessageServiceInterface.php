<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2016/08/06
 * Time: 1:37
 */

namespace Chatbox\Message;

/**
 * Interface MessageServiceInterface
 * @package Chatbox\Message
 */
interface MessageServiceInterface
{

    /**
     * メッセージの取得
     * @return mixed
     */
    public function find($_uid):MessageInterface;

    /**
     * メッセージの検索
     * @return mixed
     */
    public function fetch(array &$conj):array;

    /**
     * メッセージの発行
     * @return mixed
     */
    public function write(array $message=[]):MessageInterface;

    /**
     * メッセージの更新
     * @return mixed
     */
    public function rewrite($_uid,array $message);

    /**
     * メッセージの削除
     * @return mixed
     */
    public function remove(array $conj);
}

class MessageServiceException extends \Exception{}