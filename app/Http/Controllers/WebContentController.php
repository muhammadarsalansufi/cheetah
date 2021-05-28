<?php


namespace App\Http\Controllers;




use App\Contacts;
use App\Content;
use App\ImageSlider;
use App\OtherImages;
use App\SocialLinks;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class WebContentController extends Controller
{
    public function getimageSliderWeb()
    {
        $record = ImageSlider::where('status','=','active')->get();
        $response = ['message'=>'True','record'=>$record ];
        return response($response, 200);
    }
    public function getContactWeb(Request $request)
    {
        $record = Contacts::where('status','=','active')->get();
        $response = ['message'=>'True','record'=>$record ];
        return response($response, 200);
    }
    public function getSocialLinksWeb(Request $request)
    {
        $record = SocialLinks::where('status','=','active')->get();
        $response = ['message'=>'True','record'=>$record ];
        return response($response, 200);;
    }
    public function getContentWeb(Request $request)
    {
        $record = Content::where('status','=','active')->get();
        $response = ['message'=>'True','record'=>$record ];
        return response($response, 200);
    }

    public function getOtherImagesWeb(Request $request)
    {
        $record = OtherImages::where('status','=','active')->get();
        $response = ['message'=>'True','record'=>$record ];
        return response($response, 200);
    }


}
