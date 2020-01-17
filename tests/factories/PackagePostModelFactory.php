<?php

$factory->define(\Magros\PackageWorkshop\Models\PackagePost::class, function (Faker\Generator $faker) use ($factory) {
    return [
        'name' => $faker->text,
        'body' => $faker->text
    ];
});

