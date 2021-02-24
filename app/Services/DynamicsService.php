<?php
/**
 * Created by PhpStorm.
 * User: ahmed
 * Date: 23/02/2021
 * Time: 07:14 م
 */

namespace App\Services;



use App\Models\Dynamic;

class DynamicsService{

    public function getData(){
        return Dynamic::all();
    }

    public function updateData(array $data):void{
        foreach($data as $key=>$d){
            Dynamic::where('title',$key)->update(['content'=>$d]);
        }
    }
}
