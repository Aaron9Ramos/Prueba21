<?php

namespace Database\Seeders;

use App\Models\Students;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*Students::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);*/

        $student = new Students();

        $student->name= "Juan";
        $student->last_name = "Perez";
        $student->last_name2 = "Ramirez";
        $student->grade = "1";
        $student->level = "0";
        $student->status = "1";
        $student->user_id = '2';
        $student->created_at = now();
        
        $student->save();

        $student = new Students();

        $student->name= "Francisco";
        $student->last_name = "Perez";
        $student->last_name2 = "Ramirez";
        $student->grade = "3";
        $student->level = "1";
        $student->status = "1";
        $student->user_id = '2';
        $student->created_at = now();
        
        $student->save();

        $student = new Students();

        $student->name= "Raul";
        $student->last_name = "Sanchez";
        $student->last_name2 = "Romero";
        $student->grade = "2";
        $student->level = "1";
        $student->status = "1";
        $student->user_id = '3';
        $student->created_at = now();
        
        $student->save();
    }
}
