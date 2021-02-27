<?php

namespace App\RequestsWeb\User;

use App\RequestsWeb\BaseRequestForm;
use Carbon\Carbon;


class UpdateTeamValidator extends BaseRequestForm
{

    public function rules(): array
    {
        return [
            'name'=>'required|max:50|min:3',
            'description'=>'required|max:1000|min:5',
            'role'=>'required|max:50|min:3',
            'face_book'=>'nullable|max:100',
            'twitter'=>'nullable|max:100',
            'instagram'=>'nullable|max:100',
            'linked_in'=>'nullable|max:100',
            'image'=>'nullable|image|mimes:jpg,jpeg,png|max:4096',
        ];
    }
}
