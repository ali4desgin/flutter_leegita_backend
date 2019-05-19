<?php

use Illuminate\Database\Seeder;
use \App\Models\PostProbs;
class PostProbsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        PostProbs::insert([
            [

                "post_id"=>1,
                "category_id"=>1,
                "prob_title_id"=>1,
                "prob_value_id"=>3

            ],


            [

                "post_id"=>1,
                "category_id"=>1,
                "prob_title_id"=>2,
                "prob_value_id"=>6

            ],

            [

                "post_id"=>1,
                "category_id"=>1,
                "prob_title_id"=>3,
                "prob_value_id"=>9

            ],

            [

                "post_id"=>1,
                "category_id"=>1,
                "prob_title_id"=>4,
                "prob_value_id"=>13

            ],












            [

                "post_id"=>2,
                "category_id"=>5,
                "prob_title_id"=>5,
                "prob_value_id"=>15

            ],


            [

                "post_id"=>2,
                "category_id"=>5,
                "prob_title_id"=>6,
                "prob_value_id"=>19

            ],

            [

                "post_id"=>2,
                "category_id"=>5,
                "prob_title_id"=>7,
                "prob_value_id"=>21

            ]
            


            ]);
    }
}
