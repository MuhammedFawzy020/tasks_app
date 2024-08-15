<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class UsersSeeder extends Seeder
{
    
    public function run(): void
    {
        User::factory()->count(10000)->create();

        $admins = User::factory()->count(100)->create([
            'is_admin' => 1 ,
            'password' => Hash::make('123456'),
        ]);
    }
}
