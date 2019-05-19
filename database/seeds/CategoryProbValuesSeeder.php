<?php

use Illuminate\Database\Seeder;
use \App\Models\CategoryPropValues;

class CategoryProbValuesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        CategoryPropValues::insert([
            [
                "category_prob_title_id"=>1,
                "title"=>"Iphone x"
            ],
            [
                "category_prob_title_id"=>1,
                "title"=>"Iphone XR"
            ]
            ,
            [
                "category_prob_title_id"=>1,
                "title"=>"Iphone 7"
            ],
            [
                "category_prob_title_id"=>1,
                "title"=>"Iphone 6"
            ],



            [
                "category_prob_title_id"=>2,
                "title"=>"64 GB"
            ],
            [
                "category_prob_title_id"=>2,
                "title"=>"128 GB"
            ]
            ,
            [
                "category_prob_title_id"=>2,
                "title"=>"256 GB"
            ],



            [
                "category_prob_title_id"=>3,
                "title"=>"Gray"
            ],
            [
                "category_prob_title_id"=>3,
                "title"=>"Gold"
            ]
            ,
            [
                "category_prob_title_id"=>3,
                "title"=>"Black"
            ],




            [
                "category_prob_title_id"=>4,
                "title"=>"New"
            ],
            [
                "category_prob_title_id"=>4,
                "title"=>"Used"
            ],





            [
                "category_prob_title_id"=>4,
                "title"=>"New"
            ],
            [
                "category_prob_title_id"=>4,
                "title"=>"Used"
            ],




            [
                "category_prob_title_id"=>5,
                "title"=>"16GB"
            ],
            [
                "category_prob_title_id"=>5,
                "title"=>"8GB"
            ],
            [
                "category_prob_title_id"=>5,
                "title"=>"4GB"
            ],




            [
                "category_prob_title_id"=>6,
                "title"=>"256GB"
            ],
            [
                "category_prob_title_id"=>6,
                "title"=>"512GB"
            ],
            [
                "category_prob_title_id"=>6,
                "title"=>"1024GB"
            ],




            [
                "category_prob_title_id"=>7,
                "title"=>"New"
            ],
            [
                "category_prob_title_id"=>7,
                "title"=>"Used"
            ],
        ]);
    }
}
