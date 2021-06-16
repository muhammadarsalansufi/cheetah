<?php


namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use App\RestuarantContent;

class GlobalRestaurantsController extends Controller
{
    public function getAllRestaurant()
    {
        $cateringservices = RestuarantContent::select('restaurant_name','bannerImg','id')->where('status','=','Active')->where('admin_status','=','Approved')->get();
        $message = ["status" => "True","Providers" => $cateringservices];
        return response($message, 200);
    }

}
