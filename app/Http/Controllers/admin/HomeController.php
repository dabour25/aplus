<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Services\MessagesService;
use Illuminate\Support\Facades\View;


class HomeController extends Controller
{
    public function __construct(MessagesService $messagesService){
        $messagescount=$messagesService->newMessagesCount();
        View::share('messagescount',$messagescount);
    }

    public function index(){
        try{
            return view('/admin/index')->with('newads',0)->with('usercount',0)->withReports(0);
        }catch (\ErrorException $exception){
            return response()->json(["Error: "=>$exception->getMessage()],$exception->getErrorCode());
        }
    }
}
