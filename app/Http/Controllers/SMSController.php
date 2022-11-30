<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RoyceLtd\LaravelBulkSMS\Facades\RoyceBulkSMS;

class SMSController extends Controller
{
    function send(){
        $phone = "01305686771";
        $message = "Hello world";
        RoyceBulkSMS::sendSMS($phone, $message);

        return redirect()->back()->with('success', 'SMS Send');
    }
}
