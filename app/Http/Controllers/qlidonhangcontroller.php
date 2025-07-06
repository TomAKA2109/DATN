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
        $dondathang=dondathang::orderBy('created_at', 'desc')->get();
        return view('admin.qldonhang',compact('dondathang'));
    }

    function qlchitietdonhang($id_donhang){
        $order = dondathang::find($id_donhang);
        $chitietdondathang=chitietdondathang::where('id_dondathang',$id_donhang)->with('sach')->get();
        return view('admin.qlchitietdonhang',compact('chitietdondathang', 'order'));
    }

    public function qldondatdang_update(Request $req, $id) {
        dondathang::find($id)->update(['trangthai' => $req->input('trangthai')]);
        return redirect('/admin/qldondathang');
    }

    public function qldondatdang_sanpham_delete($orderId, $productId) {
        chitietdondathang::where(['id_dondathang' => $orderId, 'id_sach' => $productId])->delete();
        
        return redirect('/admin/qldondathang/'.$orderId);
    }
}
