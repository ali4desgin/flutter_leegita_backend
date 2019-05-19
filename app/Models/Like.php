<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    //

    protected $table = "Tb_Likes";


    public static   function  getPostLikes($post_id){

        return Like::where([["Tb_Likes.target_id",$post_id],["Tb_Likes.type","post"]])
            ->join("Tb_Users","Tb_Users.id","Tb_Likes.liker_id")
            ->select("Tb_Likes.*",
                "Tb_Users.username as username",
                "Tb_Users.email as email",
                "Tb_Users.profile_image as profile_image",
                "Tb_Users.phone as phone")
            ->get()->toArray();


    }

    public static   function  like_or_dislike_post($post_id,$user_id){

        $isLiked = self::where([['type','post'],['target_id',$post_id],['liker_id',$user_id]])->first();

        if(!empty($isLiked)){
            $isLiked->delete();

        }else{
            $new_like = new self();
            $new_like->type = "post";
            $new_like->liker_id = $user_id;
            $new_like->target_id = $post_id;
            $new_like->save();
        }


        return true;

    }
}
