<?php

namespace App\RequestsWeb\User;

use App\RequestsWeb\BaseRequestForm;
use Carbon\Carbon;


class UpdateeBranchValidator extends BaseRequestForm
{

    public function rules(): array
    {
        return [
            'title'=>'required|max:60|min:3',
            'phone'=>'nullable|max:30',
            'email'=>'nullable|max:50|email',
            'address'=>'nullable|max:500',
        ];
    }
}
