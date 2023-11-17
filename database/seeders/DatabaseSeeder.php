<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Page;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Bruce Wayne',
            'email' => 'bruce@wayneindustries.com',
        ]);

        Page::factory(10)->create();
        Post::factory(15)->create();
    }
}
