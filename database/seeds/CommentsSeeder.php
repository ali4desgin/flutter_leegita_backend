<?php

use Illuminate\Database\Seeder;
use \App\Models\Comment;
class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Comment::insert([
            [
                "post_id"=>1,
                "creator_id"=>1,
                "message"=>"i love this iphone can i get it for 800 SAR",

            ],
            [
                "post_id"=>1,
                "creator_id"=>2,
                "message"=>"I will pay 820 SAR for it do we have deel ?",

            ],


            [
                "post_id"=>2,
                "creator_id"=>2,
                "message"=>"this is good mac but it is too expensive",

            ]

        ]);
    }
}
