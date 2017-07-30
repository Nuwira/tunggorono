<?php

/*
|--------------------------------------------------------------------------
| User Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

use App\Models\User;
use Faker\Generator;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(User::class, function (Generator $faker) {
    static $password;

    return [
        'role_id' => 1,
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(60),
        'phone' => $faker->phoneNumber,
        'birthdate' => $faker->dateTimeThisCentury->format('Y-m-d'),
        'gender' => $faker->randomElement(['M', 'F']),
        'is_active' => $faker->boolean,
    ];
});

$factory->state(User::class, 'active', function ($faker) {
    return [
        'is_active' => true,
    ];
});
$factory->state(User::class, 'inactive', function ($faker) {
    return [
        'is_active' => false,
    ];
});

$factory->state(User::class, 'male', function ($faker) {
    return [
        'gender' => 'M',
    ];
});
$factory->state(User::class, 'female', function ($faker) {
    return [
        'gender' => 'F',
    ];
});

$factory->state(User::class, 'administrator', function ($faker) {
    return [
        'role_id' => 1,
    ];
});