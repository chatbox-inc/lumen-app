<?php
namespace Chatbox\Message\Storage\Eloquent;
use Chatbox\Message\MessageInterface;
use Chatbox\Message\MessageNotFoundException;
use Chatbox\Message\MessageServiceException;
use Chatbox\Message\MessageServiceInterface;
use Chatbox\Message\Storage\SimpleSchema;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Factory;
use Illuminate\Validation\ValidationException;

/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2016/08/06
 * Time: 2:51
 */
class MessageService extends Model implements MessageServiceInterface, MessageInterface
{
    use SimpleSchema;

    protected $table = "cb_message";

    protected $fillable = ["code","from","to","body"];

    public function getUid()
    {
        return $this->code;
    }

    public function find($_uid):MessageInterface
    {
        $message = $this->where("code",$_uid)->first();
        if($message){
            return $message;
        }else{
            throw new MessageNotFoundException("message not found");
        }
    }

    public function fetch(array &$conj):array
    {
        $conj = array_intersect_key($conj,array_flip(["from","to","body"]));

        return $this->where($conj)->take(30)->get()->all();
    }

    public function write(array $message = []):MessageInterface
    {
        $message["code"] = sha1(mt_rand());
        $message["body"] = json_encode(array_get($message,"body"));
        $message = $this->validate($message);
        return $this->create($message);
    }

    public function rewrite($_uid, array $message)
    {
        $message["body"] = json_encode($message["body"]);
        $message = $this->validate($message);
        $message = $this->find($_uid);
        if($message){
            $message->update($message);
            return true;
        }else{
            return false;
        }
    }

    public function remove(array $conj)
    {
        $message = $this->find(array_get($conj,"id"));
        if($message){
            $message->delete();
            return true;
        }else{
            return false;
        }
    }

    protected function validate(array $message){
        $rules = [
            "code" => ["required","string"],
            "from" => ["required","string"],
            "to" => ["required","string"],
            "body" => ["required","string"],
        ];
        /** @var Factory $validator */
        $validator = app("validator");
        $val = $validator->make($message,$rules,$message);
        if($val->passes()){
            return $message;
        }else{
            throw new ValidationException($val);
        }
    }
}