<?php

use Faker\Generator as Faker;

$factory->define(codeDelivery\Models\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        //'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(codeDelivery\Models\Category::class, function (Faker $faker) {
    return [
        'name' => $faker->word
    ];
});

$factory->define(codeDelivery\Models\Client::class, function (Faker $faker) {
    return [
        'phone' => $faker->phoneNumber,
        'address'=> $faker->address,
        'city' => $faker->city,
        'state' => $faker->state,
        'zipcode' => $faker->postcode
    ];
});


$factory->define(codeDelivery\Models\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->sentence,
        'price' => $faker->numberBetween(10,50)
    ];
});


