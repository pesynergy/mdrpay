<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Apitoken;
use App\Model\Permission;
use App\User;

class ApiController extends Controller
{
    public function index($type)
    {
        $data['type']  = $type;
        $data['token'] = Apitoken::where('user_id', \Auth::id())->first();
        return view("apitools.".$type)->with($data);
    }

    public function update(Request $post)
    {
        if (\Myhelper::hasNotRole('apiuser')) {
            return response()->json(['status' => "Permission Not Allowed"], 400);
        }

        if($post->has("token")){
            do {
                $post['token'] = str_random(30);
            } while (Apitoken::where("token", "=", $post->token)->first() instanceof Apitoken);
        }
        
        $post['user_id'] = \Auth::id();
        $action = Apitoken::updateOrCreate(['user_id'=> $post->user_id], $post->all());
        if ($action) {
            return response()->json(['status' => "success"], 200);
        }else{
            return response()->json(['status' => "Task Failed, please try again"], 200);
        }
    }
}
