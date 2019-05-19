<?php

namespace App\Http\Controllers\Api\Pages;

use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use App\Models\UserStatus;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    //

    public  function  index($user_id){

        $user =  User::find($user_id);
        $response = [];


        if(empty($user)){
            $response['response'] = false;
            $response['message'] = "user id not valid";

        }else{


            $posts = Post::getUserPostsWithFollowers($user_id);
            $firendsStatus = UserStatus::getFollowersStatuses($user_id);


            $response['response'] = true;
            $response['message'] = "data successfully added ";
            $response['posts'] = $posts;
            $response['statuses'] = $firendsStatus;




        }





        return $response;
    }


    public function  post_likes($post_id){
       $response['likes'] = Like::getPostLikes($post_id);
       return $response;
    }






    public  function like_or_dislike_post($post_id,$user_id){
        $response =  Like::like_or_dislike_post($post_id,$user_id);

        if($response){
            return ["response"=>true];
        }


        return ["response"=>false];
    }




    public function addcoment(Request $request){

        $isSaved = Post::store($request->all());

        $response = [];
        if($isSaved){
            $response['response'] = true;
            $response['message'] = "comment saved";

        }else{
            $response['response'] = false;
            $response['message'] = "comment not saved";
        }

        return $response;
    }


}
