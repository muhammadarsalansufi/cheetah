<?php


namespace App\Http\Controllers\Catering;


use App\CateringServiceProvider;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class CateringProfileController extends Controller
{
    public function addprofile(Request $request)
    {
        $id = $request->user_id;
        $editcatering = CateringServiceProvider::where('user_id','=',$id)->update([
            'company_name' => $request->company_name,
            'company_email' => $request->company_email,
            'status' => 'inActive',
            'zipcode' => $request->zipcode,
            'landline' => $request->landline,
            'mobile' => $request->mobile,
            'fax' => $request->fax,
            'address' => $request->address,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'city' => $request->city,
            'state' => $request->state
        ]);
        if($editcatering == 1)
        {
            $message = ["status" => "True"];

        }
        else
        {
            $message = ["status" => "False"];

        }
        return response($message, 200);


    }
    public function editprofile(Request $request)
    {

    }
    public function getOrders()
    {

    }
    public function deleteOrder(Request $request)
    {

    }
    public function manageprofile(Request $request)
    {

    }

}
