<?php


use Illuminate\Database\Seeder;
use \App\Models\CategoryPropTitles;
class CategoryProbTitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //


        CategoryPropTitles::insert(
            [
                [
                    "category_id"=>3,
                    "title"=>"Model"
                ],
                [
                    "category_id"=>3,
                    "title"=>"Storage Capacity"
                ],
                [

                    "category_id"=>3,
                    "title"=>"Color"
                ],


                [
                    "category_id"=>3,
                    "title"=>"Condition"
                ],



                [
                    "category_id"=>5,
                    "title"=>"Memory"
                ],
                [
                    "category_id"=>5,
                    "title"=>"Hard Drive Capacity"
                ],
                [
                    "category_id"=>5,
                    "title"=>"Family"
                ]



            ]
        );
    }
}
