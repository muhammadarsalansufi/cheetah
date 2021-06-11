<?php


namespace App\Http\Controllers\Catering;


use App\AccountDetails;
use App\CateringServiceProvider;
use App\CateringStaff;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class CateringProfileController extends Controller
{
    public function addprofile(Request $request)
    {
        $id = auth()->user()->id;
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
        $editAccount = AccountDetails::where('user_id','=',$id)->update([
            'card_number' => $request->card_number,
            'cvv' => $request->cvv,
            'expiry_date' => $request->expiry_date,
            'owner_name' => $request->owner_name
        ]);
        $editStaff = CateringStaff::where('user_id','=',$id)->update([
        'staff_name' => $request->staff_name,
        'staff_designation' => $request->staff_designation,
        'staffImg' => $request->staffImg,
        'status' => 'Active'
    ]);
        $editContent = CateringStaff::where('user_id','=',$id)->update([
            'logoImg' => $request->staff_name,
            'banner_content' => $request->staff_designation,
            'bannerImg' => $request->bannerImg,
            'aboutusImg' => $request->aboutusImg,
            'facebook_link' => $request->facebook_link,
            'instagram_link' => $request->instagram_link,
            'landline_content' => $request->landline_content,
            'mobile_content' => $request->mobile_content,
            'email_content' => $request->email_content,
            'address_content' => $request->address_content,
            'vision_content' => $request->vision_content,
            'monday_friday' => $request->monday_friday,
            'saturday' => $request->saturday,
            'sunday' => $request->sunday,
            'gallery1Img' => $request->gallery1Img,
            'gallery2Img' => $request->gallery2Img,
            'gallery3Img' => $request->gallery3Img,
            'gallery4Img' => $request->gallery4Img,
            'gallery5Img' => $request->gallery5Img,
            'gallery6Img' => $request->gallery6Img,
            'status' => $request->status,
            'user_id' => $request->user_id,
        ]);
        if($editcatering == 1)
        {
            $message = ["status" => "True","authid"=>$id,"response"=>$request->all()];

        }
        else
        {
            $message = ["status" => "False","authid"=>$id,"response"=>$request];

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
