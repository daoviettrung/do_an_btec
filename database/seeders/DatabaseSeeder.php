<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(['name'=>'Trung admin','email'=>'user@gmail.com','password' => Hash::make(123456),'gender'=>'male',
            'level'=>2,'description'=>'jfsjljs']);
    }
}
