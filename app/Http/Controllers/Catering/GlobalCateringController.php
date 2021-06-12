<?php


namespace App\Http\Controllers\Catering;


use App\CateringOrder;
use App\Http\Controllers\Controller;
use Illuminate\Http\Client\Request;

class GlobalCateringController extends Controller
{
    public function book_order(Request $request)
    {
        $order =  new CateringOrder();
        $order->username = $request->username;
        $order->catering_id = $request->catering_id;
        $order->date = $request->date;
        $order->email = $request->email;
        $order->phone = $request->phone;
        $order->save();
        $message = ["status" => "True"];
        return response($message, 200);


    }

}
