<?php


namespace App\Http\Controllers\Restaurant;


use App\AccountDetails;
use App\Http\Controllers\Controller;
use App\RestuarantContent;
use App\Resturants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class ReastaurantProfileController extends Controller
{
    public function addprofile(Request $request)
    {
        $id = auth()->user()->id;
        $logoImg = "not fount";
        $aboutusImg = "not fount";
        $bannerImg = "not fount";

        if($file = $request->hasFile('logoImg')) {
            $file = $request->file('logoImg') ;
            $fileName1 = $file->getClientOriginalName() ;
            $logoImg = 'i'.$id.'o'.$fileName1;
            $destinationPath = public_path().'/images/' ;
            $file->move($destinationPath,$logoImg);
            $newCategory= URL::asset('images').'/'.$logoImg ;
        }
        if($file = $request->hasFile('aboutusImg')) {
            $file = $request->file('aboutusImg') ;
            $fileName1 = $file->getClientOriginalName() ;
            $aboutusImg = 'i'.$id.'o'.$fileName1;
            $destinationPath = public_path().'/images/' ;
            $file->move($destinationPath,$aboutusImg);
            $newCategory= URL::asset('images').'/'.$aboutusImg ;
        }
        if($file = $request->hasFile('bannerImg')) {
            $file = $request->file('bannerImg') ;
            $fileName1 = $file->getClientOriginalName() ;
            $bannerImg = 'i'.$id.'o'.$fileName1;
            $destinationPath = public_path().'/images/' ;
            $file->move($destinationPath,$bannerImg);
            $newCategory= URL::asset('images').'/'.$bannerImg ;
        }

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
                'restaurant_name' => $request->restaurant_name,
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
        $message = ["status" => "True"];
        return response($message, 200);
    }
    public function addRestaurantPromo(Request $request)
    {
        $id = auth()->user()->id;
        $promo_video = 'promo.mp4';
        if($file = $request->hasFile('promo_video')) {
            $file = $request->file('promo_video') ;
            $fileName1 = $file->getClientOriginalName() ;
            $promo_video = 'i'.$id.'o'.$fileName1;
            $destinationPath = public_path().'/PromoVideo/' ;
            $file->move($destinationPath,$promo_video);
            $newCategory= URL::asset('images').'/'.$promo_video ;
        }
        $editRestuarantContent =  RestuarantContent::where('user_id','=',$id)->update(['promo_video' => $promo_video]);
        $message = ["status" => "True"];
        if($editRestuarantContent == 1)
        {
            $message = ["status" => "True"];
        }
        else
        {
            $message = ["status" => "False"];
        }
        return response($message, 200);

    }
    public function manageprofile(Request $request)
    {

    }

}
