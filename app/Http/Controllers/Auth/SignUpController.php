<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class  SignUpController extends Controller
{
    // Hiển thị form đăng ký
    public function showRegistrationForm()
    {
        return view('auth.signup');
    }

    // Xử lý việc đăng ký
    public function signup(Request $request)
    {
        // Validate dữ liệu nhập vào từ form đăng ký
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users|max:255',
            'password' => 'required|string|min:3|confirmed',
        ]);

        // Tạo một user mới
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Chuyển hướng người dùng sau khi đăng ký thành công
        return redirect('login')->with('success', 'Đăng ký thành công! Vui lòng đăng nhập.');
    }
}