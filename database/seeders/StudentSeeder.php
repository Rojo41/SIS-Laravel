<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Student::factory(40)->create([
            'name' => fn() => fake()->name(),
            'email' => fn()  =>  fake()->unique()->safeEmail(),
            'address' => fn()  => fake()->address(),
            'course' => fn() => fake()->word(),
            'password' => fn() => fake()->word(),
        ]);
    }
}
