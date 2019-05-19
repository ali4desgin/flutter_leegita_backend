<?php

namespace App\Models;

use http\Env\Url;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $table = "Tb_Posts";



    public static function  store($data = [])
    {
        $title =  $data['title'];
        $description =  $data['description'];
        $price =  $data['price'];
        $creator_id =  $data['creator_id'];
        $category_id =  $data['category_id'];
        // $currency =  $data['currency'];
        // $location =  $data['location'];

        $currency = "SAR";
        $location = "usa";



        $post = new self();
        $post->title = $title;
        $post->description = $description;
        $post->price = $price;
        $post->creator_id = $creator_id;
        $post->category_id = $category_id;
        $post->currency = $currency;
        $post->location = $location;
        if($post->save()){
            return $post->id;
        }else{
            return false;
        }
    }





    public static function getUserPostsRandomWithFollowers($user_id){
        $followers_ids = Like::where([["liker_id",$user_id],["type","user"]])->select("target_id")->get()->toArray();



        $followers_post = self::where([['status','issued']])->whereIn('Tb_Posts.creator_id', $followers_ids)->orderBy("Tb_Posts.id","desc")
//            ->join('Tb_Images', [['Tb_Images.id', '=', 'Tb_Posts.id'],['Tb_Images.id', '=', 'contacts.user_id']])
            ->limit(10)
            ->get();
//        if(empty($followers_post)){
//            $followers_post = self::where("creator_id","!=",$user_id)->orderBy("id","desc")->limit(10)->get();
//        }
//
//
//        if(empty($followers_post)){
//            $followers_post = self::where("creator_id","=",$user_id)->orderBy("id","desc")->limit(10)->get();
//        }

     //   return $followers_post;



        $posts = self::
            join("TB_Users","Tb_Users.id","=","Tb_Posts.creator_id")
            ->join("TB_Categories","TB_Categories.id","=","Tb_Posts.category_id")
            ->select(
                "Tb_Posts.*",
                "Tb_Users.username as  creator_name",
                "Tb_Users.profile_image as  creator_profile_image",
                "TB_Categories.title as  category_title"
            )->inRandomOrder()->get()->toArray();

        $data = [];
        foreach ($posts as $post){
            $attachments = PostAttachments::where("post_id",$post['id'])->get()->toArray();
            $likes = Like::where([["target_id",$post['id']],['type',"post"]])->count();
            $comments = Comment::where("post_id",$post['id'])->count();

            $post["isILiked"] = false;

            if($likes>=1){
                $myLike = Like::where([["target_id",$post['id']],['type',"post"],['liker_id',$user_id]])->count();


                if($myLike>=1){
                    $post["isILiked"] = true;
                }
            }


            $post["attachments"] = $attachments;
            $post["likes_count"] = $likes;
            $post["comments_count"] = $comments;




            // is likes or fav


            $data[]= $post;
        }
        return $data;
    }




    public static function categoryPosts($category_id,$user_id){


        $posts = self::
            where("Tb_Posts.category_id",$category_id)
            ->join("TB_Users","Tb_Users.id","=","Tb_Posts.creator_id")
            ->select(
                "Tb_Posts.*",
                "Tb_Users.username as  creator_name",
                "Tb_Users.profile_image as  creator_profile_image",
            )->inRandomOrder()->get()->toArray();

        $data = [];
        foreach ($posts as $post){
            $attachments = PostAttachments::where("post_id",$post['id'])->get()->toArray();
            $likes = Like::where([["target_id",$post['id']],['type',"post"]])->count();
            $comments = Comment::where("post_id",$post['id'])->count();

            $post["isILiked"] = false;

            if($likes>=1){
                $myLike = Like::where([["target_id",$post['id']],['type',"post"],['liker_id',$user_id]])->count();


                if($myLike>=1){
                    $post["isILiked"] = true;
                }
            }


            $post["attachments"] = $attachments;
            $post["likes_count"] = $likes;
            $post["comments_count"] = $comments;




            // is likes or fav


            $data[]= $post;
        }
        return $data;
    }



    
    public static  function getUserPostsWithFollowers($user_id){

        //people who is follow them
        $followers_ids = Like::where([["liker_id",$user_id],["type","user"]])->select("target_id")->get()->toArray();



        $followers_post = self::where([['status','issued']])->whereIn('Tb_Posts.creator_id', $followers_ids)->orderBy("Tb_Posts.id","desc")
//            ->join('Tb_Images', [['Tb_Images.id', '=', 'Tb_Posts.id'],['Tb_Images.id', '=', 'contacts.user_id']])
            ->limit(10)
            ->get();
//        if(empty($followers_post)){
//            $followers_post = self::where("creator_id","!=",$user_id)->orderBy("id","desc")->limit(10)->get();
//        }
//
//
//        if(empty($followers_post)){
//            $followers_post = self::where("creator_id","=",$user_id)->orderBy("id","desc")->limit(10)->get();
//        }

     //   return $followers_post;



        $posts = self::
            join("TB_Users","Tb_Users.id","=","Tb_Posts.creator_id")
            ->join("TB_Categories","TB_Categories.id","=","Tb_Posts.category_id")
            ->select(
                "Tb_Posts.*",
                "Tb_Users.username as  creator_name",
                "Tb_Users.profile_image as  creator_profile_image",
                "TB_Categories.title as  category_title"
            )->orderBy("id","desc")->get()->toArray();

        $data = [];
        foreach ($posts as $post){
            $attachments = PostAttachments::where("post_id",$post['id'])->get()->toArray();
            $likes = Like::where([["target_id",$post['id']],['type',"post"]])->count();
            $comments = Comment::where("post_id",$post['id'])->count();
//
//            $attachments = [];
//            foreach ($data_ata  as $attchment ){
//                $attchment['path'] = url(""). $attchment['path'];
//                $attachments[] = $attchment;
//            }
            $post["isILiked"] = false;

            if($likes>=1){
                $myLike = Like::where([["target_id",$post['id']],['type',"post"],['liker_id',$user_id]])->count();


                if($myLike>=1){
                    $post["isILiked"] = true;
                }
            }


            $post["attachments"] = $attachments;
            $post["likes_count"] = $likes;
            $post["comments_count"] = $comments;




            // is likes or fav


            $data[]= $post;
        }
        return $data;

    }



    public  static  function get($post_id,$user_id){

        $post = self::where("Tb_Posts.id",$post_id)
            ->join("Tb_Categories","Tb_Categories.id","Tb_Posts.category_id")
            ->join("Tb_Users","Tb_Users.id","Tb_Posts.creator_id")
            ->select(
                "Tb_Posts.*",
                "Tb_Users.username as  creator_name",
                "Tb_Users.profile_image as  creator_profile_image",
                "TB_Categories.title as  category_title",
            )
            ->first();

        if(!empty($post)){
            $likes = Like::where([["target_id",$post['id']],['type',"post"]])->count();

            $comments = Comment::where("Tb_Comments.post_id",$post_id)
                ->join("Tb_Users","Tb_Users.id","Tb_Comments.creator_id")
                ->select(
                    "Tb_Comments.*",
                    "Tb_Users.username as  creator_name",
                    "Tb_Users.profile_image as  creator_profile_image"
                )
                ->get()->toArray();
            $post->comments = $comments;
            $post->comments_count = count($comments);
            $post->likes_count = $likes;


            $post->isILiked = false;

            if($likes>=1){
                $myLike = Like::where([["target_id",$post['id']],['type',"post"],['liker_id',$user_id]])->count();


                if($myLike>=1){
                    $post->isILiked = true;
                }
            }









            $attachments = PostAttachments::where("post_id",$post['id'])->get()->toArray();

            $post_probs = PostProbs::where("Tb_Post_probs.post_id",$post_id)
                ->join("Tb_Category_prop_titles","Tb_Category_prop_titles.id","Tb_Post_probs.prob_title_id")
                ->join("Tb_Category_prop_values","Tb_Category_prop_values.id","Tb_Post_probs.prob_value_id")
                ->select(
                    "Tb_Post_probs.*",
                    "Tb_Category_prop_titles.title as title",
                    "Tb_Category_prop_values.title as value"
                )
                ->get()->toArray();



            $post->properties = $post_probs;
            $post->attachments = $attachments;
        }

        return $post;

    }









}
