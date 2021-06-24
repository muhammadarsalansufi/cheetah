<?php


namespace App\Http\Controllers\Catering;


use App\CateringServiceProvider;
use App\Http\Controllers\Controller;
use App\RestuarantContent;
use App\Resturants;
use App\User;
use Illuminate\Http\Request;

class SuperAdminPermissionController extends Controller
{
    public function cateringlistadmin()
    {
        $record = CateringServiceProvider::all();
        $message = ["status" => "True",
            "Content" => $record];
        return response($message, 200);
    }
    public function updaterestaurantlistitem(Request $request)
    {
        $id = $request->id;
        $userid = Resturants::where('id','=',$id)->pluck('user_id')->first();
        $updateprofile = Resturants::where('user_id','=',$userid)->update([
            'status'=>$request->status,
            'admin_status'=>$request->admin_status,
            'restaurant_name'=>$request->restaurant_name,
            'restaurant_email'=>$request->restaurant_email,
            'landline'=>$request->landline,
            'mobile'=>$request->mobile,
            'address'=>$request->address,
            'zipcode'=>$request->zipcode,
            'city'=>$request->city

        ]);
        $updatecontent  = RestuarantContent::where('user_id','=',$userid)->update([
            'status'=>$request->status,
            'restaurant_name'=>$request->restaurant_name,
            'admin_status'=>$request->admin_status,
        ]);
        $message = ["status" => "True"];
        return response($message, 200);

    }
    public function deleterestaurantlistitem(Request $request)
    {
        $id = $request->id;
        $userid = Resturants::where('id','=',$id)->pluck('user_id')->first();
        $updateprofile = Resturants::where('user_id','=',$userid)->delete();
        $updatecontent  = RestuarantContent::where('user_id','=',$userid)->delete();
        $user  = User::where('id','=',$userid)->delete();
        $message = ["status" => "True"];
        return response($message, 200);

    }

}
