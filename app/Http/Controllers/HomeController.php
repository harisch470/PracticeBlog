<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $post;
    /**
     * PostController constructor.
     * @param $post
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->post->fetchPosts();
//        dd($posts);
//        $postsComment=Comment::countComment($posts['0']['id']);
//        dd($postsComment);
        return view('home.index',compact('message'))->nest('postList','home.partials._postList',compact('posts'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function filterPosts(Request $request){
        $data = $request->all();
        $posts = $this->post->fetchPosts($data);
        return view('home.partials._postList',compact('posts'));
    }


    /**
     * @param Request $request
     * @param null $category_ids
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function searchViaCategory(Request $request,$category_ids=null)
    {
//       $searchKey = $request->get('searchKey',null);
        if(isset($request['category_ids'])){
            $params['category_ids'] = $request->get('category_ids');
        }
        if(isset($category_ids)){
            $params['category_ids'] = $category_ids;
        }
        $posts = $this->post->fetchPosts($params);
     return view('home.index',compact('message'))->nest('postList','home.partials._postList',compact('posts','params'));
    }

}
