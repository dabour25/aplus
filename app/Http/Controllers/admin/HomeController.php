<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;


class HomeController extends Controller
{
    public function index(){
        try{
            return view('/admin/index')->with('messagescount',0)->with('newads',0)->with('usercount',0)->withReports(0);
        }catch (\ErrorException $exception){
            return response()->json(["Error: "=>$exception->getMessage()],$exception->getErrorCode());
        }
    }
}
