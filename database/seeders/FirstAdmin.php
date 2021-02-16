<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class FirstAdmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create($this->adminInitialData());
    }

    public function adminInitialData(){
        return [
            'name'=>'admin',
            'email'=>'admin@aplus-core.com',
            'password'=>Hash::make('Admin2021'),
            'role'=>'admin',
        ];
    }
}
