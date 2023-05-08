<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class ActiveUserController extends Controller
{
    
    public function AllUser(){
        $users = User::where('role','user')->latest()->get();
        return view('backend.user.user_all_data',compact('users'));

    }  

    public function AllSatici(){
        $saticiler = User::where('role','satici')->latest()->get();
        return view('backend.user.satici_all_data',compact('saticiler'));

    }






}
