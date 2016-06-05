<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOptionsTable extends Migration
{
    var $model;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->model = new App\Models\Option();
        
        Schema::create($this->model->tableName,function(Blueprint $table){
            foreach ($this->model->getColumns() as $value) {
                switch ($action) {
                    case 'enum': $table->$value->type($value->name, $value->data); break;
                    default: $table->$value->type($value->name); break;
                }
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop($this->model->tableName);
    }
}
