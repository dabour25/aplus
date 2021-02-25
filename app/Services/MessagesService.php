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

    public function sendMessage(array $data):void{
        Message::create($data);
    }
}
