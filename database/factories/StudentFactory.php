<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'name' => $this->facker->name,
        'email' => $this->facker->email,
        'mobile' => $this->facker->mobile,
        'city' => $this->facker->city,
        'address' => $this->facker->address
    ];
});
