<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         User::create([
      'name' => '坂本昌行',
      'email' => 'masa@janies.com',
      'password' => Hash::make('pass'),
    ]);
    User::create([
      'name' => '長野博',
      'email' => 'hiroshi@janies.com',
      'password' => Hash::make('pass'),
    ]);
    User::create([
      'name' => '井ノ原快彦',
      'email' => 'inocchi@janies.com',
      'password' => Hash::make('pass'),
    ]);
     User::create([
      'name' => '森田剛',
      'email' => 'go@janies.com',
      'password' => Hash::make('pass'),
    ]);
    User::create([
      'name' => '三宅健',
      'email' => 'ken@janies.com',
      'password' => Hash::make('pass'),
    ]);
    User::create([
      'name' => '岡田准一',
      'email' => 'okada@janies.com',
      'password' => Hash::make('pass'),
    ]);
    }
}
