<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\Listing;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(5)->create();

        $user = User::factory()->create([
            'name' => 'Sam Doe',
            'email' => 'sam@gmail.com',
        ]);

        Listing::factory(8)->create(
            [
            'user_id' => $user->id
            ]
        );

        // Listing::create(
        //     [
        //         'title' => 'Web Developer',
        //         'description' => 'We are looking for a web developer to join our team.',
        //         'company' => 'Google',
        //         'location' => 'New York',
        //         'email' => 'somemail@gmail.com', 
        //         'website' => 'www.google.com',
        //         'telephone' => '123456789',
        //         'tags' => 'web, developer, php, javascript'
        //     ]
        // );

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
