<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        DB::table('users')->insert([
            'role_id'=>2,
            'gender_id'=>1,
            'first_name'=>'Account',
            'last_name'=>'1',
            'email'=>'orang1@gmail.com',
            'display_picture_link'=>'1.jpg',
            'password'=>Hash::make('akunorang1'),
        ]);

        DB::table('users')->insert([
            'role_id'=>1,
            'gender_id'=>2,
            'first_name'=>'Account',
            'last_name'=>'2',
            'email'=>'orang2@gmail.com',
            'display_picture_link'=>'1.jpg',
            'password'=>Hash::make('akunorang2'),
        ]);

        DB::table('users')->insert([
            'role_id'=>1,
            'gender_id'=>2,
            'first_name'=>'Account',
            'last_name'=>'3',
            'email'=>'orang3@gmail.com',
            'display_picture_link'=>'1.jpg',
            'password'=>Hash::make('akunorang3'),
        ]);

        DB::table('users')->insert([
            'role_id'=>2,
            'gender_id'=>2,
            'first_name'=>'Account',
            'last_name'=>'4',
            'email'=>'orang4@gmail.com',
            'display_picture_link'=>'1.jpg',
            'password'=>Hash::make('akunorang4'),
        ]);
    }
}
