<?php

namespace App\Http\Controllers\Api\Pages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User,App\Models\Like,App\Models\Post,App\Models\Order,App\Models\PostAttachments;

class ProfilePageController extends Controller
{
    //


    public function user_profile($user_id,$my_id){
    	$response = [];

    	$user = User::find($user_id);
    	$iam = User::find($my_id);

    	if(empty($user) || empty($iam)){
    		$response['response'] = false;
    		$response['message'] = "user id is not valid id!";
    	}else{

    		$followers_count = Like::where([["type","user"],["target_id",$user_id]])->count();
    		$folloings_count = Like::where([["type","user"],["liker_id",$user_id]])->count();


    		$isILikedCount = Like::where([["type","user"],["liker_id",$user_id],["target_id",$my_id]])->count();



    		$user->orders = Order::where([["creator_id",$user_id],['post_creator_id',$my_id]])->get()->toArray();





    		if($isILikedCount>=1){
    			$user->isILiked = true;
    		}else{
				$user->isILiked = false;
    		}

    		$posts = Post::where([["creator_id",$user_id]])
            
            ->get()->toArray();


            // ->join("Tb_Post_attachments","Tb_Post_attachments.post_id","Tb_Posts.id")
            // ->select("Tb_Posts.*",
            // "Tb_Post_attachments.path as  image_path"
            // )

            $data = [];
            foreach ($posts as $post) {

                $image = PostAttachments::where("post_id",$post['id'])->select("path")->first();
               $post["image_path"] = $image->path;
               $data[] =  $post;
            }

            $posts =    $data ;

    		$posts_count = count($posts);

    		$user->followers_count = $followers_count;
    		$user->folloings_count = $folloings_count;
    		$user->posts_count = $posts_count;
    		$user->posts = $posts;
    		$response['response'] = true;
    		$response['user'] = $user;
    		$response['message'] = "user data fetched";

    	}

    	return $response;
    }
}
