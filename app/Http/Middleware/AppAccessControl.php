<?php
/**
 * Created by PhpStorm.
 * User: mrashid
 * Date: 7/30/2017
 * Time: 12:46 PM
 */

namespace App\Http\Middleware;

use App\Utils\AppGlobal;
use Closure;
use \Auth;
class AppAccessControl
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $user = null;
        $actions = null;
        $roles = null;
        $errorAjaxResponse = ['success'=>false,'error'=>true,'errorCode'=>402,'message'=>''];
        /*        $user = $request->user();
                if ($user === null)
                {
                    return response('Insufficient Permission', 401);
                }*/
        if(Auth::check()){
            $user = Auth::user();
            $resourceName = $request->route()->getName();
            $roles = $user->roles;
//            dd($roles);
            foreach ($roles as $role)
            {
                if($role->id == AppGlobal::ADMIN){
                    return $next($request);
                }else{
                    if ($role->hasResource($resourceName))
                    {
                        return $next($request);
                    }else{
                        if($request->ajax()){
                            return response($errorAjaxResponse);
                        }else{
                            return redirect()->route('error',['code'=>401]);
                        }
                    }
                }
            }
        }else{
            if($request->ajax()){
                return response($errorAjaxResponse);
            }else{
                return redirect()->route('error', ['code'=>401]);
            }
        }
    }
}