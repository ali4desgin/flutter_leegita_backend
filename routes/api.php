<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::namespace("Api")->group(function(){








    Route::namespace("Elements")->prefix("load")->group(function() {




        Route::prefix("category")->group(function() {
            Route::get("/{parent_id}", "CategoryController@category");

        });

   



    });



    Route::namespace("Elements")->prefix("update")->group(function() {

        Route::prefix("post")->group(function() {
            Route::post("create_post", "PostController@create_post");
             Route::post("upload_post_attachments", "PostController@upload_post_attachments");
            Route::post("add_comment", "PostController@add_comment");

        });



        Route::prefix("category")->group(function() {
            Route::get("main_only", "CategoryController@main_only");

        });

        Route::prefix("like")->group(function() {
            Route::get("add/{liker_id}/{user_id}", "LikeController@add_user_like");
            Route::get("remove/{liker_id}/{user_id}", "LikeController@remove_user_like");
            Route::get("for_post/{post_id}/{user_id}", "LikeController@update_for_post");

        });



    });


    Route::namespace("Pages")->prefix("pages")->group(function() {

        Route::prefix("home")->group(function () {
            Route::get("/{user_id}", "HomePageController@index");
            Route::get("/post_likes/{post_id}", "HomePageController@post_likes");
            Route::get("/search/{user_id}", "HomePageController@search");
        });




        Route::prefix("profile")->group(function () {
            Route::get("/{user_id}", "ProfilePageController@my_profile");
            Route::get("/user/{user_id}/{my_id}", "ProfilePageController@user_profile");
           
        });




        Route::prefix("post")->group(function () {
            Route::get("/{post_id}/{user_id}", "PostPageController@post");

        });






        Route::prefix("category")->group(function () {
            Route::get("/{user_id}", "CategoryPageController@index");
            Route::get("/search/{keyword}/{user_id}", "CategoryPageController@search");

            Route::get("/search/{keyword}/{user_id}", "CategoryPageController@search");


            Route::get("/view_category/{category_id}/{user_id}", "CategoryPageController@view_category");



        });


        Route::prefix("search")->group(function () {
            Route::post("/", "SearchPageController@load");
            Route::get("/suggestions/{user_id}", "SearchPageController@suggestions");
        });


    });




    Route::prefix("user")->group(function() {
       Route::get("/auth","UserController@authentication");
       Route::get("/resent_authentication","UserController@resent_authentication_code");
       Route::get("/auth_verification","UserController@auth_verification");
       Route::get("/info/{user_id}","UserController@info");
    });






});






