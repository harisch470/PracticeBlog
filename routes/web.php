<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use \App\Http\Controllers\HomeController;
use \App\Http\Controllers\UserController;

Route::group(['public'],function (){

    Route::group(['Error'], function () {
        Route::get('error/{code?}', 'ErrorController@error')->name('error');
    });

    Route::group(['Home'], function () {
        Route::get('/','HomeController@index');
        Route::get('home', 'HomeController@index')->name('home');
        Route::post('filterPosts', ['uses' => 'HomeController@filterPosts', 'as' => 'filterPosts']);
        Route::post('searchViaCategory', ['uses' => 'HomeController@searchViaCategory', 'as' => 'searchViaCategory' ]);
//        Route::get('/searchViaCategory/{category_ids?}', ['uses' => 'HomeController@searchViaCategory', 'as' => 'searchViaCategory' ]);

    });

    Route::group(['Users'], function () {
        Route::resource('users',"UserController");
        Route::get('test/{id?}',['as' => 'test', 'uses' => "UserController@test"]);
        Route::any('uploadProfilePic', array('as' => 'uploadProfilePic', 'uses' => 'UsersController@uploadProfilePic'));
    });

    Route::group(['Posts'], function () {
        Route::post('/results', ['uses' => 'HomeController@searchPosts', 'as' => 'results' ]);
        Route::get('/show/{post_id}', ['uses' => 'PostController@show', 'as' => 'posts.show']);
        Route::get('/myPosts', ['uses' => 'PostController@userPosts', 'as' => 'userPosts']);
        Route::get('/showMore/{post_id}', ['uses' => 'PostController@showMore', 'as' => 'posts.showMore']);
        Route::get('/searchPosts', ['uses' => 'HomeController@searchPosts', 'as' => 'searchPosts' ]);
        Route::get('/searchViaCategory/{category_ids?}', ['uses' => 'HomeController@searchViaCategory', 'as' => 'searchViaCategory' ]);

    });
    Route::group(['Comments'], function () {
        Route::post('/store', ['uses' => 'CommentController@store', 'as' => 'comment.store' ]);
        Route::get('/comment.delete/{post_id?}/{comment_id?}', ['uses' => 'CommentController@deleteComment', 'as' => 'comment.delete']);
        Route::get('/comment.edit/{post_id?}/{comment_id?}', ['uses' => 'CommentController@editComment', 'as' => 'comment.edit']);
        Route::post('/comment.update/{comment_id?}', ['uses' => 'CommentController@updateComment', 'as' => 'comment.update']);
    });
});
        Route::get('/create', ['uses' => 'PostController@index', 'as' => 'create']);
        Route::get('/store', ['uses' => 'PostController@store', 'as' => 'posts.store', ]);
        Route::post('/createpost', ['uses' => 'PostController@postCreatePost', 'as' => 'createpost', ]);

        Route::post('posts', ['uses' => 'PostController@index', 'as' => 'post.index']);
        Route::post('/update-post/{post_id}', ['uses' => 'PostController@update', 'as' => 'post.update']);
        Route::post('/edit', ['uses' => 'PostController@edit', 'as' => 'edit']);
//        Route::post('/like', ['uses' => 'PostController@postLikePost', 'as' => 'like']);


//Route::group(['Likes'], function () {
//    Route::post('/like', ['uses' => 'PostController@likePost', 'as' => 'like']);
//});

Route::group(['private', "middleware" => 'auth'],function (){

    Route::group(['Posts'], function () {
        Route::resource('posts',"PostController");
        Route::get('/show/{post_id}', ['uses' => 'PostController@show', 'as' => 'show']);
        Route::get('/delete/{post_id}', ['uses' => 'PostController@delete', 'as' => 'delete']);
    });

    Route::group(['Categories'], function () {
        Route::resource('categories',"CategoryController");
        Route::get('/categories.index', ['uses' => 'CategoryController@index', 'as' => 'categories.index', ]);
        Route::post('/createcategory', ['uses' => 'CategoryController@createCategory', 'as' => 'createcategory', ]);
        Route::get('/delete_category/{id}', ['uses' => 'CategoryController@destroy_cat', 'as' => 'delete_category']);
        Route::get('/editCategory/{id}', ['uses' => 'CategoryController@edit', 'as' => 'editCategory']);
        Route::put('/updateCategory/{id}', ['uses' => 'CategoryController@update_cat', 'as' => 'updateCategory']);
    });

    Route::group(['Likes'], function () {
        Route::post('/like', ['uses' => 'PostController@likePost', 'as' => 'like']);
    });
});
Route::get('/',['as' => 'home.index', 'uses' => "HomeController@index"]);
Route::get('/home', 'PostController@index')->name('home');
Auth::routes();
Auth::routes();
