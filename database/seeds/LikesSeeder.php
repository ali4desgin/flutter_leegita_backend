<?php

use Illuminate\Database\Seeder;
use \App\Models\Like;

class LikesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        Like::insert([
            [
                "target_id"=>1,
                "liker_id"=>1,
                "type"=>"post"
            ],
            [
                "target_id"=>1,
                "liker_id"=>2,
                "type"=>"post"
            ],
            [
                "target_id"=>2,
                "liker_id"=>1,
                "type"=>"post"
            ],
            [
                "target_id"=>2,
                "liker_id"=>2,
                "type"=>"post"
            ],






        ]);
    }
}
