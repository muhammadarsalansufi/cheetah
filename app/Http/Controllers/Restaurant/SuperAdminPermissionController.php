<?php


namespace App\Http\Controllers\Restaurant;


use App\Http\Controllers\Controller;
use App\Resturants;

class SuperAdminPermissionController extends Controller
{
    public function resturantlistadmin()
    {
        $record = Resturants::all();
        $message = ["status" => "True",
            "Content" => $record];
        return response($message, 200);
    }

}
