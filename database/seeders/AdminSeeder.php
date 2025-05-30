<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
        /**
         * Run the database seeds.
         */
        public function run(): void
        {
                User::create([
                        'name' => 'Makeda Yonas',
                        'profile_picture' => 'profile_pics/maki.jpg',
                        'email' => 'maki@gmail.com',
                        'password' => bcrypt('maki1234'),
                ])->assignRole('Admin');

                User::create([
                        'name' => 'Rufael Melese',
                        'profile_picture' => 'profile_pics/rafa.jpg',
                        'email' => 'niamraf12@gmail.com',
                        'password' => bcrypt('12345678'),
                ])->assignRole('Admin');

                User::create([
                        'name' => 'Fikir Bisrat',
                        'profile_picture' => 'profile_pics/fi.png',
                        'email' => 'brownie@gmail.com',
                        'password' => bcrypt('brownie123'),
                ])->assignRole('Student');
                
                User::create([
                        'name' => 'Tsedalu Ashenafi',
                        'profile_picture' => 'profile_pics/tsed.png',
                        'email' => 'ashutsedex@gmail.com',
                        'password' => bcrypt('tsedexashu08'),
                ])->assignRole('Admin');
        }
}
