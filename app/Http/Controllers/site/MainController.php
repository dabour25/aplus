<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\RequestsWeb\User\SendMessageValidator;
use App\Services\BranchesService;
use App\Services\DynamicsService;
use App\Services\MessagesService;
use App\Services\TeamService;
use Illuminate\Support\Facades\View;


class MainController extends Controller
{
    public function __construct(DynamicsService $dynamicsService){
        $data=$dynamicsService->getData();
        View::share('data',$data);
    }

    public function index(){
        try{
            $page='HOME';
            return view('welcome',compact('page'));
        }catch (\ErrorException $exception){
            return response()->json(["Error: "=>$exception->getMessage()],$exception->getErrorCode());
        }
    }

    public function contact(BranchesService $branchesService){
        try{
            $page='CONTACT US';
            $branches=$branchesService->getBranches();
            return view('contact',compact('page','branches'));
        }catch (\ErrorException $exception){
            return response()->json(["Error: "=>$exception->getMessage()],$exception->getErrorCode());
        }
    }

    public function sendMessage(SendMessageValidator $messageValidator,MessagesService $messagesService){
        try{
            $data=$messageValidator->request()->except('_token');
            $messagesService->sendMessage($data);
            session()->push('m','success');
            session()->push('m','Message Sent To Admin Successfully!');
            return back();
        }catch (\ErrorException $exception){
            return response()->json(["Error: "=>$exception->getMessage()],$exception->getErrorCode());
        }
    }

    public function about(DynamicsService $dynamicsService,TeamService $teamService){
        try{
            $page='ABOUT US';
            $team=$teamService->getData();
            return view('about',compact('page','team'));
        }catch (\ErrorException $exception){
            return response()->json(["Error: "=>$exception->getMessage()],$exception->getErrorCode());
        }
    }
}
