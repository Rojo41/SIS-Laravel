<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subject>
 */
class SubjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code' => 'IT' . fake()->unique()->numerify('###'),
            'name' => fake()->randomElement([
                'Mathematics',
                'Physics',
                'Chemistry',
                'Biology',
                'Computer Science',
                'Data Structures',
                'Operating Systems',
                'Database Systems',
                'Software Engineering',
                'Networking',
                'Artificial Intelligence',
                'Machine Learning',
                'Cybersecurity',
                'Web Development',
                'Mobile App Development',
                'Accounting',
                'Business Management',
                'Marketing',
                'Economics',
                'Statistics'
            ]),

            'units' => fake()->numberBetween(2, 3),
        ];
    }
}
