<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $user = \App\Models\User::factory()->create([
            'name' => 'Adam Weston',
            'email' => 'adam.weston@titlemax.com',
        ]);

        $user->posts()->create([
            'title' => 'Post Title',
            'content' => '<p>Test content</p>'
        ]);
    }
}
