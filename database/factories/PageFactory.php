<?php

namespace Database\Factories;

use FilamentTiptapEditor\TiptapFaker;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Page>
 */
class PageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $content = TiptapFaker::make()
            ->heading()
            ->paragraphs(2)
            ->heading(3)
            ->paragraphs(3, true)
            ->details()
            ->asJSON(decoded: true);

        return [
            'title' => str($this->faker->words(rand(3,5), true))->title(),
            'content' => [
                'en' => $content,
                'es' => $content,
            ],
        ];
    }
}
