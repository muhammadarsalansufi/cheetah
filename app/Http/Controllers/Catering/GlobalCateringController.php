<?php


namespace App\Http\Controllers\Catering;


use App\CateringContent;
use App\CateringOrder;
use App\CateringServiceProvider;
use App\CateringStaff;
use App\Http\Controllers\Controller;
use App\Testimonials;
use Illuminate\Http\Request;

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
    public function getcateringServices()
    {
        $cateringservices = CateringContent::select('company_title','bannerImg','id')->where('status','=','Active')->where('admin_status','=','Approved')->get();
        $message = ["status" => "True","Providers" => $cateringservices];
        return response($message, 200);
    }
    public function getsinglecateringServices(Request $request)
    {
        $id =  $request->id;
        $user_id =  CateringContent::where('id','=',$id)->where('status','=','Active')->where('admin_status','=','Approved')->pluck('user_id')->first();;
        $cateringservices = CateringContent::where('id','=',$id)->where('status','=','Active')->where('admin_status','=','Approved')->get();
        $cateringtesti = Testimonials::select()->where('catering_id','=',$user_id)->get();
        $cateringstaff = CateringStaff::select()->where('status','=','Active')->where('user_id','=',$user_id)->get();
        $message = ["status" => "True",
            "Providers" => $cateringservices,
            "Staff" => $cateringstaff,
            "Testimonials" => $cateringtesti];
        return response($message, 200);
    }
}
