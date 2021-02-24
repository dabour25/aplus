<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Services\DynamicsService;
use Illuminate\Http\Request;


class DynamicsController extends Controller
{
    public function edit_home(DynamicsService $dynamicsService){
        try{
            $home=$dynamicsService->getData();
            return view('/admin/dynamic/home',compact('home'))->with('messagescount',0)->with('newads',0)->with('usercount',0)->withReports(0);
        }catch (\ErrorException $exception){
            return response()->json(["Error: "=>$exception->getMessage()],$exception->getErrorCode());
        }
    }
    public function update_home(Request $request,DynamicsService $dynamicsService){
        try{
            $data=$request->except('_token');
            $dynamicsService->updateData($data);
            session()->push('m','success');
            session()->push('m','Home Updated Successfully!');
            return back();
        }catch (\ErrorException $exception){
            return response()->json(["Error: "=>$exception->getMessage()],$exception->getErrorCode());
        }
    }
    public function edit_about(DynamicsService $dynamicsService){
        try{
            $about=$dynamicsService->getData();
            return view('/admin/dynamic/about',compact('about'))->with('messagescount',0)->with('newads',0)->with('usercount',0)->withReports(0);
        }catch (\ErrorException $exception){
            return response()->json(["Error: "=>$exception->getMessage()],$exception->getErrorCode());
        }
    }
    public function update_about(Request $request,DynamicsService $dynamicsService){
        try{
            $data=$request->except('_token');
            $dynamicsService->updateData($data);
            session()->push('m','success');
            session()->push('m','About Updated Successfully!');
            return back();
        }catch (\ErrorException $exception){
            return response()->json(["Error: "=>$exception->getMessage()],$exception->getErrorCode());
        }
    }
}
