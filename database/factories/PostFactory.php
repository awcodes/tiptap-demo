<?php

namespace Database\Factories;

use Awcodes\HtmlFaker\HtmlFaker;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => 1,
            'title' => str($this->faker->words(rand(3,5), true))->title(),
            'content' => HtmlFaker::make()
                ->heading()
                ->paragraphs(2)
                ->heading(3)
                ->paragraphs(3, true)
                ->image()
                ->generate(),
        ];
    }
}
