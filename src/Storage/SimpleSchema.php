<?php
namespace Chatbox\Message\Storage;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Schema\Builder;


/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2016/08/06
 * Time: 2:25
 */
trait SimpleSchema
{
    public function up(Builder $schema)
    {
        $schema->create($this->table,function(Blueprint $blueprint){
            $blueprint->increments("id");
            $blueprint->string("code")->unique();
            $blueprint->string("from");
            $blueprint->string("to");
            $blueprint->text("body");
            $blueprint->timestamps();
        });
    }

    public function down(Builder $schema)
    {
        $schema->dropIfExists($this->table);
    }

}