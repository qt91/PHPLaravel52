<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOptionsTable extends Migration
{
    var $tableName = 'options';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName,function(Blueprint $table){
            $table  ->increments('id')
                    ->string('name')
                    ->longText('value')
                    ->enum('type',['text','json','number','select'])
                    ->enum('autoload',['yes','no']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop($this->$tableName);
    }
}
