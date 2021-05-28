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
use Illuminate\Support\Facades\DB;

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
        $slider->socialsite =$request->socialsite;
        $slider->link =$request->link;
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
        $slider->image =$request->image;
        $slider->status =$request->status;
        $slider->save();
        $response = ['message'=>'True'];
        return response($response, 200);
    }
    public function editimageSlider(Request $request)
    {   $id =$request->id;
        $image =$request->image;
        $title =$request->title;
        $description =$request->description;
        $status =$request->status;
        $slider = DB::table('imageslider')->where('id', $id)
            ->update([
                'image' => $image,
                'title' => $title,
                'description' => $description,
                'status' => $status
                ]);
        if($slider)
        {
            $response = ['message'=>'True'];
            return response($response, 200);
        }
        else
        {
            $response = ['message'=>'False'];
            return response($response, 200);
        }
    }
    public function editContact(Request $request)
    {
        $id =$request->id;
        $title =$request->title;
        $useof =$request->useof;
        $number =$request->number;
        $status =$request->status;
        $slider = DB::table('contact')->where('id', $id)
            ->update([
                'title' => $title,
                'useof' => $useof,
                'number' => $number,
                'status' => $status
            ]);
        if($slider)
        {
            $response = ['message'=>'True'];
            return response($response, 200);
        }
        else
        {
            $response = ['message'=>'False'];
            return response($response, 200);
        }
    }
    public function editSocialLinks(Request $request)
    {
        $id =$request->id;
        $title =$request->title;
        $socialsite =$request->socialsite;
        $link =$request->link;
        $status =$request->status;
        $slider = DB::table('sociallinks')->where('id', $id)
            ->update([
                'title' => $title,
                'socialsite' => $socialsite,
                'link' => $link,
                'status' => $status
            ]);
        if($slider)
        {
            $response = ['message'=>'True'];
            return response($response, 200);
        }
        else
        {
            $response = ['message'=>'False'];
            return response($response, 200);
        }
    }
    public function editContent(Request $request)
    {
        $id =$request->id;
        $title =$request->title;
        $contents =$request->contents;
        $status =$request->status;
        $slider = DB::table('content')->where('id', $id)
            ->update([
                'title' => $title,
                'contents' => $contents,
                'status' => $status
            ]);
        if($slider)
        {
            $response = ['message'=>'True'];
            return response($response, 200);
        }
        else
        {
            $response = ['message'=>'False'];
            return response($response, 200);
        }
    }

    public function editOtherImages(Request $request)
    {
        $id =$request->id;
        $title =$request->title;
        $contents =$request->contents;
        $pagename =$request->pagename;
        $image =$request->image;
        $status =$request->status;
        $slider = DB::table('otherimages')->where('id', $id)
            ->update([
                'title' => $title,
                'contents' => $contents,
                'pagename' => $pagename,
                'status' => $status,
                'image ' => $image
            ]);
        if($slider)
        {
            $response = ['message'=>'True'];
            return response($response, 200);
        }
        else
        {
            $response = ['message'=>'False'];
            return response($response, 200);
        }
    }


}
