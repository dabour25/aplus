<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Services\MessagesService;
use Illuminate\Support\Facades\View;


class MessagesController extends Controller
{
    public function __construct(MessagesService $messagesService){
        $messagescount=$messagesService->newMessagesCount();
        View::share('messagescount',$messagescount);
    }

    public function index(MessagesService $messagesService){
        try{
            $newmes=$messagesService->newMessages();
            $oldmes=$messagesService->oldMessages();
            $messagesService->markSeen();
            return view('/admin/messages/index',compact('newmes','oldmes'))->with('newads',0)->with('usercount',0)->withReports(0);
        }catch (\ErrorException $exception){
            return response()->json(["Error: "=>$exception->getMessage()],$exception->getErrorCode());
        }
    }
    public function destroy($id,MessagesService $messagesService){
        try{
            $messagesService->removeMessage($id);
            session()->push('m','success');
            session()->push('m','Message Removed Successfully!');
            return back();
        }catch (\ErrorException $exception){
            return response()->json(["Error: "=>$exception->getMessage()],$exception->getErrorCode());
        }
    }
}
