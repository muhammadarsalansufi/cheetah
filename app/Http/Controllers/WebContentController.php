<?php


namespace App\Http\Controllers;




use App\Contacts;
use App\ContactUs;
use App\Content;
use App\ImageSlider;
use App\OtherImages;
use App\SocialLinks;
use App\UserFeedback;
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
    public function contactGlobal(Request $request)
    {
        $newcontact =  new ContactUs();
        $newcontact->name = $request->name;
        $newcontact->email = $request->email;
        $newcontact->subject = $request->subject;
        $newcontact->type = $request->type;
        $newcontact->status = $request->status;
        $newcontact->save();
        $response = ['message'=>'True'];
        return response($response, 200);

    }
    public function user_feedback(Request $request)
    {
        $user =  new UserFeedback();
        $user->rating =$request->rating;
        $user->feedback_type =$request->feedback_type;
        $user->subject =$request->subject;
        $user->status =$request->status;
        $user->save();
        $response = ['message'=>'True'];
        return response($response, 200);

    }



}
