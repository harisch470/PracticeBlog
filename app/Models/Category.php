<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    public static function saveCategory($data){
        $category = null;
        if(isset($data['id'])){
            /** @var TYPE_NAME $this */
            $category = self::find($data['id']);
        }else{
            $category = new Category();
        }
        $category->name = $data['name'];

        $category->save();
        $response = ['success'=>true, 'error'=> false, 'message'=> 'categories has been saved successfully!','Post'=>$category];
        return $response;
    }

    public function posts(){
//        return $this->belongsToMany(Post::class);
        return $this->belongsToMany(Post::class, 'categories_posts');
    }
}
