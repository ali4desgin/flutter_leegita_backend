<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table = "Tb_Categories";


    public  static  function  mainWithSubCateories(){

        $maincategories = self::where("parent_id",0)->get()->toArray();

        $data = [];
        foreach ($maincategories as $category){
            $subcategories = self::where("parent_id",$category['id'])->get()->toArray();
            $category['subcategories'] = $subcategories;

            $data[] = $category;
        }



        return $data;

    }


    public  static  function  searchMainWithSubCateories($keyword){

        $maincategories = self::where("title","LIKE",'%' . $keyword .'%')->orWhere("subtitle","LIKE",'%' . $keyword .'%')->get()->toArray();

        return $maincategories;

    }




}
