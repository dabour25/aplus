<?php
namespace App\Services;

//use App\Exceptions\ErrorException;
use App\Exceptions\ErrorException;
use App\Models\Unit;

class SlugService {
    private function generator33(string $title){
        return substr($title,0,3).'-'.rand(100,999);
    }
    private function generator8(){
        return ''.rand(10000000,99999999);
    }
    public function createUnique(string $title,$model,$code){
        $tries=0;
        $slug='';
        for(;;){
            if($code==33){
                $slug=$this->generator33($title);
            }elseif($code==8){
                $slug=$this->generator8();
            }
            $checkExists=$model::where('slug',$slug)->exists();
            if(!$checkExists){
                break;
            }
            if($tries==10000){
                throw new ErrorException("Can't Create Slug",408);
            }
            $tries++;
        }
        return $slug;
    }
}
