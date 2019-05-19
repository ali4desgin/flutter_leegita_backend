<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\UserAuthentication;
use App\PublicApis\Nexmo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //

    public  function  authentication(Request $request){
        $response = [];
        $rules = [
            "phone"=>"required|string|min:8|max:15"
        ];



        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            $response['response'] = false;
            $response['message'] = $validator->messages()->first();
        }else{


            $authentication_code = rand(9999,999999);
            $phone = $request->phone;
            $user = User::where("phone",$phone)->first();

            if(empty($user)){
                $new_user = new User();
                $new_user->phone = $phone;
                $new_user->save();
                $user_id = $new_user->id;
            }else{
                $user_id = $user->id;
            }




            $authentication = new  UserAuthentication();
            $authentication->user_id = $user_id;
            $authentication->authentication_code = $authentication_code;
            $authentication->save();


            $message = "you authentication code " . $authentication_code;

//            Nexmo::sendSmsMessage($phone,$authentication_code);
            $response['response'] = true;
            $response['user_id'] = $user_id;
//            $response['friends'] = [];
//            $response['posts'] = [];
            $response['message'] = $message;

        }


        return $response;
    }




    public  function  resent_authentication_code(Request $request){
        $response = [];
        $rules = [
            "user_id"=>"required|integer|exists:Tb_Users,id"
        ];



        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            $response['response'] = false;
            $response['message'] = $validator->messages()->first();
        }else{


            $authentication_code = rand(9999,999999);



            $authentication = new  UserAuthentication();
            $authentication->user_id = $request->user_id;
            $authentication->authentication_code = $authentication_code;
            $authentication->save();


            $message = "you authentication code " . $authentication_code;

//            Nexmo::sendSmsMessage($phone,$authentication_code);
            $response['response'] = true;
            $response['message'] = $message;

        }


        return $response;
    }




    public  function  auth_verification(Request $request){
        $response = [];
        $rules = [
            "user_id"=>"required|integer|exists:Tb_Users,id",
            "code"=>"required"
        ];



        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            $response['response'] = false;
            $response['message'] = $validator->messages()->first();
        }else{

            $auth_data =  UserAuthentication::where([["user_id",$request->user_id],["status","not_used"]])->orderBy("id","desc")->first();


            if(empty($auth_data)){
                $response['response'] = false;
                $response['message'] = "please resent code again and try later!";
            }else{


                if($request->code==$auth_data->authentication_code){

                    $auth_data->status="used";
                    $auth_data->save();
                    $response['response'] = true;
                    $response['message'] = "user successfuly authenticated ";


                }else{

                    $response['response'] = false;
                    $response['message'] = "verification code is not right!";
                }




            }

        }


        return $response;
    }




    public  function  info($user_id){

        $user =  User::find($user_id);
        $response = [];


        if(empty($user)){
            $response['response'] = false;
            $response['message'] = "user id not valid";

        }else{

            $response['response'] = true;
            $response['user'] = $user;

        }


        return $response;

    }





}
