<?php

namespace App\Http\Controllers\Api\Elements;

use App\Models\Comment;
use App\Models\PostProbs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Post;
use App\Models\PostAttachments;
use Intervention\Image\Facades\Image;


class PostController extends Controller
{
    //


    public function upload_post_attachments(Request $request){
//        $image = "/" .  $request->file("attachment")->store("attachments");

        $image = $request->file('attachment');
        $input['name'] = time().'.'.$image->getClientOriginalExtension();


        if(env("APP_DEBUG") == true || env("APP_DEBUG") == "true"){
            $upload_path = public_path('/images');
            $saved_path = "/public/images/";
        }else{
            $upload_path = storage_path('/app/attachments');
            $saved_path = "/storage/app/attachments/";
        }



        $upload_path = public_path('/images');
        $saved_path = "/public/images/";


        $destinationPath = $upload_path;

        $path = $destinationPath.'/'.$input['name'];
        $img = Image::make($image->getRealPath());
        $img->resize(800, 300, function ($constraint) use ($path) {
            $constraint->aspectRatio($path);
        })->save();



        $image->move($destinationPath, $input['name']);

        return  $saved_path . $input['name'];


    }

    public function create_post(Request $request){

        $filters = $request->input("filters");


        $response = [];
        $rules = [
            "creator_id"=>"required|integer|exists:Tb_Users,id",
            "category_id"=>"required|integer|exists:Tb_Categories,id",
            "price"=>"required|String",
            "description"=>"required|String",
            "title"=>"required|String",
            "attachments"=>"required|array",
//            "filter_id"=>"required|array",
//            "filter_value"=>"required|array",
        ];


        $validator = Validator::make($request->all(), $rules);


        if($validator->fails()){
            $response['response']=false;
            $response['message']=$validator->messages()->first();

        }else{

            $saved = Post::store($request->all());


            if(!$saved){


                $response['response']=false;
                $response['message']="error! post is not saved , try again";
            }else{
                

                foreach ($request->file("attachments") as $attachment){

                    $path = PostAttachments::resizeAndStoreImage($attachment,$saved);
                    $pattachment = new PostAttachments();
                    $pattachment->post_id= $saved;
                    $pattachment->path= url("").$path;
                    $pattachment->type  = "image";
                    $pattachment->save();
                }



                foreach ($request->input("filter_id") as $key => $value ){
                        $pfilter = new PostProbs();
                        $pfilter->post_id = $saved;
                        $pfilter->category_id = $request->input("category_id");
                        $pfilter->prob_title_id = $key;
                        $pfilter->prob_value_id = $value;
                        $pfilter->save();
                }


                $response['response']=true;
                $response['post_id']=$saved;
                 $response['filters']=$request->input("filters");
                $response['message']="your post has been created successfuly";
            }


            

        }



        
        return $response;
    }

    public function  add_comment(Request $request){
        $response = [];
        $rules = [
            "user_id"=>"required|integer|exists:Tb_Users,id",
            "post_id"=>"required|integer|exists:Tb_Posts,id",
            "comment"=>"required|String|min:2",
        ];



        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            $response['response']=false;
            $response['message']=$validator->messages()->first();

        }else{




            





        }


        return $response;
    }
}
