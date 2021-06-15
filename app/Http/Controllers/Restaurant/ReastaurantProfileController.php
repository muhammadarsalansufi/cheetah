<?php


namespace App\Http\Controllers\Restaurant;


use App\AccountDetails;
use App\Http\Controllers\Controller;
use App\RestuarantContent;
use App\Resturants;
use Illuminate\Http\Request;

class ReastaurantProfileController extends Controller
{
    public function addprofile(Request $request)
    {
        $id = auth()->user()->id;
        $editAccount = AccountDetails::where('user_id','=',$id)->update([
            'card_number' => $request->card_number,
            'cvv' => $request->cvv,
            'expiry_date' => $request->expiry_date,
            'owner_name' => $request->owner_name
        ]);
        $editRestuarantContent =  RestuarantContent::where('user_id','=',$id)
            ->update([
                'aboutus_content' => $request->aboutus_content,
                'chef_signature' => $request->chef_signature,
                'chef_content' => $request->chef_content,
                'facebook_link' => $request->facebook_link,
                'instagram_link' => $request->instagram_link,
                'landline_content' => $request->landline_content,
                'mobile_content' => $request->mobile_content,
                'email_content' => $request->email_content,
                'logoImg' => $request->logoImg,
                'bannerImg' => $request->bannerImg,
                'aboutusImg' => $request->aboutusImg,
                'address_content' => $request->address_content
            ]);
           $editResturants =  Resturants::where('user_id','=',$id)
            ->update([
                'restaurant_name' => $request->restaurant_name,
                'restaurant_email' => $request->restaurant_email,
                'landline' => $request->landline,
                'mobile' => $request->mobile,
                'fax' => $request->fax,
                'address' => $request->address,
                'zipcode' => $request->zipcode,
                'city' => $request->city,
                'state' => $request->state
            ]);

    }
    public function editprofile(Request $request)
    {

    }
    public function manageprofile(Request $request)
    {

    }

}
