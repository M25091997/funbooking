<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //
    public function index(){
        $user = auth()->user();
        return view("website.profile",['title'=>'Profile | Fun Book Karo','user'=>$user]);
    }
}
