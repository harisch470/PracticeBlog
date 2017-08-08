<?php
/**
 * Created by PhpStorm.
 * User: mrashid
 * Date: 7/31/2017
 * Time: 2:17 AM
 */

namespace App\Http\ViewComposers;


use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ProfileComposer
{
    /**
     * The user repository implementation.
     *
     * @var User
     */
    protected $user;

    /**
     * ProfileComposer constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        // Dependencies automatically resolved by service container...
        if(Auth::check()){
            $this->user = Auth::user();
        }else{
            $this->user = $user;
        }
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('userPostCount', $this->user->posts->count())
            ->with('loggedInUserName', $this->user->name);



    }
}