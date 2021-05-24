<?php


namespace App\Http\Controllers\SuperAdmin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuperController extends Controller
{

    public function test(Request $request)
    {
        $response = ["message" => "Password mismatch"];
        return response($response, 200);
    }

}
