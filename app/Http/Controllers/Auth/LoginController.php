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

            if ($user->role == 1) {
                return redirect()->route('admin.product'); // Chuyển hướng tới trang dashboard cho admin
            } else {
                Session::flash('success', 'Đăng nhập thành công.');
                // dd($user);
                return redirect()->route('homePage'); // Chuyển hướng tới trang chính cho user thông thường
            }
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
