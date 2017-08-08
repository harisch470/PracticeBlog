<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StorePostRequest;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Like;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class PostController extends Controller
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


    public function index()
    {
        $posts = $this->post->fetchPosts();
        return view('post.index', compact('posts'));
    }

    public function create()
    {
        $post = $this->post;
        return view('post.create', compact('post'));
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return view('post.edit', compact('post'));
    }

    /**
     * @param StorePostRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StorePostRequest $request)
    {
        $data = $request->all();
        $fileData = isset($data['image']) && count($data['image']) > 0 ? $data['image'] : null;
        if ($fileData) {
            $data['image'] = $this->uploadFile($fileData);
        }
        $this->post->savePost($data);
        return redirect()->route('home.index')->with('message', 'Post has been save successfully!');
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $fileData = isset($data['image']) && count($data['image']) > 0 ? $data['image'] : null;
        if ($fileData) {
            $data['image'] = $this->uploadFile($fileData);
        }
        $data['id'] = $id;
        $this->post->savePost($data);
        return redirect()->route('home.index')->with('message', 'Post has been save successfully!');
    }

    public function category()
    {
        return view('home.category');
    }

    public function createCatagory(Request $request)
    {
        $data = $request->all();
        $response = Category::saveCategory($data);
        return View('home.category', compact('response'));

    }

    public function show($post_id)
    {
        $post = Post::where('id', $post_id)->first();
        return View('post.index', ['post' => $post]);
    }

    public function showMore($post_id)
    {
        $post = Post::where('id', $post_id)->first();
        $comments= Comment::where('post_id', $post_id)->get();
        return View('post.show', ['post' => $post,'comments'=>$comments]);
    }

    public function delete($post_id)
    {
        $this->post->deletePost($post_id);
        return redirect()->route('home.index')->with('message', 'Post has been save successfully!');
    }


    public function userPosts()
    {
//        $user=Auth::user();
//        $params['user_id']=$user->id;
        $params['user_id']=1;
        $posts = $this->post->fetchPosts($params);
        return view('post.index', compact('posts'));
    }

    private function uploadFile($imageData)
    {
        $file = $imageData;
        //saving image in public/assets/images folder with its extension
        $pathToSaveImage = public_path('/assets/uploads/images/');
        $fileOriginalNameDetailArray = pathinfo($file->getClientOriginalName());
        $fileName = time() . "_" . rand(1, 1000) . "." . $fileOriginalNameDetailArray['extension'];
        $file->move($pathToSaveImage, $fileName);

        return $fileName;
    }
    public function likePost(Request $request)
    {
        $is_like = true;
        $update = false;
        $post_id = $request['post_id'];
//        $post = Post::find($post_id);
        $user = Auth::user();
        $like = $user->likes()->where('post_id', $post_id)->first();
        if ($like) {
            $already_liked = $like->like;
            $update = true;
            if ($already_liked == $is_like) {
                $like->delete();
            }
        } else {
            $like = new Like();
        }
        $like->like = $is_like;
        $like->user_id = $user->id;
        $like->post_id = $post_id;
        if ($update) {
            $like->update();
        } else {
            $like->save();
        }

    }
}
