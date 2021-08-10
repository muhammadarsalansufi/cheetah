<?php


namespace App\Http\Controllers\MobileApi\RiderApp;


use App\FoodOrder;
use App\Http\Controllers\Controller;

class AndroidApplicationController extends Controller
{
    public function searchOrders()
    {
        $orders = FoodOrder::where('rider_status','=','searching')->where('rider_status','=','searching')->first();

        if($orders > 0)
        {
            $message1 = [
                "status" => "True",
                "data" => $orders
            ];
        }
        else
        {
            $message1 = [
                "status" => "False"
            ];
        }

        return response($message1, 200);
    }

}
