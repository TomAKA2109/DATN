<?php

namespace App\Http\Controllers;

use App\Models\khachhang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class khachhangcontroller extends Controller
{
    public function hienThiDangNhap()
    {
        return view('page.login');
    }

    public function dangnhap(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        if (Auth::guard('customers')->attempt(['username' => $request->input('username'), 'password' => $request->input('password')], $request->input('remember_me'))) {
            return redirect('/home');
        }
        return redirect()->back()->with('message', 'Đăng nhập không thành công');
    }

    public function hienThiDangKy()
    {
        // Logic to add a customer
        return view('page.dangki');
    }

    public function dangKy(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:khachhang,username',
            'password' => 'required|confirmed',
            'mail' => 'required|email|unique:khachhang,mail'
        ], [

        ]);
        khachhang::create($request->input());
        if ($request->input('remember_me')) {
            Cookie::queue('khachhang_login', $request->input('username'));
        }
        return redirect('kh_login');
    }
}
