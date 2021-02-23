<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\RequestsWeb\User\CreateBranchValidator;
use App\RequestsWeb\User\UpdateeBranchValidator;
use App\Services\BranchesService;


class BranchesController extends Controller
{
    public function index(BranchesService $branchesService){
        try{
            $branches=$branchesService->getBranches();
            return view('/admin/branches/index',compact('branches'))
                ->with('messagescount',0)->with('newads',0)->with('usercount',0)->withReports(0);
        }catch (\ErrorException $exception){
            return response()->json(["Error: "=>$exception->getMessage()],$exception->getErrorCode());
        }
    }
    public function create(){
        try{
            return view('/admin/branches/create')->with('messagescount',0)->with('newads',0)->with('usercount',0)->withReports(0);
        }catch (\ErrorException $exception){
            return response()->json(["Error: "=>$exception->getMessage()],$exception->getErrorCode());
        }
    }
    public function store(CreateBranchValidator $branchValidator,BranchesService $branchesService){
        try{
            $data=$branchValidator->request()->except('_token');
            $branchesService->createBranch($data);
            session()->push('m','success');
            session()->push('m','Branch Created!');
            return back();
        }catch (\ErrorException $exception){
            return response()->json(["Error: "=>$exception->getMessage()],$exception->getErrorCode());
        }
    }
    public function edit($slug,BranchesService $branchesService){
        try{
            $branch=$branchesService->getBranchBySlug($slug);
            if(!$branch){
                session()->push('m','danger');
                session()->push('m','Branch Not Found!');
                return back();
            }
            return view('/admin/branches/edit',compact('branch'))
                ->with('messagescount',0)->with('newads',0)->with('usercount',0)->withReports(0);
        }catch (\ErrorException $exception){
            return response()->json(["Error: "=>$exception->getMessage()],$exception->getErrorCode());
        }
    }
    public function update($slug,UpdateeBranchValidator $branchValidator,BranchesService $branchesService){
        try{
            $data=$branchValidator->request()->except('_token','_method');
            $branchesService->updateBranch($data,$slug);
            session()->push('m','success');
            session()->push('m','Branch Updated Successfully!');
            return back();
        }catch (\ErrorException $exception){
            return response()->json(["Error: "=>$exception->getMessage()],$exception->getErrorCode());
        }
    }
    public function destroy($slug, BranchesService $branchesService){
        try{
            $status=$branchesService->deleteBranch($slug);
            if($status){
                session()->push('m','success');
                session()->push('m','Branch Deleted Successfully!');
            }else{
                session()->push('m','danger');
                session()->push('m','Branch Not Found!');
            }
            return back();
        }catch (\ErrorException $exception){
            return response()->json(["Error: "=>$exception->getMessage()],$exception->getErrorCode());
        }
    }
}
