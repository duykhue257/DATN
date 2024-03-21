<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index(){
        $users = User::where('role', 0)->get();
        return view('admin.user.list_user', compact('users'));
    }
    
    public function admin(){
        $admins = User::where('role', 1)->get();
        return view('admin.user.list_admin', compact('admins'));
    }
    
}
