<?php

use Illuminate\Database\Seeder;
use \App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        User::insert([[
                'phone' => "8839403",
                'email' => str_random(10).'@gmail.com',
                'username'=> str_random(10),
                "profile_image"=>"https://gazettereview.com/wp-content/uploads/2016/03/facebook-avatar.jpg",
                "bio"=>"مستشاري عقاري لعدد من المكاتب العقارية والاقليمية في دبى",
                "website"=>"https://google.com"
            ],
            [
                'phone' => "249967131260",
                'email' => 'marag@gmail.com',
                'username'=> "marag",
                "profile_image"=>"https://i.pinimg.com/originals/f0/1b/f2/f01bf2ac6c2960baaed5058aa7121927.jpg",
                "bio"=>"Boga Boga",
                "website"=>"https://www.boga_love.com"
            ],
            [
                'phone' => "249966324018",
                'email' => 'ali@gmail.com',
                'username'=> "Ali Abdalla",
                "profile_image"=>"https://cdn.vox-cdn.com/thumbor/VHfWfkRkZArOdK2ZAi-jlndH6pw=/0x0:1920x1080/1820x1213/filters:focal(1101x386:1407x692):format(webp)/cdn.vox-cdn.com/uploads/chorus_image/image/62623727/0_sZnr3Tr_6978vmjQ.0.jpg",
                "bio"=>"One Love, Boga is My Love",
                "website"=>"https://aliabdalla.com"
            ],
            [
                'phone' => "966556045415",
                'email' => str_random(10).'@gmail.com',
                'username'=> str_random(10),
                "profile_image"=>"https://i.pinimg.com/474x/04/c7/8a/04c78a3bec46babab4a23e3e13091552--cover-picture-facebook-profile.jpg",
                "bio"=>"من حقي أغني العالم إبداع وعلم حرية",
                "website"=>"https://google.com",

            ],
            [
                'phone' => "2498435",
                'email' => 'batman@gmail.com',
                'username'=>"batman",
                "profile_image"=>"https://www.sideshow.com/product-asset/9030271",
                "bio"=>"batman anime",
                "website"=>"https://batman.com",

            ],
            [
                'phone' => "34342223",
                'email' => 'superman@gmail.com',
                'username'=>"superman",
                "profile_image"=>"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSHkmdx4NT9XH_6LnLme6PrAlRamKxNwaFi-LjCPS9TTeu2N5cvdQ",
                "bio"=>"superman anime",
                "website"=>"https://superman.com",

            ],
            [
                'phone' => "003400343",
                'email' => 'hulk@gmail.com',
                'username'=>"superman",
                "profile_image"=>"https://media.tenor.com/images/ad880f2d72f514e5c088d28acc1c3bde/tenor.png",
                "bio"=>"hulk anime",
                "website"=>"https://hulk.com",

            ],
            [
                'phone' => "002324934",
                'email' => 'ironman@gmail.com',
                'username'=>"ironman",
                "profile_image"=>"https://is1-ssl.mzstatic.com/image/thumb/Video128/v4/89/74/cf/8974cfa0-5e27-1c5e-390a-e97e5d12a51d/contsched.rdzrzprk.lsr/268x0w.jpg",
                "bio"=>"ironman anime",
                "website"=>"https://ironman.com",

            ],
            [
                'phone' => "00993994839",
                'email' => 'catwoman@gmail.com',
                'username'=>"catwoman",
                "profile_image"=>"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR_WbNZk-tPYh_iW8UrS-t5YzVdhIzYvGa45Q5BfPfkzLyGL5O3uQ",
                "bio"=>"catwoman anime",
                "website"=>"https://catwoman.com",

            ],
            



        ]);


    }
}
