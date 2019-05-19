<?php

use Illuminate\Database\Seeder;

use \App\Models\PostAttachments;
class PostAttahchmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        PostAttachments::insert([
            [
                "post_id"=>1,
                "path"=>"https://i.ytimg.com/vi/UY1vavlTD3Q/maxresdefault.jpg",
                "type"=>"image"
            ],
            [
                "post_id"=>1,
                "path"=>"https://i.ytimg.com/vi/BttR-iE7dfY/maxresdefault.jpg",
                "type"=>"image"
            ],

            [
                "post_id"=>1,
                "path"=>"https://i.ytimg.com/vi/OFGs0f_6OJE/hqdefault.jpg",
                "type"=>"image"
            ],




            [
                "post_id"=>2,
                "path"=>"https://assets.pcmag.com/media/images/517659-apple-macbook-pro-15-inch.jpg?width=810&height=456",
                "type"=>"image"
            ],
            [
                "post_id"=>2,
                "path"=>"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRuRmWrdbmyTpPhsxSM5oQ5Acxirs1nmY0-poDXUCorPl2RZGBz",
                "type"=>"image"
            ],

            [
                "post_id"=>2,
                "path"=>"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS9LL6uNtus732SBq_VAoCfsjcwBHHMUp3zRmkJBFDJjoyzUFKc",
                "type"=>"image"
            ],
            [
                "post_id"=>2,
                "path"=>"https://assets.pcmag.com/media/images/517659-apple-macbook-pro-15-inch.jpg?width=810&height=456",
                "type"=>"image"
            ],
            [
                "post_id"=>2,
                "path"=>"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRuRmWrdbmyTpPhsxSM5oQ5Acxirs1nmY0-poDXUCorPl2RZGBz",
                "type"=>"image"
            ],

            [
                "post_id"=>2,
                "path"=>"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS9LL6uNtus732SBq_VAoCfsjcwBHHMUp3zRmkJBFDJjoyzUFKc",
                "type"=>"image"
            ],
            [
                "post_id"=>2,
                "path"=>"https://assets.pcmag.com/media/images/517659-apple-macbook-pro-15-inch.jpg?width=810&height=456",
                "type"=>"image"
            ],
            [
                "post_id"=>2,
                "path"=>"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRuRmWrdbmyTpPhsxSM5oQ5Acxirs1nmY0-poDXUCorPl2RZGBz",
                "type"=>"image"
            ],

            [
                "post_id"=>2,
                "path"=>"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS9LL6uNtus732SBq_VAoCfsjcwBHHMUp3zRmkJBFDJjoyzUFKc",
                "type"=>"image"
            ],
            [
                "post_id"=>3,
                "path"=>"https://i1.wp.com/www.spicestech.com/wp-content/uploads/2019/05/samsung-galaxy-A70.jpg?resize=300%2C231&ssl=1",
                "type"=>"image"
            ],
            [
                "post_id"=>3,
                "path"=>"http://www.aimsouq.com/image/cache/catalog/Samsung/A70/samsung-galaxy-a70-800x800.jpg",
                "type"=>"image"
            ]


        ]);

    }
}
