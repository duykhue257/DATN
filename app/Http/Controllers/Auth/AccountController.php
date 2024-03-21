<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    //
    public function showDeleteForm()
    {
        return view('admin.user.list_user');
    }

    // Xử lý yêu cầu xóa tài khoản
    public function delete(Request $request)
    {
        $user = Auth::user();

        // Thực hiện xóa tài khoản từ cơ sở dữ liệu
        $user->delete();

        // // Đăng xuất người dùng sau khi xóa tài khoản
        // Auth::logout();

        return back();
    }
}
