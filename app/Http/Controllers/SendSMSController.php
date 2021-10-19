<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SendSMSController extends Controller
{
    public function index()
    {

        $basic  = new \Nexmo\Client\Credentials\Basic('7aab2b34', 'yijub8MwbvJplIgp');
        $client = new \Nexmo\Client($basic);

        $message = $client->message()->send([
            'to' => '+237678902145',
            'from' => 'Money Bag',
            'text' => 'A test'
        ]);

        dd('message send successfully');
    }
}
