<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Comment extends Model
{

    const LIMIT = 2;
    protected $fillable = [
        'post_id', 'user_id', 'message' //@todo category column should be removed
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    /**
     * @param array $data
     * @return array
     */
    public static function saveComment(array $data)
    {
        $comment = null;
        $user=Auth::user();
        if(isset($data['comment_id'])){
            /** @var TYPE_NAME $this */
            $comment = self::find($data['comment_id']);
        }else{
            $comment = new Comment();
        }
        $comment->user_id = $user->id;
        $comment->post_id = $data['post_id'];
        $comment->message = $data['message'];
        $comment->save();

        $response = ['success' => true, 'error' => false, 'message' => 'Posts has been saved successfully!', 'Comment' => $comment];
        return $response;
    }

    /**
     * @param $id
     * @return $this
     */
    public static function show($id)
    {
        $display = self::select('message');
        $display->where('post_id', 'LIKE', '%' . $id . '%');
        $display->orderBy('created_at', 'desc');
        return $display;
    }

    /**
     * @param $data
     * @return array
     * @throws \Exception
     */
    public static function deleteComment($data)
    {
        $comment = self::find($data);
        $comment->delete();
        $response = ['success' => true, 'error' => false, 'message' => 'Posts has been saved successfully!'];
        return $response;
    }

    public static function countComment($post_id){
        $count = self::where('post_id','=',$post_id)->count();
        return $count;
    }
}
