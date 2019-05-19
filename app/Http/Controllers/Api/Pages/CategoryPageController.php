<?php

namespace App\Http\Controllers\Api\Pages;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CategoryPropTitles;
use App\Models\CategoryPropValues;
use App\Models\PostProbs;
use App\Models\Post;
class CategoryPageController extends Controller
{
    //

    public function index($user_id){

        $categories = Category::mainWithSubCateories();


       
        $response["response"]= true;
        $response["message"]= "category data loaded";
        $response["categories"]= $categories;
        return $response;

    }


    public function search($keyword,$user_id){
        $categories = Category::searchMainWithSubCateories($keyword);
        return $categories;

    }


    public function view_category($category_id,$user_id){

    	$posts = [];
    	$subcategories = [];
    	$filters = [];


    	$category = Category::find($category_id);

    	$ftitles = CategoryPropTitles::where("category_id",$category_id)->get()->toArray();

    	$subcategories  = Category::where("parent_id",$category_id)->get()->toArray();
    	// $posts = Post::categoryPosts($category_id,$user_id);

    	foreach ($subcategories  as $subcategory) {
    		$sposts = Post::categoryPosts($subcategory['id'],$user_id);
    		// $posts[] = 	$sposts;

    		foreach ($sposts as $spost) {
    			$posts[] = $spost;
    		}
    	//	array_merge($posts, $sposts);

    	}



    	foreach ($ftitles  as $ftitle) {
    		 $fvalues = CategoryPropValues::where("category_prob_title_id",$ftitle['id'])->get()->toArray();

    		 $ftitle['values'] = $fvalues;
    		 $filters[] = $ftitle;

    	}


    	// return $filters;
    	// if(count($sub_posts)>=1){
    	// 	$posts =  array_merge($cposts, $sub_posts);
    	// }else{
    	// 	$posts =  $cposts;
    	// }
    	



    	$response["response"]= true;
    	$response["message"]= "category data loaded";
    	$response["filters"]= $filters;
        $response["posts"]= $posts;
        $response["subcategories"]= $subcategories;

    	

    	return $response;


    }





}
