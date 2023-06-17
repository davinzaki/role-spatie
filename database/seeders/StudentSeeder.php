<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 5; $i++) {
            Student::create([
                'name' => fake()->name(),
                'email' => fake()->unique()->safeEmail(),
                'class' => 'XII SIJA ' . rand(1, 3),
                'created_at' => now(),
            ]);
        }
    }
}
