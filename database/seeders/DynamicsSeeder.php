<?php

namespace Database\Seeders;

use App\Models\Dynamic;
use Illuminate\Database\Seeder;

class DynamicsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dynamics=Dynamic::where('id',1)->first();
        if(!$dynamics){
            $data=$this->dynamicsInitialData();
            foreach ($data as $d){
                Dynamic::create($d);
            }
        }
    }

    public function dynamicsInitialData(){
        return [
            ['title'=>'form_url', 'content'=>''],
            ['title'=>'home_title', 'content'=>'We Make Shipping'],
            ['title'=>'face_book', 'content'=>'#'],
            ['title'=>'twitter', 'content'=>'#'],
            ['title'=>'instagram', 'content'=>'#'],
            ['title'=>'linked_in', 'content'=>'#'],
            ['title'=>'tiny_about', 'content'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam iure deserunt ut architecto dolores quo beatae laborum aliquam ipsam rem impedit obcaecati ea consequatur'],
            ['title'=>'mission', 'content'=>'A+ Mission'],
            ['title'=>'vision', 'content'=>'A+ Vision'],
            ['title'=>'main_phone', 'content'=>'+201123456789'],
            ['title'=>'main_email', 'content'=>'info@aplus-comp.com'],
        ];
    }
}
