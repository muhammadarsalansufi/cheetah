<?php


namespace App\Http\Controllers\MobileApi\Wallet;


use App\FoodOrder;
use App\Http\Controllers\Controller;
use App\Ingridents;
use App\WalletTranscation;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    public function getAccount()
    {
        $user_id =  auth()->user()->id;
        $account_number  =  Wallet::where('user_id','=',$user_id)->get();
        $response = ["status" =>'True','data'=>$account_number ];
        return response($response, 200);

    }
    public function sendAmount(Request $request)
    {
        $amount = $request->amount;
        $account_num = $request->account_number;
        $sender_name  = auth()->user()->name;
        $sender_id =  auth()->user()->id;      
        $receiver_id =   Wallet::where('account_num','=', $account_num)->pluck('user_id')->first();
        $receiver_name  =  User::where('id','=',$receiver_id)->pluck('name')->first();
        $senderbalance =  Wallet::where('user_id','=',$sender_id)->pluck('balance')->first();
        $receiverbalance = Wallet::where('account_num','=',$account_num )->pluck('balance')->first();
        if($amount > $senderbalance )
        {
            $response = ["status" =>'False','message'=>'InSufficient Balance'];
        }
        else 
        {
           if(Wallet::where('account_num','=',$account_num)->exists())
           {
               $newsensderbalance = $senderbalance - $amount;
               $newreceiverbalance = $receiverbalance  + $amount;
               Wallet::where('account_num','=',$account_num)->update(['balance'=> $newreceiverbalance]);
               Wallet::where('user_id','=',$sender_id)->update(['balance'=> $newsensderbalance ]);
               $transcation =  new WalletTranscation();
               $transcation ->sender_name = $sender_name;
               $transcation ->sender_id = $sender_id;
               $transcation ->receiver_name = $receiver_name;
               $transcation ->receiver_id = $receiver_id;
               $transcation ->amount_sent = $amount;
               $transcation ->status = 'Active';
               $transcation ->save();
               $response = ["status" =>'True','message'=>'Transcation Successfully Done!'];

           }
           else {
            $response = ["status" =>'False','message'=>'Invalid Sender Account'];
           }
        }
        return response($response, 200);

    }
    public function getSentTranscations()
    {
        $my_id =  auth()->user()->id;  
        $account_number  =  WalletTranscation::where('sender_id','=',$my_id)->get();
        $response = ["status" =>'True','data'=>$account_number ];
        return response($response, 200);

    }
    public function getreceivedTranscations()
    {
        $my_id =  auth()->user()->id; 
        $account_number  =  WalletTranscation::where('receiver_id','=',$my_id)->get();
        $response = ["status" =>'True','data'=>$account_number ];
        return response($response, 200);
    }

}