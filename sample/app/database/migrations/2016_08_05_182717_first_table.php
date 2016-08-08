<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FirstTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $schema = \Illuminate\Support\Facades\Schema::getFacadeRoot();
        (new \Chatbox\RestApp\Message1())->up($schema);
        (new \Chatbox\RestApp\Message2())->up($schema);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $schema = \Illuminate\Support\Facades\Schema::getFacadeRoot();
        (new \Chatbox\RestApp\Message1())->down($schema);
        (new \Chatbox\RestApp\Message2())->down($schema);
    }
}
