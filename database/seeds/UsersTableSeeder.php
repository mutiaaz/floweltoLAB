<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('users')->truncate(); //for cleaning earlier data to avoid duplicate entries
        DB::table('users')->insert([
            'name' => 'Manager',
            'email' => 'manager123@gmail.com',
            'password' => Hash::make('password'),
            'address' => 'jln manager 1',
            'DOB' => '11 Nov 1990',
            'gender'=>'Male'
        ]);
        DB::table('users')->insert([
            'name' => 'user1',
            'email' => 'user1@gmail.com',
            'password' => Hash::make('password'),
            'address' => 'jln user 1',
            'DOB' => '5 April 1990',
            'gender'=>'Female'
        ]);
    }
}
