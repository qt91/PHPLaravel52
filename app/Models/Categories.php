<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends AmModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    public $tableName = 'categories';
    public $vTableName = 'Danh mục';
    public $timestamps = true;
    
   /**
    * The column in table
    */
    public $columns = array(
            array('name'=>'id','type'=>'increments','vName'=>'Mã',
                'validation'=>'integer',
                'vAction'=>'index|show|edit|update'),
            array('name'=>'parent_id','type'=>'integer','vName'=>'Mã danh mục cha',
                'validation'=>'integer',
                'vAction'=>'index|show|create|store|edit|update',
                'foreignKey'=>array('key'=>'Categories@id','vShow'=>'', 'vKey'=>'id', 'vValue'=>'name')),
            array('name'=>'name','type'=>'string','vName'=>'Tên',
                'validation'=>'required|max:255',
                'vAction'=>''),
            array('name'=>'slug','type'=>'string','vName'=>'Rút gọn',
                'validation'=>'required|max:255',
                'vAction'=>''),
            array('name'=>'description','type'=>'string','vName'=>'Mô tả',
                'validation'=>'required|max:255',
                'vAction'=>''),
            array('name'=>'status','type'=>'enum', 'data'=> ['public','private'],'vName'=>'Trạng thái',
                'validation'=>'required',
                'vAction'=>''),
        );
}
