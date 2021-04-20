<?php


namespace App\Http\Controllers\SuperAdmin;


use App\Http\Controllers\Controller;

class SuperController extends Controller
{

    public function test()
    {
        $response = ["message" => "Password mismatch"];
        return response($response, 200);
    }

}
