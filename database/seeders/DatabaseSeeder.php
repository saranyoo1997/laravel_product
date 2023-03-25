<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
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
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $users = [[
            'username' => 'saranyoo123',
            'password' => bcrypt('1234'),
            'level' => '1'
        ], [
            'username' => 'test1',
            'password' => bcrypt('1234'),
        ], [
            'username' => 'test2',
            'password' => bcrypt('1234'),
        ], [
            'username' => 'test3',
            'password' => bcrypt('1234'),
        ]];
        foreach ($users as $user) {
            User::factory()->create($user);
        }

        \App\Models\User::factory(100)->create();
        \App\Models\Category::factory(10)->create();
        \App\Models\Product::factory(100)->create();

    }
}
