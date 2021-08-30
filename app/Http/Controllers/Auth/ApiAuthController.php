<?php

namespace App\Http\Controllers\Auth;

use App\AccountDetails;
use App\CateringContent;
use App\CateringServiceProvider;
use App\CateringStaff;
use App\EndUsers;
use App\Http\Controllers\Controller;
use App\RestaurantFeatured;
use App\RestuarantContent;
use App\Resturants;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class ApiAuthController extends Controller
{

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function register (Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'type' => 'integer'

        ]);
        if ($validator->fails())
        {
            return response(['message'=>$validator->errors()->all()], 200);
        }
        $request['password']=Hash::make($request['password']);
        $request['remember_token'] = Str::random(10);
        $request['type'] = $request['type'] ? $request['type']  : 0;
        $user = User::create($request->toArray());
        if($request['category'] == 1)
        {
            $catering = new CateringServiceProvider();
            $catering->name = $request->name;
            $catering->email = $request->email;
            $catering->user_id = $user->id;
            $catering->email_status = 'pending';
            $catering->approval_status = 'pending';
            $catering->status = 'pending';
            $catering->save();
            $account = new AccountDetails();
            $account->user_id = $user->id;
            $account->cate_id = $catering->category;
            $account->catering_id = $catering->id;
            $account->restaurant_id = "serviceprovider";
            $account->save();
            $staff = new CateringStaff();
            $staff->user_id =$user->id;
            $staff->catering_provider_id = $catering->id;
            $staff->save();
            $cateringcontent = new CateringContent();
            $cateringcontent->user_id = $user->id;
            $cateringcontent->caterory_id = $catering->id;
            $cateringcontent->provider_id = $catering->id;
            $cateringcontent->bank_id = $account->id;
            $cateringcontent->staff_id =  $staff->id;
            $cateringcontent->admin_status ="pending";
            $cateringcontent->payment_status = "pending";
            $cateringcontent->status = "InActive";
            $cateringcontent->save();


        }
        if($request['category'] == 2)
        {
            $Restaurants =  new Resturants();
            $Restaurants->user_name = $request->name;
            $Restaurants->user_email = $request->email;
            $Restaurants->user_id = $user->id;
            $Restaurants->email_status = "pending";
            $Restaurants->admin_status = "pending";
            $Restaurants->status = "inActive";
            $Restaurants->save();
            $RestuarantContent =  new RestuarantContent();
            $RestuarantContent->user_id  = $user->id;
            $RestuarantContent->status  = "inActive";
            $RestuarantContent->admin_status  = "pending";
            $RestuarantContent->resturant_profile_id  = $Restaurants->id;
            $RestuarantContent->save();
            $account = new AccountDetails();
            $account->user_id = $user->id;
            $account->cate_id = $Restaurants->id;
            $account->catering_id ="Restaurant";
            $account->restaurant_id = $Restaurants->id;
            $account->save();
            $res = new RestaurantFeatured();
            $res->user_id = $user->id;
            $res->restaurant_id = $Restaurants->id;
            $res->status = "Active";
            $res->save();

        }
        if($request['category'] == 3)
        {
            $enduser = new EndUsers();
            $enduser->name = $request->name;
            $enduser->email = $request->email;
            $enduser->profile_image = $request->profile_image;
            $enduser->phone = $request->phone;
            $enduser->mobile_id = $request->mobile_id;
            $enduser->save();

        }

        $token = $user->createToken('Laravel Password Grant Client')->accessToken;
        $response = ['token' => $token,'message' => 'True','record'=>$user];
        return response($response, 200);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function login (Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6|confirmed',
        ]);
        if ($validator->fails())
        {
            return response(['errors'=>$validator->errors()->all()], 200);
        }
        $user = User::where('email', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $token = $user->createToken('Laravel Password Grant Client')->accessToken;
                $response = ['message'=>'True','token' => $token,'record'=>$user];
                return response($response, 200);
            } else {
                $response = ["message" => "Password mismatch",'record'=>$user];
                return response($response, 200);
            }
        } else {
            $response = ["message" =>'User does not exist','record'=>$user];
            return response($response, 200);
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function logout (Request $request) {
        $token = $request->user()->token();
        $token->revoke();
        $response = ['message' => 'You have been successfully logged out!'];
        return response($response, 200);
    }
}
