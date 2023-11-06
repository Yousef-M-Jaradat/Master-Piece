<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Users')->insert([
            'name' => 'yousef',
            'email' => 'yousef@gmail.com',
            'image' => 'http://127.0.0.1:8000/backend/assets/img/avatar/avatar-4.png',
            'password' => bcrypt('password'),
        ]);
    }
}
