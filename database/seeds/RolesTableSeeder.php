<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use \App\Models\Role;
class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();

        //*** if you use Role::create rather than Role::insert hen no need to manually setting timestamp fields
        Role::insert([

            ['id' => '1','name' => 'Admin','created_at'=>date('Y-m-d'),'updated_at'=>date('Y-m-d')],
            ['id' => '2','name' => 'Registered','created_at'=>date('Y-m-d'),'updated_at'=>date('Y-m-d')]

        ]);
    }
}
