<?php


namespace App\Http\Controllers\MobileApi\RiderApp;


use App\FoodOrder;
use App\Http\Controllers\Controller;
use App\RejectedFoodOrders;
use Illuminate\Http\Request;

class AndroidApplicationController extends Controller
{
    public function searchOrders()
    {
        $orders = FoodOrder::where('rider_status','=','searching')->where('rider_id','=','searching')->first();

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
    public function acceptOrder(Request $request)
    {
        $orders = FoodOrder::where('id','=',$request->order_id)->where('rider_id','=','searching')->update([
            'rider_status'=>'founded',
            'rider_id'=>$request->rider_id
        ]);
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
    public function declineOrder(Request $request)
    {
        $order = new RejectedFoodOrders();
        $order->order_id = $request->order_id;
        $order->order_id = $request->order_id;
        $order->save();
    }
    public function cancleOrder(Request $request)
    {
        $orders = FoodOrder::where('id','=',$request->order_id)->where('rider_id','=','founded')->update([
            'rider_status'=>'searching',
            'rider_id'=>'searching'
        ]);
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
    public function ordersHistory()
    {
        $id =auth()->user()->id;
        $orders = FoodOrder::where('id','=',$id)->where('delivery_status','=','completed')->get();
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
    public function pendingOrders()
    {
        $id =auth()->user()->id;
        $orders = FoodOrder::where('id','=',$id)->where('delivery_status','=','pending')->get();
        if(count($orders) > 0)
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
    public function editRiderProfile()
    {

    }
    public function rejectedOrderList()
    {

    }

}
