<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserStatus extends Model
{
    //
    protected  $table = "Tb_UserStatuses";



    public static  function  getFollowersStatuses($user_id){
        return self::all();
    }



}
