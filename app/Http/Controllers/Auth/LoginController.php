<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.signin');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            return redirect()->route('homePage');
        }
    
        
        return redirect()->route('login')->with('error', 'Email hoặc mật khẩu không đúng.');
    }
    

    public function logout(Request $request)
    {
        Auth::logout();
        Session::flash('success', 'Đăng xuất thành công');
        return redirect()->route('homePage');
    }
    
}
