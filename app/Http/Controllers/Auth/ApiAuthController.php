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
        }
        if($request['category'] == 2)
        {

        }

        $token = $user->createToken('Laravel Password Grant Client')->accessToken;
        $response = ['token' => $token,'message' => 'True'];
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
