<?php
/**
 * Created by PhpStorm.
 * User: ahmed
 * Date: 23/02/2021
 * Time: 07:14 م
 */

namespace App\Services;


use App\Models\Contact;

class BranchesService{
    public function getBranchBySlug(string $slug){
        return Contact::where('slug',$slug)->first();
    }
    public function getBranches(){
        return Contact::all();
    }

    /**
     * @param array $data
     */
    public function createBranch(array $data):void{
        $slugService=new SlugService();
        $data['slug']=$slugService->createUnique($data['title'],Contact::class,33);
        Contact::create($data);
    }

    public function updateBranch(array $data,string $slug):void{
        Contact::where('slug',$slug)->update($data);
    }
    public function deleteBranch(string $slug):bool{
        $branch=$this->getBranchBySlug($slug);
        if(!$branch){
            return false;
        }
        $branch->delete();
        return true;
    }
}
