<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create 10000 records of users
        factory(App\User::class, 10)->create()->each(function ($user) {
            // Seed the relation with one address
            $note = factory(App\Note::class)->make();
            $user->note()->save($note);
        });
    }
}
