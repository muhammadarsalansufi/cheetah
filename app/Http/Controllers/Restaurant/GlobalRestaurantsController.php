<?php


namespace App\Http\Controllers\Restaurant;

use App\CateringContent;
use App\CateringStaff;
use App\Http\Controllers\Controller;
use App\RestuarantContent;
use App\Resturants;
use App\Testimonials;
use Illuminate\Http\Request;

class GlobalRestaurantsController extends Controller
{
    public function getAllRestaurant()
    {
        $cateringservices = RestuarantContent::select('restaurant_name','bannerImg','id')->where('status','=','Active')->where('admin_status','=','Approved')->get();
        $message = ["status" => "True","Restaurants" => $cateringservices];
        return response($message, 200);
    }
    public function getSingleRestaurant(Request $request)
    {
        $id =  $request->id;
        $user_id =  RestuarantContent::where('id','=',$id)->where('status','=','Active')->where('admin_status','=','Approved')->pluck('user_id')->first();;
        $cateringservices = RestuarantContent::where('id','=',$user_id)->where('status','=','Active')->where('admin_status','=','Approved')->get();
        $cateringtesti = Resturants::select()->where('user_id','=',$user_id)->get();
         $message = ["status" => "True",
            "Content" => $cateringservices,
            "Profile" => $cateringtesti];
        return response($message, 200);
    }

}
