<?php

namespace Database\Factories;

use Awcodes\HtmlFaker\HtmlFaker;
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
        $content = HtmlFaker::make()
            ->heading()
            ->paragraphs(2)
            ->heading(3)
            ->paragraphs(3, true)
            ->generate();

        $jsonContent = tiptap_converter()->asJSON($content);

        return [
            'title' => str($this->faker->words(rand(3,5), true))->title(),
            'content' => json_decode($jsonContent, true),
        ];
    }
}
