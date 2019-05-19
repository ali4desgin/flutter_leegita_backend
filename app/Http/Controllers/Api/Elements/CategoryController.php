<?php

namespace App\Http\Controllers\Api\Elements;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CategoryPropTitles;
use App\Models\CategoryPropValues;
use App\Models\PostProbs;
class CategoryController extends Controller
{
    //

    public function category($parent_id){
    	$categories = Category::where("parent_id",$parent_id)->get()->toArray();
    	$data = [];
    	foreach ($categories as $category) {

    			$sfilters = CategoryPropTitles::where("Tb_Category_prop_titles.category_id",$category['id'])->get()->toArray();

    			$filters = [];
    			foreach ($sfilters as $filter) {
    				$values = CategoryPropValues::where("category_prob_title_id",$filter['id'])->get()->toArray();

    				$filter['values'] =$values; 

    				$filters[] = $filter;
    			}

               	$subcategories = Category::where("parent_id",$category['id'])->get()->toArray();
               	$category['subcategories']=  $subcategories;
               	$category['filters']=  $filters;

               	$data[] = $category;

        }


    	$response['response'] = true;
    	$response['message'] = "main categories only list";
    	$response['categories'] = $data;
    	return $response;
    }
}
