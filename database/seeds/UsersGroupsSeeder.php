<?php

use Illuminate\Database\Seeder;

class UsersGroupsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i = 0; $i < 100; $i++) {
            DB::table('users_groups')->insert([
                'user_id' => $faker->numberBetween($min = DB::table('users')->min('id'), $max = DB::table('users')->max('id')),
                'group_id' => $faker->numberBetween($min = DB::table('groups')->min('id'), $max = DB::table('groups')->max('id')),
            ]);
        }
    }
}
