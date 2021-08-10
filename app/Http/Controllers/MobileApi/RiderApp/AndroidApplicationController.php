<?php


namespace App\Http\Controllers\MobileApi\RiderApp;


use App\FoodOrder;
use App\Http\Controllers\Controller;

class AndroidApplicationController extends Controller
{
    public function searchOrders()
    {
        $orders = FoodOrder::where('rider_status','=','searching')->where('rider_status','=','searching')->get();
        $message1 = [
            "status" => "True",
            "data" => $orders
        ];

        return response($message1, 200);
    }

}
