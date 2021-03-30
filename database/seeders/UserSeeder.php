<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert(['name'=>'Trung admin','email'=>'user4@gmail.com','password' => Hash::make(123456),'gender'=>'male',
            'level'=>1,'description'=>'jfsjljs']);
    }
}
