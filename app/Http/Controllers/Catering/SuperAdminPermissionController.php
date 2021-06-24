<?php


namespace App\Http\Controllers\Catering;


use App\CateringContent;
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
    public function updatecateringlistitem(Request $request)
    {
        $id = $request->id;
        $userid = CateringServiceProvider::where('id','=',$id)->pluck('user_id')->first();
        $updateprofile = CateringServiceProvider::where('user_id','=',$userid)->update([
            'status'=>$request->status,
            'approval_status'=>$request->approval_status,
            'email_status'=>$request->email_status,
            'company_name'=>$request->company_name,
            'company_email'=>$request->company_email,
            'mobile'=>$request->mobile,
            'address'=>$request->address,
            'zipcode'=>$request->zipcode,
            'city'=>$request->city

        ]);
        $updatecontent  = CateringContent::where('user_id','=',$userid)->update([
            'status'=>$request->status,
            'company_title'=>$request->company_name,
            'admin_status'=>$request->approval_status,
        ]);
        $message = ["status" => "True"];
        return response($message, 200);

    }
    public function deletecateringlistitem(Request $request)
    {
        $id = $request->id;
        $userid = CateringServiceProvider::where('id','=',$id)->pluck('user_id')->first();
        $updateprofile = CateringServiceProvider::where('user_id','=',$userid)->delete();
        $updatecontent  = CateringContent::where('user_id','=',$userid)->delete();
        $user  = User::where('id','=',$userid)->delete();
        $message = ["status" => "True"];
        return response($message, 200);

    }

}
