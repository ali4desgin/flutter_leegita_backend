<?php

namespace App\Http\Controllers\Api\Pages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use App\Models\PostAttachments;
class SearchPageController extends Controller
{
    //


  public function load(Request $request){
    $keyword = $request->input("keyword");
    $posts_list = Post::where("title","like","%$keyword%")->orWhere("description","like","%$keyword%")->get()->toArray();

    $posts = [];
    foreach ($posts_list as $post) {
      $attachment = PostAttachments::where("post_id", $post['id'])->first();
      $post['image'] = $attachment->path;
      $posts[] =  $post;
      # code...
    }

    $categories = Category::where("title","like","%$keyword%")->get()->toArray();
    $users = User::where([["username","like","%$keyword%"]])->inRandomOrder()->get()->toArray();

    $response['response'] = true;
    $response['message'] = "data successfully added ";
    $response['posts'] = $posts;
    $response['users'] = $users;
    $response['categories'] = $categories;


    return $response;

  }

   public function suggestions($user_id){
   	$posts = Post::getUserPostsRandomWithFollowers($user_id);
   	 $response['response'] = true;
    	$response['message'] = "data successfully added ";
    $response['posts'] = $posts;

    return $response;
   }



   public function search($user_id,$keyword){
   	$posts = Post::getUserPostsRandomWithFollowers($user_id);
   	return $posts;
   }

}
