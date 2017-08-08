<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    const LIMIT = 2;
    protected $fillable = [
        'title', 'category', 'photo', 'description', 'user_id'  //@todo category column should be removed
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'user_id',
    ];

    public static $rules = [
        'title' => 'required',
        'category' => 'required',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * @param $data
     * @return array
     */
    public function savePost(array $data)
    {
        $post = null;
        if (isset($data['id'])) {
            /** @var TYPE_NAME $this */
            $post = self::find($data['id']);
        } else {
            $post = new Post();
        }
        $user=Auth::user();
        $post->user_id = $user->id;;
        $post->title = $data['title'];
        $post->photo = $data['image'];
        $post->description = $data['description'];
        $post->save();

        $categoriesIds = isset($data['category']) ? $data['category'] : '';
        if($categoriesIds != ''){
            foreach($categoriesIds as $qId){
                $post->categories()->attach($qId);
            }
        }

        $response = ['success' => true, 'error' => false, 'message' => 'Posts has been saved successfully!', 'Post' => $post];
        return $response;
    }

    public static function deletePost($data)
    {
        $post = Post::find($data);
        $post->delete();
        $response = ['success' => true, 'error' => false, 'message' => 'Posts has been saved successfully!'];
    }
    public static function Counter($id)
    {
        $data=self::find($id);
        $counts=$data->comments()->count();
        echo $counts;
    }
    public static function likeCounter($id)
    {
        $data=self::find($id);
        $counts=$data->likes()->count();
        return $counts;
    }
//    public static function likeCheck($id)
//    {
//        $data=self::find($id);
//        $my=$data->likes()->where('post_id' , $id);
//
//        if($my->like == true){
//        return true;}
//        else{
//            return false;
//        }
//    }



    function fetchPosts($params = array())
    {
        $limit = isset($params['limit']) ? $params['limit'] : self::LIMIT;
        $qry = self::select('id', 'title', 'user_id', 'photo', 'description', 'created_at');
        if (isset($params['searchKey'])) {
            $qry->where('title', 'LIKE', '%' . $params['searchKey'] . '%');
        }
        if (isset($params['user_id'])) {
            $qry->where('user_id', 'LIKE', '%' . $params['user_id'] . '%');
        }
        if (isset($params['category_ids'])) {
            $qry->join('categories_posts AS cp', 'cp.post_id', 'posts.id');
            $qry->whereIn('cp.category_id', $params);
        }
        $qry->orderBy('created_at', 'desc');
//        dd($qry->toSql());
        return $qry->paginate($limit);
    }

    public function categories()
    {
//        return $this->belongsToMany(Category::class);
        return $this->belongsToMany(Category::class,'categories_posts');
    }

    /**
     * @return string
     */
    public function getPostCategoriesName()
    {
        $names = '';
        $categories = $this->categories()->get();
        if ($categories){
            $total = $categories->count();
            if ($total){
                foreach ($categories as $c){
                    $names .= $c->name . ', ';
                }
            }
        }
        return rtrim($names,', ');
    }
}
