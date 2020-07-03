<?php
/*"firstName"=>'Manuel',
            "lastName"=>'Rangel',
            "IC"=>'2423
            8148',
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
    $ic = $faker->randomNumber(7);
    $route = public_path('images/users/'.$ic);
    if (!file_exists($route)) {
        mkdir($route, 0777, true);
    }
    $imgRoute = public_path('images/default/default.jpg');
    $imgRouteCopy = public_path('images/users/'.$ic.'/default.jpg');
    copy($imgRoute,$imgRouteCopy);
    return [
        'first_name' => $faker->firstname,
        'last_name' => $faker->lastname,
        'email' => $faker->unique()->safeEmail,
        'identification_card' => $ic,
        'phone' =>$faker->randomNumber(7),
        'password' => bcrypt(1234), // password,
        'picture' => 'default.jpg',
        "rol_id"=>$faker->randomElement([2,3,4])
    ];
});
