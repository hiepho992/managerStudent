<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Student;
use Faker\Generator as Faker;

$factory->define(Student::class, function (Faker $faker) {
    return [
        'fullName' => $faker->name,
        'image' => $faker->imageUrl($width = 100, $height = 100),
        'dateOfBirth' =>$faker->date(),
        'nation' => $faker->country,
        'gender' => $faker->numberBetween($min = 0, $max = 1),
        'phone' =>$faker->phoneNumber('0123456789'),
        'email' => $faker->email,
        'address' => $faker->address,
        'date_start' => $faker->date(),
        'classe_id' => $faker->numberBetween($min = 1, $max = 4)
    ];
});
