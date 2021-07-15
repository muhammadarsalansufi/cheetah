<?php


namespace App\Http\Controllers\SuperAdmin;


use App\CateringServiceProvider;
use App\Contacts;
use App\Content;
use App\EndUsers;
use App\Http\Controllers\Controller;
use App\ImageSlider;
use App\MenuCategories;
use App\OtherImages;
use App\ServicesCategory;
use App\SocialLinks;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;

class SuperController extends Controller
{

    public function addimageSlider(Request $request)
    {
       $slider = new ImageSlider();
//        $slider->image =$request->image;
        $slider->title =$request->title;
        $slider->description =$request->description;
        $slider->status =$request->status;
        $slider->save();
        $fileName = "notfound";
        if($file = $request->hasFile('image')) {
            $file = $request->file('image') ;
            $fileName1 = $file->getClientOriginalName() ;
            $fileName = 'i'.$slider->id.'o'.$fileName1;
            $destinationPath = public_path().'/images/' ;
            $file->move($destinationPath,$fileName);
            $newCategory= URL::asset('images').'/'.$fileName ;
        }
        $data = DB::table('imageslider')
            ->where('id', '=',$slider->id)
            ->update(['image' => $fileName]);
        if($data==1)
        {
            $response = ['message'=>'True'];
        }
        else
        {
            $response = ['message'=>'Record Saved Image Not Saved'];
        }

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
//        $slider->image =$request->image;
        $slider->status =$request->status;
        $slider->save();
        $fileName = "notfound";
        if($file = $request->hasFile('image')) {
            $file = $request->file('image') ;
            $fileName1 = $file->getClientOriginalName() ;
            $fileName = 'i'.$slider->id.'o'.$fileName1;
            $destinationPath = public_path().'/images/' ;
            $file->move($destinationPath,$fileName);
            $newCategory= URL::asset('images').'/'.$fileName ;
        }
        $data = DB::table('otherimages')
            ->where('id', '=',$slider->id)
            ->update(['image' => $fileName]);
        if($data==1)
        {
            $response = ['message'=>'True'];
        }
        else
        {
            $response = ['message'=>'Record Saved Image Not Saved'];
        }

        return response($response, 200);
        $response = ['message'=>'True'];
        return response($response, 200);
    }
    public function editimageSlider(Request $request)
    {   $id =$request->id;
        $title =$request->title;
        $description =$request->description;
        $status =$request->status;
        if($file = $request->hasFile('image')) {
            $file = $request->file('image') ;
            $fileName1 = $file->getClientOriginalName() ;
            $fileName = 'i'.$id.'o'.$fileName1;
            $destinationPath = public_path().'/images/' ;
            $file->move($destinationPath,$fileName);
            $newCategory= URL::asset('images').'/'.$fileName ;
        }
        $slider = DB::table('imageslider')->where('id', $id)
            ->update([
                'image' => $fileName,
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

        $status =$request->status;
        $fileName = 'not defined';
        if($file = $request->hasFile('image')) {
            $file = $request->file('image') ;
            $fileName1 = $file->getClientOriginalName() ;
            $fileName = 'i'.$id.'o'.$fileName1;
            $destinationPath = public_path().'/images/' ;
            $file->move($destinationPath,$fileName);
            $newCategory= URL::asset('images').'/'.$fileName ;
        }


        $slider = DB::table('otherimages')->where('id', $id)
            ->update([
                'title' => $title,
                'contents' => $contents,
                'pagename' => $pagename,
                'status' => $status,
                'image' => $fileName
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
    public function deleteimageSlider(Request $request)
    {
        $id = $request->id;
        $slider = DB::table('imageslider')->where('id', $id)->delete();
        $response = ['message'=>'True','status'=>$slider];
        return response($response, 200);
    }
    public function deleteContact(Request $request)
    {
        $id = $request->id;
        $slider = DB::table('contact')->where('id', $id)->delete();
        $response = ['message'=>'True','status'=>$slider];
        return response($response, 200);
    }
    public function deleteSocialLinks(Request $request)
    {
        $id = $request->id;
        $slider = DB::table('sociallinks')->where('id', $id)->delete();
        $response = ['message'=>'True','status'=>$slider];
        return response($response, 200);
    }
    public function deleteContent(Request $request)
    {
        $id = $request->id;
        $slider = DB::table('content')->where('id', $id)->delete();
        $response = ['message'=>'True','status'=>$slider];
        return response($response, 200);
    }

    public function deleteOtherImages(Request $request)
    {
        $id = $request->id;
        $slider = DB::table('otherimages')->where('id', $id)->delete();
        $response = ['message'=>'True','status'=>$slider];
        return response($response, 200);
    }
    public function getimageSlider(Request $request)
    {

        $slider = DB::table('imageslider')->get();
        $response = ['message'=>'True','status'=>$slider];
        return response($response, 200);
    }
    public function getContact(Request $request)
    {
        $slider = DB::table('contact')->get();
        $response = ['message'=>'True','status'=>$slider];
        return response($response, 200);
    }
    public function getSocialLinks(Request $request)
    {
        $slider = DB::table('sociallinks')->get();
        $response = ['message'=>'True','status'=>$slider];
        return response($response, 200);
    }
    public function getContent(Request $request)
    {
        $slider = DB::table('content')->get();
        $response = ['message'=>'True','status'=>$slider];
        return response($response, 200);
    }

    public function getOtherImages(Request $request)
    {
        $slider = DB::table('otherimages')->get();
        $response = ['message'=>'True','status'=>$slider];
        return response($response, 200);
    }
    public function getContactResponses()
    {
        $slider = DB::table('contact_us')->get();
        $response = ['message'=>'True','status'=>$slider];
        return response($response, 200);
    }
    public function getFeedbackResponses()
    {
        $slider = DB::table('user_feedback')->get();
        $response = ['message'=>'True','status'=>$slider];
        return response($response, 200);
    }
    public function feedbackdelete(Request $request)
    {
        $id = $request->id;
        $slider = DB::table('user_feedback')->where('id','=',$id)->delete();
        $response = ['message'=>'True','status'=>$slider];
        return response($response, 200);
    }
    public function contactresdelete(Request $request)
    {
        $id = $request->id;
        $slider = DB::table('contact_us')->where('id','=',$id)->delete();
        $response = ['message'=>'True','status'=>$slider];
        return response($response, 200);
    }
    public function pendingCaterings()
    {
        $pending = CateringServiceProvider::where('approval_status','=','pending')->get();
        $response = ['message'=>'True','record'=>$pending ];
        return response($response, 200);
    }
    public function approvePendingCaterings(Request $request)
    {
        $id = $request->id;
        $pending = CateringServiceProvider::where('id','=',$id)->update(['approval_status'=>'Approved']);
        $response = ['message'=>'True','record'=>$pending ];
        return response($response, 200);
    }
    public function  addmenucategory(Request $request)
    {
        $item =  new MenuCategories();
        $item->item_name = $request->item_name;
        $item->item_tags = $request->item_tags;
        $item->status = $request->status;
        $item->save();
        $response = ['status'=>'True','record'=>$item ];
        return response($response, 200);

    }
    public function  getmenucategory()
    {
        $item = MenuCategories::all();
        $response = ['status'=>'True','record'=>$item ];
        return response($response, 200);

    }
    public function  updatemenucategory(Request $request)
    {
        $item = MenuCategories::where('id','=',$request->id)->update([
            'item_name'=>$request->item_name,
            'item_tags'=>$request->item_tags,
            'status'=>$request->status]);
        $response = ['status'=>'True','record'=>$item ];
        return response($response, 200);

    }
    public function  deletemenucategory(Request $request)
    {
        $item = MenuCategories::where('id','=',$request->id)->delete();
        $response = ['status'=>'True','record'=>$item ];
        return response($response, 200);
    }
    public function  addservicescategory(Request $request)
    {
        $item =  new ServicesCategory();
        $item->service_name = $request->service_name;
        $item->service_tags = $request->service_tags;
        $item->icon = $request->icon;
        $item->status = $request->status;
        $item->save();
        $response = ['status'=>'True','record'=>$item ];
        return response($response, 200);
    }
    public function  getservicescategory()
    {
        $item = ServicesCategory::all();
        $response = ['status'=>'True','record'=>$item ];
        return response($response, 200);
    }
    public function  deleteservicescategory(Request $request)
    {
        $item = ServicesCategory::where('id','=',$request->id)->delete();
        $response = ['status'=>'True','record'=>$item ];
        return response($response, 200);
    }
    public function  updateservicescategory(Request $request)
    {
        $item = ServicesCategory::where('id','=',$request->id)->update([
            'service_name'=>$request->service_name,
            'service_tags'=>$request->service_tags,
            'status'=>$request->status]);
        $response = ['status'=>'True','record'=>$item ];
        return response($response, 200);
    }
    public function getEndUser()
    {
        $user = EndUsers::all();
        $response = ['status'=>'True','data'=>$user ];
        return response($response, 200);
    }

}
