<?php

namespace App\Http\Controllers\Api\Pages;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostPageController extends Controller
{
    //


    public function post($post_id,$user_id){
        $post  = Post::get($post_id,$user_id);

        if(empty($post)){
            $response["response"]= false;
            $response["message"]= "post id is not valid";
        }else{
            $response["response"]= true;
            $response["message"]= "post has been fetched";
            $response["post"]= $post;
        }


        return $response;
    }


}
