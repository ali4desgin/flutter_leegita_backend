<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Facades\Image;
class PostAttachments extends Model
{
    //

    protected  $table = "Tb_Post_attachments";

    public static function resizeAndStoreImage($attachment,$post_id){

        $image = $attachment;
        $name = uniqid() . "_" . time() . "_" .$post_id.'.'.$image->getClientOriginalExtension();



        if(env("APP_DEBUG") == true || env("APP_DEBUG") == "true"){
            $upload_path = public_path('/images');
            $saved_path = "/images/";
        }else{
            $upload_path = storage_path('/app/attachments');
            $saved_path = "/storage/app/attachments/";
        }


        $destinationPath = $upload_path;




        $path = $destinationPath.'/'.$name;
        $img = Image::make($image->getRealPath());
        $img->resize(1000, 700, function ($constraint) use ($path) {
            $constraint->aspectRatio($path);
        })->save();



        $image->move($destinationPath, $name);

        return $saved_path. $name;
    }
}
