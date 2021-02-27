<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\RequestsWeb\User\CreateTeamValidator;
use App\RequestsWeb\User\UpdateTeamValidator;
use App\Services\DynamicsService;
use App\Services\MessagesService;
use App\Services\TeamService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;


class DynamicsController extends Controller
{
    public function __construct(MessagesService $messagesService){
        $messagescount=$messagesService->newMessagesCount();
        View::share('messagescount',$messagescount);
    }
    public function edit_home(DynamicsService $dynamicsService){
        try{
            $home=$dynamicsService->getData();
            return view('/admin/dynamic/home',compact('home'))->with('newads',0)->with('usercount',0)->withReports(0);
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
    public function edit_about(DynamicsService $dynamicsService,TeamService $teamService){
        try{
            $about=$dynamicsService->getData();
            $team=$teamService->getData();
            return view('/admin/dynamic/about',compact('about','team'))->with('newads',0)->with('usercount',0)->withReports(0);
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
    public function create_team(TeamService $teamService){
        try{
            return view('/admin/dynamic/teamcreate')->with('newads',0)->with('usercount',0)->withReports(0);
        }catch (\ErrorException $exception){
            return response()->json(["Error: "=>$exception->getMessage()],$exception->getErrorCode());
        }
    }
    public function store_team(CreateTeamValidator $teamValidator,TeamService $teamService){
        try{
            $data=$teamValidator->request()->except('_token');
            $teamService->createTeam($data);
            session()->push('m','success');
            session()->push('m','Team Person Created Successfully!');
            return back();
        }catch (\ErrorException $exception){
            return response()->json(["Error: "=>$exception->getMessage()],$exception->getErrorCode());
        }
    }
    public function edit_team($id,TeamService $teamService){
        try{
            $team=$teamService->getTeamById($id);
            if(!$team){
                session()->push('m','danger');
                session()->push('m','Team Person Not Found!');
                return back();
            }
            return view('/admin/dynamic/teamupdate',compact('team'))->with('newads',0)->with('usercount',0)->withReports(0);
        }catch (\ErrorException $exception){
            return response()->json(["Error: "=>$exception->getMessage()],$exception->getErrorCode());
        }
    }
    public function update_team($id,UpdateTeamValidator $teamValidator,TeamService $teamService){
        try{
            $team=$teamService->getTeamById($id);
            if(!$team){
                session()->push('m','danger');
                session()->push('m','Team Person Not Found!');
                return back();
            }
            $teamService->updateTeam($teamValidator->request()->except('_token','_method'),$id);
            session()->push('m','success');
            session()->push('m','Team Person Updated Successfully!');
            return back();
        }catch (\ErrorException $exception){
            return response()->json(["Error: "=>$exception->getMessage()],$exception->getErrorCode());
        }
    }
    public function destroy_team($id,TeamService $teamService){
        try{
            $team=$teamService->getTeamById($id);
            if(!$team){
                session()->push('m','danger');
                session()->push('m','Team Person Not Found!');
                return back();
            }
            $teamService->deleteTeam($id);
            session()->push('m','success');
            session()->push('m','Team Person Deleted Successfully!');
            return back();
        }catch (\ErrorException $exception){
            return response()->json(["Error: "=>$exception->getMessage()],$exception->getErrorCode());
        }
    }
}
