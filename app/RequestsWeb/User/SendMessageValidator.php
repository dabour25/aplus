<?php

namespace App\RequestsWeb\User;

use App\RequestsWeb\BaseRequestForm;
use Carbon\Carbon;


class SendMessageValidator extends BaseRequestForm
{

    public function rules(): array
    {
        return [
            'name'=>'required|max:50|min:3',
            'email'=>'required|max:50|email',
            'subject'=>'required|max:50|min:5',
            'message'=>'required|max:1000|min:5',
        ];
    }
}
