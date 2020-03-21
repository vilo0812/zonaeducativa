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
        'firstName' => $faker->firstname,
        'lastName' => $faker->lastname,
        'email' => $faker->unique()->safeEmail,
        'IC' => $faker->randomNumber(7),
        'tlf' =>$faker->randomNumber(7),
        'municipality' => $faker->address,
        'password' => bcrypt(1234), // password
        "belongings" => $faker->sentence,
        'remember_token' => $faker->sentence,
        "rol_id"=>$faker->randomElement([2,3])
    ];
});
