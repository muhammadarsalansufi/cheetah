<?php


namespace App\Http\Controllers\MobileApi\RiderApp;


use App\FoodOrder;
use App\User;
use App\Http\Controllers\Controller;
use App\RejectedFoodOrders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AndroidApplicationController extends Controller
{
    public function searchOrders()
    {
        $orders = FoodOrder::where('rider_status','=','searching')->where('rider_id','=','searching')->get();

        if(count($orders) > 0)
        {
            $orders = FoodOrder::where('rider_status','=','searching')->where('rider_id','=','searching')->first();
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
        if($orders == 1)
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
        $message1 = [
            "status" => "True"
        ];
        return response($message1, 200);
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
    public function ordersHistory(Request $request)
    {
        $id =$request->rider_id;
        $orders = FoodOrder::where('rider_id','=',$id)->where('delivery_status','=','completed')->get();
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
    public function pendingOrders(Request $request)
    {
        $id =$request->rider_id;
        $orders = FoodOrder::where('rider_id','=',$id)->where('delivery_status','=','pending')->get();
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
    public function updatepasswordlink(Request $request)
    {
        $email =  $request->email;
        $record = User::where('email','=',$email)->get();
        if(count($record) > 0)
        {
            $message1 = ["status" => "True"];

        }
        else 
        {
            $message1 = ["status" => "False"];
        }

        return response($message1, 200);

    }
    public function verifycodepassword(Request $request)
    {
        $code  =  $request->code;
        if($code == '1234')
        {
            $message1 = ["status" => "True"];

        }
        else 
        {
            $message1 = ["status" => "False"];
        }

        return response($message1, 200);
        
    }
    public function updateverfypassword(Request $request)
    {
        $email = $request->email;
        $password = $request->new_password;
        $record = User::where('email','=',$email)->update(['password'=>Hash::make($password)]);
        if($record == 1)
        {
            $message1 = ["status" => "True"];

        }
        else 
        {
            $message1 = ["status" => "False"];
        }

        return response($message1, 200);

    }

}
