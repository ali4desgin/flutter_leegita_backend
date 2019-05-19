<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $table = "Tb_Comments";


    public static function  store($data = [])
    {
        $user_id =  $data['user_id'];
        $post_id =  $data['post_id'];
        $comment =  $data['comment'];

        $n_comment = new self();
        $n_comment->post_id = $post_id;
        $n_comment->creator_id = $user_id;
        $n_comment->message = $comment;
        $n_comment->has_images = 0;
        if($n_comment->save()){
            return true;
        }else{
            return false;
        }
    }


}
