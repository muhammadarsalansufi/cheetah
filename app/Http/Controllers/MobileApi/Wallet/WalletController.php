<?php


namespace App\Http\Controllers\MobileApi\Wallet;


use App\FoodOrder;
use App\Http\Controllers\Controller;
use App\Ingridents;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    public function getAccount()
    {
        $user_id =  Auth()->user()->id;
        $account_number  =  Wallet::where('user_id','=',$user_id)->get();
        $response = ["status" =>'true','data'=>$account_number ];
        return response($response, 200);

    }

}