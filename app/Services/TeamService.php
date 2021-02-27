<?php
/**
 * Created by PhpStorm.
 * User: ahmed
 * Date: 23/02/2021
 * Time: 07:14 م
 */

namespace App\Services;



use App\Models\Team;
use Illuminate\Support\Str;

class TeamService{

    public function getData(){
        return Team::all();
    }

    public function getTeamById($id){
        return Team::where('id',$id)->first();
    }

    public function createTeam(array $data){
        $ph=Str::random(32);
        $ph.='.'.$data['image']->getClientOriginalExtension();
        $data['image']->move(public_path('/images/team'),$ph);
        $data['image']=$ph;
        Team::create($data);
    }
    public function updateTeam(array $data,int $id){
        $team=$this->getTeamById($id);
        if(!empty($data['image'])){
            unlink(public_path('/images/team').'/'.$team->image);
            $ph=Str::random(32);
            $ph.='.'.$data['image']->getClientOriginalExtension();
            $data['image']->move(public_path('/images/team'),$ph);
            $data['image']=$ph;
        }else{
            $data['image']=$team->image;
        }
        Team::where('id',$id)->update($data);
    }
    public function deleteTeam(int $id){
        $team=$this->getTeamById($id);
        unlink(public_path('/images/team').'/'.$team->image);
        Team::where('id',$id)->delete();
    }

}
