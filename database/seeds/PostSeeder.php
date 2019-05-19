<?php

use Illuminate\Database\Seeder;

use \App\Models\Post;
class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Post::insert( [
            [
                'creator_id' => 1,
                "category_id"=>3,
                'title' => "iphone 7",
                'description'=> "iPhone, iPad, Mac, Apple TV und Apple Watch. Mehr Infos und jetzt kaufen. Kostenlose Lieferung. Persönliches Setup.",
                "price"=>1000.00,
                "currency"=>"SAR",
                "location"=>"saudi arebia",

            ],
            [
                'creator_id' => 1,
                "category_id"=>5,
                'title' => "MacBook Pro",
                'description'=> "iPhone, iPad, Mac, Apple TV und Apple Watch. Mehr Infos und jetzt kaufen. Kostenlose Lieferung. Persönliches Setup.",
                "price"=>3000.00,
                "currency"=>"SAR",
                "location"=>"saudi arebia",

            ],
            [
                'creator_id' => 2,
                "category_id"=>5,
                'title' => "Samsung A70",
                'description'=> "new android lovelly mobile app",
                "price"=>1500.00,
                "currency"=>"SAR",
                "location"=>"saudi arebia",

            ]



        ]);





    }
}
