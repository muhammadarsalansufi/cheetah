<?php


namespace App\Http\Controllers\MobileApi\UserApp;


use App\FoodOrder;
use App\Http\Controllers\Controller;
use App\Ingridents;
use Illuminate\Http\Request;

class AndroidApplicationController extends Controller
{
    public function newOrder(Request $request)
    {

        $order =  new FoodOrder();
        $order->order_name = $request->order_name;
        $order->order_contact = $request->order_contact;
        $order->order_address = $request->order_address;
        $order->order_latitude = $request->order_latitude;
        $order->order_longitude = $request->order_longitude;
        $order->order_id = $request->order_id;
        $order->order_tid = $request->order_tid;
        $order->restaurant_id = $request->restaurant_id;
//        $order->restaurant_latitude = $request->restaurant_latitude;
//        $order->restaurant_longitude = $request->restaurant_longitude;
        $order->food_array = $request->food_array;
        $order->payment_mode = $request->payment_mode;
        $order->payment_status = $request->payment_status;
        $order->rider_status = 'searching';
        $order->rider_id = 'searching';
        $order->total_bill = $request->total_bill;
        $order->order_time = $request->order_time;
        $order->delivery_type = $request->delivery_type;
        $order->delivery_time = 'pending';
        $order->delivery_status = 'pending';
        $order->kitchen_status = 'searching';
        $order->status = 'order_confirm';
        $order->order_zip = $request->order_zip;
        $order->rider_latitude =$request->rider_latitude;;
        $order->rider_longitude = $request->rider_longitude;;
        $order->save();
        $code =200;
        $message1 = [
            "status" => "True",
            "Order_detail" => $order

        ];
        if($request->food_array == null)
        {
            $code =401;
            $message1 = [
                "status" => "False",
                "Order_detail" => $order

            ];

        }

        return response($message1, $code);

    }
    public function userActiveOrder()
    {
        return response(["status" => "True", "Order_detail" =>  FoodOrder::where('order_id','=',$user_id = auth()->user()->id)->where('delivery_status','=','pending')->get()], 200);
    }
    public function userCompletedOrders()
    {
        $user_id = auth()->user()->id;
        $order = FoodOrder::where('order_id','=',$user_id)->where('delivery_status','=','completed')->get();
        $message1 = [
            "status" => "True",
            "Order_detail" => $order
        ];

        return response($message1, 200);

    }
    public function food_details(Request $request)
    {
        $message1 = [
            "status" => "True",
            "food_id" => $request->food_id,
            "Order_detail" => Ingridents::select('food_array')->first()
        ];

        return response($message1, 200);
    }

}
