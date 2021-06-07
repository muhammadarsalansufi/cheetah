<?php

namespace App\Http\Controllers\Auth;

use App\CateringServiceProvider;
use App\Http\Controllers\Controller;
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
        $response = ['token' => $request['category_type']];
        return response($response, 200);
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'type' => 'integer'

        ]);
        if ($validator->fails())
        {
            return response(['errors'=>$validator->errors()->all()], 422);
        }
        $request['password']=Hash::make($request['password']);
        $request['remember_token'] = Str::random(10);
        $request['type'] = $request['type'] ? $request['type']  : 0;
        if($request['category_type'] == 'catering')
        {
            $catering = new CateringServiceProvider();
            $catering->name = $request->name;
            $catering->email = $request->email;
            $catering->email_status = $request->email_status;
            $catering->approval_status = $request->approval_status;
            $catering->status = $request->status;
            $catering->save();
        }
        if($request['category_type'] == 'restaurant')
        {

        }
        $user = User::create($request->toArray());
//        $token = $user->createToken('Laravel Password Grant Client')->accessToken;

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
                $response = ['message'=>'True','token' => $token,'user'=>$user];
                return response($response, 200);
            } else {
                $response = ["message" => "Password mismatch",'user'=>$user];
                return response($response, 200);
            }
        } else {
            $response = ["message" =>'User does not exist','user'=>$user];
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
