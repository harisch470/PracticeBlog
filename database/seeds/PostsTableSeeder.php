<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories_posts')->truncate();
        Post::truncate();

        $catIds = array(1,2,);
        $posts = Post::create([
            'user_id' => '1',
            'title' => 'Welcome',
            'photo' => '1.jpg',
            'description' => 'This is our first Post for testing'
        ]);
        $posts->categories()->sync($catIds);

        $catIds = array(3,4);
        $posts = Post::create([
            'user_id' => '1',
            'title' => 'Welcome 2',
            'photo' => '1.jpg',
            'description' => 'hjfl hsf lsdjhf sdfldldhf sdflhsdfsdhfldslkf hdslfsd'
        ]);
        $posts->categories()->sync($catIds);


        $catIds = array(1,2,3,4);
        $posts = Post::create([
            'user_id' => '2',
            'title' => 'Welcome 3',
            'photo' => '1.jpg',
            'description' => 'dassafsdfdsdfljsdf lsjd dhsf sdlfhoisd foshdfsdlif odsfohsdfli dsfhpsd fip dsfijsd'
        ]);
        $posts->categories()->sync($catIds);

        $catIds = array(1,);
        $posts = Post::create([
            'user_id' => '2',
            'title' => 'Abc Post',
            'photo' => '1.jpg',
            'description' => 'dassafsdfdsdfljsdf lsjd dhsf sdlfhoisd foshdfsdlif odsfohsdfli dsfhpsd fip dsfijsd'
        ]);
        $posts->categories()->sync($catIds);
    }
}
