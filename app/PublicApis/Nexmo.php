<?php

namespace App\PublicApis;

use Illuminate\Database\Eloquent\Model;

class Nexmo extends Model
{
    //


    public  static function  sendSmsMessage($phone = "966556045415",$message_text = "Hello from Nexmo"){
        $basic  = new \Nexmo\Client\Credentials\Basic('42b7fb7a', 'Fsz8iOCakSVP9hUt');
        $client = new \Nexmo\Client($basic);
        $message = $client->message()->send([
            'to' => $phone,
            'from' => 'Leegita',
            'text' => $message_text
        ]);


        return $message;
    }
}
