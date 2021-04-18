<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role'=>'admin',
            'name'=>'andres',
            'surname'=>'aleu',
            'nick'=>'andy',
            'email'=>'admin@admin.com',
            'image'=>'',
            'password'=>bcrypt('admin')
           
        ]);
        DB::table('users')->insert([
            'role'=>'admin',
            'name'=>'laura',
            'surname'=>'garcia',
            'nick'=>'lau',
            'email'=>'admin1@admin.com',
            'image'=>'',
            'password'=>bcrypt('admin1')
        ]);
        DB::table('users')->insert([
            'role'=>'admin',
            'name'=>'carlos',
            'surname'=>'perez',
            'nick'=>'carl',
            'email'=>'admin2@admin.com',
            'image'=>'',
            'password'=>bcrypt('admin2') //hash::make
        ]);
    }
}
