<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use \App\Models\Access;
use \App\Utils\AppGlobal;
class AccessesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Access::truncate();
        Access::insert([

            ['role_id'=>AppGlobal::REGISTERED,'name' => 'home','created_at'=>date('Y-m-d'),'updated_at'=>date('Y-m-d')],
            ['role_id'=>AppGlobal::REGISTERED,'name' => 'posts.create','created_at'=>date('Y-m-d'),'updated_at'=>date('Y-m-d')],
            ['role_id'=>AppGlobal::REGISTERED,'name' => 'posts.edit','created_at'=>date('Y-m-d'),'updated_at'=>date('Y-m-d')],
            ['role_id'=>AppGlobal::REGISTERED,'name' => 'posts.destroy','created_at'=>date('Y-m-d'),'updated_at'=>date('Y-m-d')],
            ['role_id'=>AppGlobal::REGISTERED,'name' => 'posts.show','created_at'=>date('Y-m-d'),'updated_at'=>date('Y-m-d')]

        ]);
    }
}
