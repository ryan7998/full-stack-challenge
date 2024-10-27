<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;
use App\Models\Company;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'company_id' => Company::factory(), // Creates a new company if not specified
            'title' => $this->faker->jobTitle(),
            'description' => $this->faker->paragraphs(3, true),
            'position_type' => $this->faker->randomElement(['remote', 'in-person']),
            'salary' => $this->faker->numberBetween(50000, 150000),
            'location' => $this->faker->city(),
        ];
    }
}
