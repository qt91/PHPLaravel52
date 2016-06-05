<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class AmModel extends Model {

    /**
     * Get column info
     */
    public function getColumns($action = 'index'){
        $result = array();
        foreach ($this->columns as $value) {
            if(isset($value['vAction'])){
                if($value['vAction'] == ''){
                    //Check foreign key
                        if(isset($value['foreignKey'])){
                            $one = $value['foreignKey'];
                            $foreignKey = (object)$value['foreignKey'];
                            $strKey = explode('@',$foreignKey->key);
                            $fModel = $strKey[0];//Model name
                            $linkObj = "\App\Models\\".$fModel;
                            $modelObj = new $linkObj();
                            $data = $modelObj::all();
                            $out = array();
                            for($i = 0; $i < count($data); $i++){
                                $out[$data[$i]->$one['vKey']] = $data[$i]->$one['vValue'];
                            }
                            $value['data'] = $out;
                        }
                        
                    $result[] = (object)$value;
                }else{
                    if(strpos($value['vAction'], $action) !== false){
                        //Check foreign key
                        if(isset($value['foreignKey'])){
                            $one = $value['foreignKey'];
                            $foreignKey = (object)$value['foreignKey'];
                            $strKey = explode('@',$foreignKey->key);
                            $fModel = $strKey[0];//Model name
                            $linkObj = "\App\Models\\".$fModel;
                            $modelObj = new $linkObj();
                            $data = $modelObj::all();
                            $out = array();
                            for($i = 0; $i < count($data); $i++){
                                $out[$data[$i]->$one['vKey']] = $data[$i]->$one['vValue'];
                            }
                            $value['data'] = $out;
                        }
                        
                        $result[] = (object)$value;   
                    }   
                }    
            }
        }
        return $result;
    }
    
    public function getColumnsValidation($action = 'index'){
        $result = array();
        $data = $this->getColumns($action);
        foreach ($data as $value) {
            $result[$value->name] = $value->validation;
        }
        return $result;
    }

}