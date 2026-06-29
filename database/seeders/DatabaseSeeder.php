<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            AdminUserSeeder::class,
            ServiceSeeder::class,
            ArticleSeeder::class,
        ]);
    }
}