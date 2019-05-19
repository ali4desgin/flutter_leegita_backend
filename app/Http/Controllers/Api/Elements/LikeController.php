<?php

namespace App\Http\Controllers\Api\Elements;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Like;
class LikeController extends Controller
{
    //

    public function add_user_like($liker_id,$user_id){
    	$like =  Like::where([["type","user"],["target_id",$user_id],['liker_id',$liker_id]])->count();


    	if($like==0){
    		$new_like = new Like();
    		$new_like->type = "user";
    		$new_like->target_id = $user_id;
    		$new_like->liker_id = $liker_id;
    		$new_like->save();
    	}



    	$response['response'] = true;
    	$response['message'] = "user liked";
   		
   		return $response;

    }


     //

    public function remove_user_like($liker_id,$user_id){
    	$like =  Like::where([["type","user"],["target_id",$user_id],['liker_id',$liker_id]])->first();


    	if(!empty($like)){
    		Like::find($like->id)->delete();
    	}



    	$response['response'] = true;
    	$response['message'] = "user disliked";
   		
   		return $response;

    }


}
