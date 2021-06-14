<?php


namespace App\Http\Controllers\Catering;


use App\AccountDetails;
use App\CateringContent;
use App\CateringServiceProvider;
use App\CateringStaff;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;


class CateringProfileController extends Controller
{
    public function addprofile(Request $request)
    {
        $tell =array_values($request->catering_staff) ;
        $message = ["status" => gettype($tell)];
        return response($message, 200);
        $counter = count($tell);
        $levelcounter = 4 -1;
        for ($x = 0; $x <= $levelcounter; $x++) {
            $datas = array_values($tell)[$x];
            $tasks[$x] = $datas;
        }

        $id = auth()->user()->id;
        $logoImg = 'not defined';
        $staffImg = 'not defined';
        $bannerImg = 'not defined';
        $aboutusImg = 'not defined';
        $gallery1Img = 'not defined';
        $gallery2Img = 'not defined';
        $gallery3Img = 'not defined';
        $gallery4Img = 'not defined';
        $gallery5Img = 'not defined';
        $gallery6Img = 'not defined';
        if($file = $request->hasFile('logoImg')) {
            $file = $request->file('logoImg') ;
            $fileName1 = $file->getClientOriginalName() ;
            $logoImg = 'i'.$id.'o'.$fileName1;
            $destinationPath = public_path().'/images/' ;
            $file->move($destinationPath,$logoImg);
            $newCategory= URL::asset('images').'/'.$logoImg ;
        }
        if($file = $request->hasFile('staffImg')) {
            $file = $request->file('staffImg') ;
            $fileName1 = $file->getClientOriginalName() ;
            $staffImg = 'i'.$id.'o'.$fileName1;
            $destinationPath = public_path().'/images/' ;
            $file->move($destinationPath,$staffImg);
            $newCategory= URL::asset('images').'/'.$staffImg ;
        }
        if($file = $request->hasFile('bannerImg')) {
            $file = $request->file('bannerImg') ;
            $fileName1 = $file->getClientOriginalName() ;
            $bannerImg = 'i'.$id.'o'.$fileName1;
            $destinationPath = public_path().'/images/' ;
            $file->move($destinationPath,$bannerImg);
            $newCategory= URL::asset('images').'/'.$bannerImg ;
        }
        if($file = $request->hasFile('aboutusImg')) {
            $file = $request->file('aboutusImg') ;
            $fileName1 = $file->getClientOriginalName() ;
            $aboutusImg = 'i'.$id.'o'.$fileName1;
            $destinationPath = public_path().'/images/' ;
            $file->move($destinationPath,$aboutusImg);
            $newCategory= URL::asset('images').'/'.$aboutusImg ;
        }
        if($file = $request->hasFile('gallery1Img')) {
            $file = $request->file('gallery1Img') ;
            $fileName1 = $file->getClientOriginalName() ;
            $gallery1Img = 'i'.$id.'o'.$fileName1;
            $destinationPath = public_path().'/images/' ;
            $file->move($destinationPath,$gallery1Img);
            $newCategory= URL::asset('images').'/'.$gallery1Img ;
        }
        if($file = $request->hasFile('gallery2Img')) {
            $file = $request->file('gallery2Img') ;
            $fileName1 = $file->getClientOriginalName() ;
            $gallery2Img = 'i'.$id.'o'.$fileName1;
            $destinationPath = public_path().'/images/' ;
            $file->move($destinationPath,$gallery2Img);
            $newCategory= URL::asset('images').'/'.$gallery2Img ;
        }
        if($file = $request->hasFile('gallery3Img')) {
            $file = $request->file('gallery3Img') ;
            $fileName1 = $file->getClientOriginalName() ;
            $gallery3Img = 'i'.$id.'o'.$fileName1;
            $destinationPath = public_path().'/images/' ;
            $file->move($destinationPath,$gallery3Img);
            $newCategory= URL::asset('images').'/'.$gallery3Img ;
        }
        if($file = $request->hasFile('gallery4Img')) {
            $file = $request->file('gallery4Img') ;
            $fileName1 = $file->getClientOriginalName() ;
            $gallery4Img = 'i'.$id.'o'.$fileName1;
            $destinationPath = public_path().'/images/' ;
            $file->move($destinationPath,$gallery4Img);
            $newCategory= URL::asset('images').'/'.$gallery4Img ;
        }
        if($file = $request->hasFile('gallery5Img')) {
            $file = $request->file('gallery5Img') ;
            $fileName1 = $file->getClientOriginalName() ;
            $gallery5Img= 'i'.$id.'o'.$fileName1;
            $destinationPath = public_path().'/images/' ;
            $file->move($destinationPath,$gallery5Img);
            $newCategory= URL::asset('images').'/'.$gallery5Img ;
        }
        if($file = $request->hasFile('gallery6Img')) {
            $file = $request->file('gallery6Img') ;
            $fileName1 = $file->getClientOriginalName() ;
            $gallery6Img = 'i'.$id.'o'.$fileName1;
            $destinationPath = public_path().'/images/' ;
            $file->move($destinationPath,$gallery6Img);
            $newCategory= URL::asset('images').'/'.$gallery6Img ;
        }


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
        'staffImg' => $staffImg,
        'status' => 'Active'
    ]);
        $editContent = CateringContent::where('user_id','=',$id)->update([
            'logoImg' => $logoImg,
            'banner_content' => $request->banner_content,
            'aboutus_content' => $request->aboutus_content,
            'bannerImg' => $bannerImg,
            'aboutusImg' => $aboutusImg,
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
            'gallery1Img' => $gallery1Img,
            'gallery2Img' => $gallery2Img,
            'gallery3Img' => $gallery3Img,
            'gallery4Img' => $gallery4Img,
            'gallery5Img' => $gallery5Img,
            'gallery6Img' => $gallery6Img,
            'status' => "Active"
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
    public function getsingleprofile()
    {
        $id = auth()->user()->id;
        $catering = CateringServiceProvider::where('user_id','=',$id)->get();
        $Account = AccountDetails::where('user_id','=',$id)->get();
        $Staff = CateringStaff::where('user_id','=',$id)->get();
        $Content = CateringContent::where('user_id','=',$id)->get();
        $message = ["status" => "True","Provider"=>$catering,"Account"=>$Account,"Staff"=>$Staff,"content"=>$Content];
        return response($message, 200);

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
