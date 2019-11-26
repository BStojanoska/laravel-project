<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use App\Note;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$filepath = storage_path('app/public/animals');
if (!File::exists($filepath)) {
    File::makeDirectory($filepath);
}

$factory->define(User::class, function (Faker $faker) {
    return [
        'avatar' => $faker->image('public/storage/avatars',50,50, null, false),
        'firstname' => $faker->firstName,
        'lastname' => $faker->lastName,
        'address' => $faker->streetAddress,
        'city' => $faker->city,
        'zip' => $faker->postcode,
        'country' => $faker->country,
        'email' => $faker->email,
        'phone' => $faker->phoneNumber,
    ];
});

$factory->define(Note::class, function (Faker $faker) {
    return [
        'note' => $faker->text($maxNbChars = 2000)
    ];
});

