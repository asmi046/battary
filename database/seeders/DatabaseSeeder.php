<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(
            [
                CategorySeeder::class,
                ContactSeeder::class,
                MenuSeeder::class,
                PageSeeder::class,
                SeoDataSeeder::class,
                ShopSeeder::class,
                UserSeeder::class,
                BlogCategorySeeder::class,
                BlogSeeder::class,
                ProductSeeder::class,
                SelectionSeeder::class,
            ]
        );
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
