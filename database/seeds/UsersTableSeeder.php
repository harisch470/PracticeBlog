<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        //Create Admin
        $user = User::create(['name' => 'Ali Raza','email' => 'admin@gmail.com','password' => \Hash::make('123456')]);
        $user->roles()->sync([\App\Utils\AppGlobal::ADMIN]);

        //Create Registered User
        $user = User::create(['name' => 'Aslam Khan','email' => 'user@gmail.com','password' => \Hash::make('123456')]);
        $user->roles()->sync([\App\Utils\AppGlobal::REGISTERED]);
    }
}
