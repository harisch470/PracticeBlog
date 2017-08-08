<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    private $comment;

    public function __construct(Comment $comment)
    {
        $this->comment=$comment;
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $post_id=$request['post_id'];
        $comment=$this->comment->saveComment($data);
        return redirect()-> route('posts.showMore',['post_id' => $post_id]);
    }

    /**
     * @param $post_id
     * @param $comment_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteComment($post_id,$comment_id)
    {

        $comment=$this->comment->deleteComment($comment_id);
        return redirect()->route('posts.showMore',['post_id' => $post_id])->with('message', 'Comment has been save successfully!');
    }

    /**
     * @param $post_id
     * @param $comment_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editComment($post_id,$comment_id)
    {
        $comment=Comment::find($comment_id);
        return view('comment.edit',compact('comment','post_id'));
    }

    /**
     * @param Request $request
     * @param $comment_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateComment(Request $request,$comment_id)
    {
        $data = $request->all();
        $post_id=$request['post_id'];
        $data['comment_id']=$comment_id;
        $comment=$this->comment->saveComment($data);
        return redirect()->route('posts.showMore',['post_id'=>$post_id]);
    }

}
