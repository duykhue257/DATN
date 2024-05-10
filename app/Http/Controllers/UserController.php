<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\DataTables\UserDataTable;
use App\DataTables\AdminDataTable;

class UserController extends Controller
{
    //
    public function index(UserDataTable $dataTable){
        $users = User::where('role', 0)->get();
        /* return view('admin.user.list_user', compact('users')); */
        return $dataTable->render('admin.user.list_user', compact('users'));
    }
    
    public function admin(AdminDataTable $dataTable){
        $admins = User::where('role', 1)->get();
        /* return view('admin.user.list_admin', compact('admins')); */
        return $dataTable->render('admin.user.list_admin', compact('admins'));
    }
    
}
