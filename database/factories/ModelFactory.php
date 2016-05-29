<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/
$faker = Faker\Factory::create('vi_VN');

$factory->define(App\User::class, function () use ($faker) {
    return [
        'name' => $faker->firstName() . ' ' . $faker->lastName(),
        'email' => $faker->safeEmail,
        'actived' => true,
        'admin' => false,
        'teacher' => false,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Task::class, function (Faker\Generator $faker) {
	return [
    	'user_id' => 1,
    	'title' => implode($faker->words(4),' '),
    	'description' => implode($faker->paragraphs(5),'<br>'),
    	'end_at' => \Carbon\Carbon::now()->addWeeks(3)
	];
});

$factory->define(App\File::class, function (Faker\Generator $faker) {
	return [
    	'user_id' => 3,
    	'file_path' => $faker->md5 . '/' . implode($faker->words(3),'_') . '.zip'
	];
});