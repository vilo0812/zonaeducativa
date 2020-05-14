<?php
/*"firstName"=>'Manuel',
            "lastName"=>'Rangel',
            "IC"=>'24238148',
            "email"=> 'manueldavidrangel@gmail.com',
            "tlf"=>'04144588234',
            "municipality"=>'Roscio',
            "belongings" => "canaima",
            "password"=>bcrypt('123456789'),
            "rol_id"=> 1*/
/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
$factory->define(User::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstname,
        'last_name' => $faker->lastname,
        'email' => $faker->unique()->safeEmail,
        'identification_card' => $faker->randomNumber(7),
        'phone' =>$faker->randomNumber(7),
        'password' => bcrypt(1234), // password
        "rol_id"=>$faker->randomElement([2,3,4])
    ];
});
