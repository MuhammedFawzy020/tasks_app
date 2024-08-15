<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'is_admin' => true ,
            'name' => 'Muhammed Fawzy',
            'email' => 'admin@admin.com',
            'password' => Hash::make('123456'),
        ]);
        
        User::factory()->count(100)->create([
            'is_admin' => true ,
            'password' => Hash::make('123456'),
        ]);
    }
}
