<?php

use Illuminate\Database\Seeder;

class GroupsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $groups = ['Family', 'Friends', 'Work', 'Food'];

        foreach ($groups as $group) {
            DB::table('groups')->insert([
                'name' => $group
            ]);
        }
    }
}
