<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);*/

        $user = new User();

        $user->name = 'Admin';
        $user->email = 'admin@gmail.com';
        $user->user_type = 0;
        $user->password = bcrypt('123456');

        $user->save();

        $user = new User();

        $user->name = 'Papa';
        $user->email = 'papa@gmail.com';
        $user->user_type = 2;
        $user->password = bcrypt('123456');
        
        $user->save();

        $user = new User();

        $user->name = 'Papa2';
        $user->email = 'papa2@gmail.com';
        $user->user_type = 2;
        $user->password = bcrypt('123456');
        
        $user->save();


    }
}
