<?php


namespace App\Http\Controllers\Restaurant;


use App\Http\Controllers\Controller;
use App\RestuarantContent;
use App\Resturants;
use Illuminate\Http\Request;

class SuperAdminPermissionController extends Controller
{
    public function resturantlistadmin()
    {
        $record = Resturants::all();
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

             ]);
        $updatecontent  = RestuarantContent::where('user_id','=',$userid)->update([
            'status'=>$request->status,
            'admin_status'=>$request->admin_status,
            ]);
        $message = ["status" => "True"];
        return response($message, 200);

    }

}
