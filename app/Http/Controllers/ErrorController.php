<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class ErrorController extends Controller
{
    /**
     * @param int $code
     * @return string
     */
    public function error($code=0)
    {
        switch ($code){
            case 401:
                $message = 'You are not Unauthorized!';
            break;
            default:
                $message = 'There is some problem, please try later';
            break;
        }
        return view('error.error',compact('message'));
    }
}
