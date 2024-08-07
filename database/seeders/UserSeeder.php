<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
        'name' => 'Carlos Bogado',
        'email' => 'carl.bogadd@gmail.com',
        'password' => bcrypt('12345')
        ]);
        User::factory(9)->create();
    }
}
