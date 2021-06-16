<?php


namespace App\Http\Controllers\Restaurant;



use App\CateringContent;
use App\Http\Controllers\Controller;

class GlobalRestaurantsController extends Controller
{
    public function getcateringServices()
    {
        $cateringservices = CateringContent::select('company_title','bannerImg','id')->where('status','=','Active')->where('admin_status','=','Approved')->get();
        $message = ["status" => "True","Providers" => $cateringservices];
        return response($message, 200);
    }

}
