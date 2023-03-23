<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index(){
        $users = User::all();
        return view('admin.index',compact(['users']));
    }  
}
