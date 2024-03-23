<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
            // \App\Models\User::factory()->create([
            //    'name' => 'admin',
            //     'email' => 'test@example.com',
            //     'is_admin' => true
            // ]);
            //  \App\Models\User::factory()->create([
            //     'name' => 'Test User 3',
            //     'email' => 'test2@example.com',
            //     'password'=> 'password',
            //    'is_admin' => false
            // ]);
            // \App\Models\User::factory()->create([
            //     'name' => 'Test User 5',
            //     'email' => 'test5@example.com',
            //     'password' => Hash::make('password'),
            //     'is_admin' => false
            // ]);

            //   $amount = 3;

            //    $user = function() use ($amount) {
            //        for ($i = 0; $i < $amount; $i++) {
            //      yield ['email' => "test$i@example.com"];
            //           }
            //   };

            //   User::factory()->count($amount)
            //       ->state(new Sequence(...iterator_to_array($user())))
            //       ->create();


            //  \App\Models\Listing::factory(5)
            // //->for($user, 'owner')
            //  ->create();


                \App\Models\Comment::factory(5) ;

    }
}
