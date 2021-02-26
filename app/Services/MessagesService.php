<?php
/**
 * Created by PhpStorm.
 * User: ahmed
 * Date: 23/02/2021
 * Time: 07:14 م
 */

namespace App\Services;



use App\Models\Message;

class MessagesService{
    public function newMessagesCount(){
        return Message::where('seen',0)->count();
    }
    public function newMessages(){
        return Message::where('seen',0)->orderBy('id','DESC')->get();
    }
    public function oldMessages(){
        return Message::where('seen',1)->orderBy('id','DESC')->take(30)->get();
    }

    public function markSeen(){
        Message::where('seen',0)->update(['seen'=>1]);
    }
    public function removeMessage(int $id){
        Message::where('id',$id)->delete();
    }
    public function sendMessage(array $data):void{
        Message::create($data);
    }
}
