<?php


namespace App\Http\Controllers\Restaurant;


use App\AccountDetails;
use App\ContactUs;
use App\FoodOrder;
use App\Http\Controllers\Controller;
use App\MenuCategories;
use App\RestaurantFeatured;
use App\RestaurantProduct;
use App\RestuarantContent;
use App\Resturants;
use App\User;
use Illuminate\Database\Eloquent\Model;
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
        $featureDish1Img = "not fount";
        $featureDish2Img = "not fount";
        $featureDish3Img = "not fount";
        if($file = $request->hasFile('featureDish1Img')) {
            $file = $request->file('featureDish1Img') ;
            $fileName1 = $file->getClientOriginalName() ;
            $featureDish1Img = 'i'.$id.'o'.$fileName1;
            $destinationPath = public_path().'/images/' ;
            $file->move($destinationPath,$featureDish1Img);
            $newCategory= URL::asset('images').'/'.$featureDish1Img ;
        }
        if($file = $request->hasFile('featureDish2Img')) {
            $file = $request->file('featureDish2Img') ;
            $fileName1 = $file->getClientOriginalName() ;
            $featureDish2Img = 'i'.$id.'o'.$fileName1;
            $destinationPath = public_path().'/images/' ;
            $file->move($destinationPath,$featureDish2Img);
            $newCategory= URL::asset('images').'/'.$featureDish2Img ;
        }
        if($file = $request->hasFile('featureDish3Img')) {
            $file = $request->file('featureDish3Img') ;
            $fileName1 = $file->getClientOriginalName() ;
            $featureDish3Img = 'i'.$id.'o'.$fileName1;
            $destinationPath = public_path().'/images/' ;
            $file->move($destinationPath,$featureDish3Img);
            $newCategory= URL::asset('images').'/'.$featureDish3Img ;
        }
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
                'logoImg' => $logoImg,
                'bannerImg' => $bannerImg,
                'aboutusImg' => $aboutusImg,
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
        $editResturantsFeatured =  RestaurantFeatured::where('user_id','=',$id)
            ->update([
                'feature_dish1' => $request->feature_dish1,
                'featureDishPrice1' => $request->featureDishPrice1,
                'featureDish1Img' => $featureDish1Img,
                'feature_dish2' => $request->feature_dish2,
                'featureDishPrice2' => $request->featureDishPrice2,
                'featureDish2Img' => $featureDish2Img,
                'feature_dish3' => $request->feature_dish3,
                'featureDishPrice3' => $request->featureDishPrice3,
                'featureDish3Img' => $featureDish3Img,
            ]);
        $user =  User::where('id','=',$id)
            ->update([
                'status' => "Active"
            ]);
        $message = ["status" => "True","data" => $request->all()];
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
    public function getSingleRestaurantProfile()
    {
        $id = auth()->user()->id;
        $menutypes = MenuCategories::all();
        $cateringservices = RestuarantContent::select()->where('user_id','=',$id)->get();
        $cateringtesti = Resturants::select()->where('user_id','=',$id)->get();
        $catering_restaurant_id = Resturants::select()->where('user_id','=',$id)->pluck('id')->first();
        $cateringaccount = AccountDetails::select()->where('user_id','=',$id)->get();
        $cateringcontact = ContactUs::select()->where('type','=','restaurant')->where('catering_restaurant_id','=',$catering_restaurant_id)->get();
        $featured_image = RestaurantFeatured::select()->where('user_id','=',$id)->where('status','=','Active')->get();
        $message = ["status" => "True",
            "Content" => $cateringservices,
            "Profile" => $cateringtesti,
            "Account" => $cateringaccount,
            "Contact" => $cateringcontact,
            "Orders" => $cateringtesti,
            "Featured" => $featured_image,
            "Menus" => $menutypes];
        return response($message, 200);
    }
    public function manageprofile(Request $request)
    {

    }
    public function addFood(Request $request)
    {

        $id = auth()->user()->id;
        $product_image = "not fount";
        if($file = $request->hasFile('product_image')) {
            $file = $request->file('product_image') ;
            $fileName1 = $file->getClientOriginalName() ;
            $product_image = 'i'.$id.'o'.$fileName1;
            $destinationPath = public_path().'/images/' ;
            $file->move($destinationPath,$product_image);
            $newCategory= URL::asset('images').'/'.$product_image ;
        }
        $rProfileid = Resturants::where('user_id','=',$id)->pluck('id')->first();
        $rContentid = RestuarantContent::where('user_id','=',$id)->pluck('id')->first();
        $item = new RestaurantProduct();
        $item->user_id = $id;
        $item->rest_profile_id = $rProfileid;
        $item->rest_content_id = $rContentid;
        $item->status = $request->status;
        $item->product_name = $request->product_name;
        $item->product_price = $request->product_price;
        $item->product_image = $product_image;
        $item->product_type = $request->product_type;
        $item->offer = $request->offer;
        $item->save();
        $itemimg = RestaurantProduct::where('id','=',$item->id)->update(
            [
                "product_image" => $product_image
            ]
        );
        $message = ["status" => "True"];
        return response($message, 200);

    }
    public function getFood(Request $request)
    {
        $id =auth()->user()->id;
        $item = RestaurantProduct::where('user_id','=',$id)->get();
        $message = ["status" => "True","record" => $item];
        return response($message, 200);
    }
    public function deleteFood(Request $request)
    {
        $id = $request->id;
        $item = RestaurantProduct::where('id','=',$id)->delete();
        $message = ["status" => "True","record" => $item];
        return response($message, 200);
    }
    public function updateFood(Request $request)
    {
        $id = $request->id;
        $product_image = "not fount";
        if ($file = $request->hasFile('product_image')) {
            $file = $request->file('product_image');
            $fileName1 = $file->getClientOriginalName();
            $product_image = 'i' . $id . 'o' . $fileName1;
            $destinationPath = public_path() . '/images/';
            $file->move($destinationPath, $product_image);
            $newCategory = URL::asset('images') . '/' . $product_image;
        }
        $item = RestaurantProduct::where('id', '=', $id)->update(
            ["status" => $request->status,
                "product_name" => $request->product_name,
                "product_price" => $request->product_price,
                "product_image" => $product_image,
                "product_type" => $request->product_type,
                "offer" => $request->offer
            ]
        );
        $message = ["status" => "True", "record" => $item];
        return response($message, 200);
    }
    public function addingredents(Request $request)
    {

    }
    public function myrestaurantOrders()
    {
    $id =  auth()->user()->id;
       $orders = FoodOrder::where('delivery_status','=','pending')->pluck('food_array')->first();
       $reid = Resturants::where('user_id','=',$id)->pluck('id')->first();
       $data = json_decode($orders);
        $order = 'no order found';

        foreach ($data as $single)
        {
            if($single->restaurantId == $reid)
            {
                $order = $single;
            }

        }
        $message = ["status" => "True",'orders' => $order];
        return response($message, 200);
//       foreach($data as $dataorder)
//       {
//
//       }
    }

}
