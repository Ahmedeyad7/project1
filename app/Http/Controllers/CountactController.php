<?php

namespace App\Http\Controllers;
use App\Models\Setting;
use Illuminate\Http\Request;

class CountactController extends Controller
{
    public function index(){
        $data['settings'] = Setting::first();
        return view('front.contact')->with($data);
    }

}
