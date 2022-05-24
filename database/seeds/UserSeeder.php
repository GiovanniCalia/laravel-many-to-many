<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Generator as Faker;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($_i=0; $_i < 10; $_i++){

            User::create([
                'name'      => $faker->name(),
                'email'     => $faker->email(),
                'password'  => Hash::make('123456')
            ]);


        }
    }
}
