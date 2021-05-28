<?php


namespace App\Http\Controllers\SuperAdmin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuperController extends Controller
{

    public function addimageSlider(Request $request)
    {
        $response = ["message" => "Testin passed"];
        return response($response, 200);
    }

}
