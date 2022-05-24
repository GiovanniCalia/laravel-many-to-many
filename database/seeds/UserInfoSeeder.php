<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\UserInfo;
use App\User;

class UserInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $users = User::all();
        foreach ($users as $user) {
            UserInfo::create([
                'user_id'        => $user->id,
                'phone_number'   => $faker->phoneNumber(),
                'date_of_birth'  =>$faker->date(),
            ]);
        }
    }
}
