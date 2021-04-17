<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $user = new User();

        $user->name = 'Raghunath Bhattachrjee';
        $user->email = 'rghunath@gmail.com';
        $user->email_verified_at = now();
        $user->password = bcrypt('123456');
        $user->is_admin = true;
        $user->user_type = User::USER_TYPE_SUPER_USER;

        $user->save();


        $user = new User();

        $user->name = 'Rintu Bhattachrjee';
        $user->email = 'rintu@gmail.com';
        $user->email_verified_at = now();
        $user->password = bcrypt('123456');
        $user->is_admin = true;
        $user->user_type = User::USER_TYPE_NORMAL_USER;

        $user->save();
    }
}
