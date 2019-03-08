<?php

use Faker\Generator as Faker;

$factory->define(App\Question::class, function (Faker $faker) {
    return [
        'title' => trim($faker->sentence(rand(5,10)), "."),// this will neglect . after sentence end
        'body' => $faker->paragraphs(rand(3,7), true),
        'views' => rand(0,10),
        'answers' => rand(0,10),
        'votes' => rand(-3,10)
    ];
});
