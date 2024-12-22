<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class dataContoh extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userData = [
            [
                'name'=>'Mas Arya',
                'email'=> 'masarya@gmail.com',
                'tipe_user'=>'admin',
                'password'=> bcrypt('1234567')
            ],
            [
                'name'=>'Mas Friand',
                'email'=> 'masfriand@gmail.com',
                'tipe_user'=>'user',
                'password'=> bcrypt('7654321')
            ],
            [
                'name'=>'Mas Hazli', 
                'email'=> 'mashazli@gmail.com',
                'tipe_user'=>'user',
                'password'=> bcrypt('12345678')
            ],
        ] ;

        foreach ($userData as $key => $val) {
            User::create($val);
        }
    }
}
