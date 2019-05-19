<?php

use Illuminate\Database\Seeder;
use \App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //


        Category::insert(
            [
                [
                    'title' => "Apple",
                    'image' => "https://techrabies.com/wp-content/uploads/2019/01/f.jpeg",
                    'subtitle'=> "iPhone, iPad, Mac, Apple TV und Apple Watch. Mehr Infos und jetzt kaufen. Kostenlose Lieferung. Persönliches Setup.",
                    "parent_id"=>0
                ],
                [
                    'title' => "Samsung",
                    'image' => "http://static.jbcgroup.com/amd/pictures/c6d5fdd76ba159046f4bbb1233988c85.jpg",
                    'subtitle'=> "Meet the next generation Galaxy S10e, S10 & S10+. With a cinematic Infinity Display, Ultrasonic Fingerprint, Pro-grade Camera, and intelligent performance.",
                    "parent_id"=>0
                ],




                // apple
                [
                    'title' => "Iphone",
                    'image' => "https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/image/AppleInc/aos/published/images/i/ph/iphone7/select/iphone7-select-2019-family?wid=882&amp;hei=1058&amp;fmt=jpeg&amp;qlt=80&amp;op_usm=0.5,0.5&amp;.v=1550795429263",
                    'subtitle'=> "Two great ways to buy. Just trade in your current iPhone online or at an Apple Store.*",
                    "parent_id"=>1
                ],
                [
                    'title' => "Ipad",
                    'image' => "https://apple.com/v/ipad/home/aq/images/overview/ipad__bj8z4pfznqnm_large_2x.jpg",
                    'subtitle'=> "iPhone, iPad, Mac, Apple TV und Apple Watch. Mehr Infos und jetzt kaufen. Kostenlose Lieferung. Persönliches Setup.",
                    "parent_id"=>1
                ]
                ,
                [
                    'title' => "Mac",
                    'image' => "https://www.apple.com//v/macbook-pro/t/images/overview/performance/perf_gallery_screen_photo_large_2x.jpg",
                    'subtitle'=> "More power. More performance. More pro",
                    "parent_id"=>1
                ],






                // Samsung
                [
                    'title' => "Galaxy",
                    'image' => "https://images.samsung.com/uk/smartphones/galaxy-s10/images/galaxy-s10_highlights_kv.jpg",
                    'subtitle'=> "The result of 10 years of pioneering mobile firsts, the Galaxy S10e, S10 and S10+ introduce the next generation of mobile innovation.",
                    "parent_id"=>1
                ]




        ]);
    }
}
