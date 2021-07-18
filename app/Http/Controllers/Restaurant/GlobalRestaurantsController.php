<?php


namespace App\Http\Controllers\Restaurant;

use App\CateringContent;
use App\CateringStaff;
use App\Http\Controllers\Controller;
use App\MenuCategories;
use App\RestaurantFeatured;
use App\RestaurantProduct;
use App\RestuarantContent;
use App\Resturants;
use App\Testimonials;
use Illuminate\Http\Request;

class GlobalRestaurantsController extends Controller
{
    public function getAllRestaurant()
    {
        $cateringservices = RestuarantContent::select('restaurant_name','bannerImg','id','delivery_time','delivery_charges','rating')->where('status','=','Active')->where('admin_status','=','Approved')->get();
        $message = ["status" => "True","Restaurants" => $cateringservices];
        return response($message, 200);
    }
    public function getSingleRestaurant(Request $request)
    {
        $id =  $request->id;
        $user_id =  RestuarantContent::where('id','=',$id)->where('status','=','Active')->where('admin_status','=','Approved')->pluck('user_id')->first();;
        $cateringservices = RestuarantContent::select()->where('user_id','=',$user_id)->where('status','=','Active')->where('admin_status','=','Approved')->get();
        $cateringtesti = Resturants::select()->where('user_id','=',$user_id)->get();
        $featured_image = RestaurantFeatured::select()->where('user_id','=',$user_id)->where('status','=','Active')->get();
         $message = ["status" => "True",
            "Content" => $cateringservices,
            "Profile" => $cateringtesti,
            "Featured" => $featured_image ];
        return response($message, 200);
    }
    public function getSingleMenu(Request $request)
    {
        $id =  $request->id;
        $user_id =  RestuarantContent::where('id','=',$id)->where('status','=','Active')->where('admin_status','=','Approved')->pluck('user_id')->first();;
        $category = MenuCategories::all();
        foreach($category as $item)
        {
            $items = $item->item_name;
            $menus = RestaurantProduct::select('id','product_name','product_price','product_image','offer','quantity')->where('user_id','=',$user_id)->where('product_type','=',$items)->get();
            if(count($menus)>0)
            {
                $message[] =
                    [
                        "CategoryName" => $items,
                        "Content" => $menus
                    ];
            }

        }
        $message1 = [
            "status" => "True",
            "data" => $message
        ];

        return response($message1, 200);
    }
    public function getAllMenu()
    {
       $category = MenuCategories::all();
        $message = "null";
        foreach($category as $item)
        {
            $items = $item->item_name;
            $items_image = $item->item_image;
            $menus = RestaurantProduct::select('id','product_name','product_price','product_image','offer','quantity')->where('product_type','=',$items)->get();
            if(count($menus)>0)
            {
                $message[] = [
                        "CategoryName" => $items,
                        "CategoryImage" => $items_image,
                        "Content" => $menus
                            ];
            }

        }
        $message1 = [
            "status" => "True",
            "ALlCategoryies"=>$category,
            "data" => $message
        ];

        return response($message1, 200);
    }
}
