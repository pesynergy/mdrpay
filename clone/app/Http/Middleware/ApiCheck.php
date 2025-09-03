<?php

namespace App\Http\Middleware;

use Closure;

class ApiCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($post, Closure $next)
    {
        if(
            \Request::is('v/getip')
        ){
            return $next($post);
        }

        if(!isset($_SERVER['HTTP_AUTHORIZATION'])){
            return response()->json(['status' => 'error', 'message' => "Missing Authorization"]);
        }

        $tokenExplode = str_replace("Bearer ", "", $_SERVER['HTTP_AUTHORIZATION']);
        $userCheck    = \DB::table("apitokens")->where("token", $tokenExplode)->first();

        if(!$userCheck){
            return response()->json(['status' => 'error', 'message' => "API Key is invalid"]);
        }

        $post['via'] = "api";
        $post['user_id'] = $userCheck->user_id;
        return $next($post);
    }
}