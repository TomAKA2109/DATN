<?php

namespace App\Http\Controllers;
use App\Models\chitietdondathang;
use App\Models\dondathang;
use App\Models\sach;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class qlidonhangcontroller extends Controller
{
    public function postCheckout(Request $req)
    {
        $req->validate([
            'name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'phone' => 'required'
        ]);

        $cart = Session::get('cart');

        if (!$cart || !is_object($cart)) {
            return redirect()->back()->with('error', 'Giỏ hàng trống hoặc không hợp lệ.');
        }

        $dondathang = new dondathang();

        $dondathang->id_khachhang = Auth::guard('customers')->user()->id;
        $dondathang->tongtien = $cart->totalPrice;
        $dondathang->phuongthucthanhtoan = $req->payment_method;

        $dondathang->hoten = $req->input('name');
        $dondathang->gioitinh = $req->input('gender');
        $dondathang->email = $req->input('email');
        $dondathang->diachi = $req->input('address');
        $dondathang->sodienthoai = $req->input('phone');
        $dondathang->ghichu = $req->input('notes');
        $dondathang->save();

        foreach ($cart->items as $carts) {
            $chitiet = new chitietdondathang();
            $chitiet->id_dondathang = $dondathang->id;
            $chitiet->id_sach = $carts['item']->id;
            $chitiet->soluong = $carts['qty'];
            $chitiet->dongia = $carts['price'];
            $chitiet->save();
        }

        session()->forget('cart');

        return redirect('/dat-hang')->with([
            'thongbao' => "Đặt hàng thành công! Kiểm tra đơn hàng tại <a href='/donhang'>Đơn hàng của tôi</a>",
        ]);
    }

    function qldondathang(){
        $dondathang=dondathang::all();
        return view('admin.qldonhang',compact('dondathang'));
    }

    function qlchitietdonhang($id_donhang){
        $chitietdondathang=chitietdondathang::where('id_dondathang',$id_donhang)->get();
        $sach = sach::all();
        return view('admin.qlchitietdonhang',compact('chitietdondathang', 'sach'));
    }
    function qlchitietdonhang_delete(Request $req){
        $id=$req->id;
        $cthd=chitietdondathang::find($id);
        $hd=dondathang::find($cthd->id_dondathang);
        $hd_tongtien=$hd->tongtien;
        $cthd_tongtien=$cthd->soluong*$cthd->dongia;
        $hd->tongtien=$hd_tongtien-$cthd_tongtien;
        $hd->save();
        $cthd->delete();
        return response()->json([
       'success'   => 'Delete Successfully!',
      ]);
    }
    function qldonhang_delete(Request $req)
    {
        $id=$req->id;
        $ctdonhang=chitietdondathang::where('id_dondathang',$id)->delete();
        $donhang=dondathang::find($id)->delete();
        return response()->json([
       'success'   => 'Delete Successfully!',
      ]);
    }
}
