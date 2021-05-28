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
    public function getSliderImages()
    {
        $record = ImageSlider::all();
    }
    public function getContact(Request $request)
    {
        $record = Contacts::all();
    }
    public function getSocialLinks(Request $request)
    {
        $record = SocialLinks::all();
    }
    public function getContent(Request $request)
    {
        $record = Content::all();
    }

    public function getOtherImages(Request $request)
    {
        $record = OtherImages::all();
    }


}
