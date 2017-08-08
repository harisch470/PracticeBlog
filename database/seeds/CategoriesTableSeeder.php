<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();

        //*** if you use Category::create rather than Category::insert hen no need to manually setting timestamp fields
        Category::insert([

            ['name' => 'Happy','created_at'=>date('Y-m-d'),'updated_at'=>date('Y-m-d')],
            ['name' => 'Sad','created_at'=>date('Y-m-d'),'updated_at'=>date('Y-m-d')],
            ['name' => 'Traveling','created_at'=>date('Y-m-d'),'updated_at'=>date('Y-m-d')],
            ['name' => 'Tired','created_at'=>date('Y-m-d'),'updated_at'=>date('Y-m-d')],
            ['name' => 'Romantic','created_at'=>date('Y-m-d'),'updated_at'=>date('Y-m-d')],
        ]);

    }
}
