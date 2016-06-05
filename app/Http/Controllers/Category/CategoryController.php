<?php

namespace App\Http\Controllers\Category;

use Validator;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use \App\Models\Categories as Categories;

class CategoryController extends Controller
{
    //
    var $data;
    var $model;
    
    public function __construct(){
        $this->data = array();
        $url = array('storePath'=>url('/category/store'));
        $this->data['url'] = (object)$url;
        
        $this->model = new Categories();
    }
    
    //Display all Option
    public function index(){
        
        return view('system/option/index');
    }
    
    //Create new option
    public function create(){
        
        //Get field
        $modelInfo = array(
            'vTableName'=>$this->model->vTableName,
            'columns'=>$this->model->getColumns('create')
        );
        $this->data['modelInfo'] = (object)$modelInfo;
        
        return view('system/option/add',$this->data);
    }
    
    //Add new option
    public function store(Request $request){
        
        //Validation data input
        $validator = Validator::make($request->all(), $this->model->getColumnsValidation(__FUNCTION__));
        if ($validator->fails()) {
            //Return error if have
            return redirect('option/create')
                        ->withErrors($validator)
                        ->withInput();
        }else{
            
            //Store option object
            
            $option = new Categories();
            foreach($this->model->getColumns(__FUNCTION__) as $value){
                $property = $value->name;
                $option->$property = $request->input($value->name);
            }
            $option->save();
        }
        //End validation
        return redirect('category/create')->with('msg', 'Store success');
    }
    
    //GET /options/id
    public function show($id){
        
        //show spicific question
    }
    
    //GET /options/id/edit
    public function edit($id){
        
    }
    
    public function update($id){
        
    }
    
    public function destroy($id){
        
    }
}
