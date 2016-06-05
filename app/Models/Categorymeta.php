<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorymeta extends AmModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    public $tableName = 'categorymeta';
    public $vTableName = 'Hổ trợ danh mục';
    public $timestamps = false;
    
   /**
    * The column in table
    */
    public $columns = array(
            array('name'=>'id','type'=>'increments','vName'=>'Mã',
                'validation'=>'integer',
                'vAction'=>'index|show|edit|update'),
            array('name'=>'category_id','type'=>'integer','vName'=>'Mã danh mục cha',
                'validation'=>'integer',
                'vAction'=>'index|show|edit|update'),
            array('name'=>'key','type'=>'string','vName'=>'Tên',
                'validation'=>'required|max:255',
                'vAction'=>''),
            array('name'=>'value','type'=>'string','vName'=>'Rút gọn',
                'validation'=>'required|max:255',
                'vAction'=>'')
        );
}
