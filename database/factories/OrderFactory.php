<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use Faker\Generator as Faker;

$factory->defineAs(Order::class, 'orders', function (Faker $faker) {
    return [
        'user_id' => null
    ];
});
