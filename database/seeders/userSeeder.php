<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
            'username'=>'managerr',
            'name'=>'gerr',
            'email'=>'manager@gmail.com',
            'level'=>'manager',
            'password'=>bcrypt('123456')
            ],
            [
            'username'=>'executivee',
            'name'=>'Akun exe',
            'email'=>'exe@gmail.com',
            'level'=>'executive',
            'password'=>bcrypt('123456')
            ],
        ];

        foreach ($users as $key => $value) {
            User::create($value);
        }

    }
}
