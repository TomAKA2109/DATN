<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\khachhang;
use App\Models\chitietsach;
use App\Models\sach as sach;
use App\Models\loaisach as loaisach;
use App\Models\ngonngu;
use App\Models\nhaxuatban as nhaxuatban;
use App\Models\dondathang;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class admincontroller extends Controller
{
    function getlogin(){
    	return View('admin.login');
    }
    function getkhachhang(){
        return View('admin.adduser');
    }

    function addkhachhang1(){
        return View('admin.adduser');
    }
    function postkhachhang1(Request $req){
        $khachhang=new khachhang;
        $khachhang->ten=$req->txthoten;
        $khachhang->username=$req->txtusername;
        $khachhang->password=bcrypt($req->PassWord);
        $khachhang->sdt=$req->Phonenumber;
        $khachhang->diachi=$req->txtdiachi;
        $khachhang->mail=$req->email;
        $khachhang->save();

        $khachhang = khachhang::all();
        return View('admin.qlkhachhang', compact('khachhang'));
    }

    function postkhachhang(Request $req){
        $khachhang=new khachhang;
        $khachhang->ten=$req->txthoten;
        $khachhang->username=$req->txtusername;
        $khachhang->password=bcrypt($req->PassWord);
        $khachhang->sdt=$req->Phonenumber;
        $khachhang->diachi=$req->txtdiachi;
        $khachhang->mail=$req->email;
        $khachhang->save();

        return View('admin.login')->with(['thongbao'=>'Tạo tài khoản thành công!']);
    }
    function getloaisach(){
        return View('admin.loaisach');
    }

    function sachmoi(){
        return View('page.danhmucsanpham.sachmoi');
    }

    public function postlogin(Request $request){
        $email = $request->input('email');
        $password = $request->input('password');
        if (Auth::guard('admin')->attempt(['email' => $email, 'password' => $password])) {
            return redirect('/admin/qlkhachhang');
        }
        return redirect('/admin/login')->with('message', 'Đăng nhập thất bại');
    }


    function kh_logout(){
        Auth::guard('customers')->logout();
        return redirect('home');
    }
    function qlkhachhang(){
        $khachhang = khachhang::all();
        return View('admin.qlkhachhang', compact('khachhang'));
    }

    function qldondathang(){
        $donhang = dondathang::all();
        return View('admin.qldonhang', compact('donhang'));
        // return 1;
    }

    function editkhachhang(Request $req){
            $id=$req->id;
            $userData = khachhang::find($id);
            $userData->ten = request('ten');
            $userData->username = request('username');
            if(request('password')!=""){
            $userData->password = bcrypt(request('password'));
            $userData->sdt = request('sdt');
            $userData->diachi = request('diachi');
            $userData->mail = request('mail');
            $userData->save();
            return json_encode(array('statusCode'=>200));
            }
            else{
            $userData->sdt = request('sdt');
            $userData->diachi = request('diachi');
            $userData->mail = request('mail');
            $userData->save();
            return json_encode(array('statusCode'=>200));
            }



    }
    function deletekhachhang(Request $req){
        $id=$req->id;
        $res=khachhang::where('id',$id)->delete();
        return json_encode(array('statusCode'=>200));
    }
    function qlsach(){
        $_loaisach=loaisach::all();
        $_nhaxuatban=nhaxuatban::all();
        $_sach=DB::table('sach')
              ->where('hidden','=',0)
            ->join('loaisach','loaisach.id', '=', 'sach.maloai')
            ->join('nhaxuatban','nhaxuatban.id', '=', 'sach.manhaxuatban')
            ->select('sach.*', 'loaisach.tenloai','nhaxuatban.tennhaxuatban')
            ->get();
        return View('admin.qlsach',compact('_sach','_loaisach','_nhaxuatban'));
    }
    function insertdatas(Request $req){
        $sach=new sach();
        $image = $req->file('select_file');
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move('public/image/anhsanpham', $new_name);
        $sach->maloai=$req->loaisach;
        $sach->manhaxuatban=$req->nxb;
        $sach->tensach=$req->tensach;
        $sach->tacgia=$req->tacgia;
        $sach->soluong=$req->soluong;
        $sach->dongia=$req->dongia;
        $sach->khuyenmai=$req->khuyenmai;
        $sach->anhbia=$new_name;
        $sach->tap=$req->tap;
        $sach->sotap=$req->sotap;
        $sach->save();
        return response()->json([
       'success'   => 'add Successfully'
      ]);
    }
    function sach_update(Request $req){
        $id=$req->ud_masach;
        $sach=sach::find($id);
        $sach->maloai=$req->ud_loaisach;
        $sach->manhaxuatban=$req->ud_nxb;
        $sach->tensach=$req->ud_tensach;
        $sach->tacgia=$req->ud_tacgia;
        $sach->soluong=$req->ud_soluong;
        $sach->dongia=$req->ud_dongia;
        $sach->khuyenmai=$req->ud_khuyenmai;
        //$sach->anhbia=$req->ud_anhbia;
        $sach->tap=$req->ud_tap;
        $sach->sotap=$req->ud_sotap;
        $sach->save();
        $req->file();
        return response()->json([
            'ok'   => 'update Successfully'
        ]);
    }
    function qlsach_delete(Request $req){
        $id=$req->id;
        $sach=sach::find($id);
        $sach->hidden=1;
        $sach->save();
        return response()->json([
       'success'   => 'Delete Successfully' ,
      ]);
    }
    function qlchitietsach(){
        $chitietsach=chitietsach::all();
        $sachs = sach::with( 'chitietsach')->get();
        $ngonngu = ngonngu::all();
        $_loaisach = loaisach::all();
        $_nhaxuatban = nhaxuatban::all();
        return view('admin.qlchitietsach',compact('chitietsach', 'sachs', 'ngonngu', '_loaisach', '_nhaxuatban'));
    }
    function qlchitietsach_insert(){
        $sach = sach::all();
        $ngonngu = ngonngu::all();
        return view('admin.chitietsach_add', compact('sach', 'ngonngu'));
    }
    function qlchitietsach_insert_post(Request $req){
        $chitietsach = new chitietsach();
        $chitietsach->masach=$req->tensach;
        $chitietsach->mangonngu=$req->ngonngu;
        $chitietsach->sotrang=$req->sotrang;
        $chitietsach->namxuatban=$req->namxuatban;
        $chitietsach->noidung=$req->noidung;
        $chitietsach->kichthuoc=$req->kichthuoc;
        $chitietsach->trongluong=$req->trongluong;
        $chitietsach->ngayphathanh=$req->ngayphathanh;
        $chitietsach->save();
        return redirect('admin/qlchitietsach');
    }

    function qlchitietsach_edit($id){
       $chitietsach=chitietsach::all();
       $sachs = sach::findOrFail($id);
       return view('admin.qlchitietsach.edit', compact('sachs', 'chitietsach'));
    }



    function qlchitietsach_edit_post(Request $request, $id){
        $sach = sach::find(['id' => $id]);
        if ($sach) {
            $sach->save($request->input());
        }
    }
}
