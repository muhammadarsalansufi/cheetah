<?php


namespace App\Http\Controllers\SuperAdmin;


use App\Contacts;
use App\Content;
use App\Http\Controllers\Controller;
use App\ImageSlider;
use App\OtherImages;
use App\SocialLinks;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class SuperController extends Controller
{

    public function addimageSlider(Request $request)
    {
       $slider = new ImageSlider();
        $slider->image =$request->image;
        $slider->title =$request->title;
        $slider->description =$request->description;
        $slider->status =$request->status;
        $slider->save();
        $response = ['message'=>'True'];
        return response($response, 200);
    }
    public function addContact(Request $request)
    {
        $slider = new Contacts();
        $slider->title =$request->title;
        $slider->useof =$request->useof;
        $slider->number =$request->number;
        $slider->status =$request->status;
        $slider->save();
        $response = ['message'=>'True'];
        return response($response, 200);
    }
    public function addSocialLinks(Request $request)
    {
        $slider = new SocialLinks();
        $slider->title =$request->title;
        $slider->useof =$request->useof;
        $slider->number =$request->number;
        $slider->status =$request->status;
        $slider->save();
        $response = ['message'=>'True'];
        return response($response, 200);
    }
    public function addContent(Request $request)
    {
        $slider = new Content();
        $slider->title =$request->title;
        $slider->contents =$request->contents;
        $slider->status =$request->status;
        $slider->save();
        $response = ['message'=>'True'];
        return response($response, 200);
    }

    public function addOtherImages(Request $request)
    {
        $slider = new OtherImages();
        $slider->title =$request->title;
        $slider->contents =$request->contents;
        $slider->pagename =$request->pagename;
        $slider->status =$request->status;
        $slider->save();
        $response = ['message'=>'True'];
        return response($response, 200);
    }
    public function editimageSlider(Request $request)
    {
        $slider = new ImageSlider();
    }
    public function editContact(Request $request)
    {
        $slider = new ImageSlider();
    }
    public function editSocialLinks(Request $request)
    {
        $slider = new ImageSlider();
    }
    public function editContent(Request $request)
    {
        $slider = new ImageSlider();
    }

    public function editOtherImages(Request $request)
    {
        $slider = new ImageSlider();
    }


}
