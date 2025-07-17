<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\khachhang;
use App\Models\chitietsach;
use App\Models\danhmuc;
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
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

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
        $book = new sach();
        return View('admin.qlsach',compact('_sach','_loaisach','_nhaxuatban', 'book'));
    }

    public function insertBook(Request $req){
        $validator = Validator::make($req->all(), [
            'tensach' => 'required',
            'tacgia' => 'required',
            'soluong' => 'required|min:1',
            'dongia' => 'required',
            'anhbia' => 'required|file',
            'tap' => 'required',
            'sotap' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
        }
        $sach=new sach();
        $image = $req->file('anhbia');
        $imageName = $image->hashName();
        Storage::disk('book')->putFileAs('', $image, $imageName);
        $sach->maloai=$req->loaisach;
        $sach->manhaxuatban=$req->nxb;
        $sach->tensach=$req->tensach;
        $sach->tacgia=$req->tacgia;
        $sach->soluong=$req->soluong;
        $sach->dongia=$req->dongia;
        $sach->khuyenmai=$req->khuyenmai;
        $sach->anhbia=$imageName;
        $sach->tap=$req->tap;
        $sach->sotap=$req->sotap;
        $sach->save();
        return response()->json([
            'success'   => 'add Successfully'
        ]);
    }

    function sach_update(Request $req){
        $validator = Validator::make($req->all(), [
            'tensach' => 'required',
            'tacgia' => 'required',
            'soluong' => 'required|min:1',
            'dongia' => 'required',
            'anhbia' => 'required',
            'tap' => 'required',
            'sotap' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
        }
        $id=$req->id;
        $sach=sach::find($id);
        $sach->maloai=$req->loaisach;
        $sach->manhaxuatban=$req->nxb;
        $sach->tensach=$req->tensach;
        $sach->tacgia=$req->tacgia;
        $sach->soluong=$req->soluong;
        $sach->dongia=$req->dongia;
        $sach->khuyenmai=$req->khuyenmai;
        $sach->tap=$req->tap;
        $sach->sotap=$req->sotap;
        if ($req->hasFile('cover')) {
            $image = $req->file('cover');
            $imageName = $image->hashName();
            Storage::disk('book')->putFileAs('', $image, $imageName);
            $sach->anhbia = $imageName;
        }
        $sach->save();
        return response()->json([
            'ok'   => 'update Successfully'
        ]);
    }
    function qlsach_delete(Request $req){
        $id=$req->id;
        $sach=sach::find($id);
        $sach->hidden=1;
        $sach->save();
        $chitietsach = chitietsach::findOrFail($id);
        $chitietsach->hidden = 1;
        $chitietsach->save();
        return response()->json([
            'success'   => 'Delete Successfully' ,
        ]);
    }
    function qlchitietsach(){
        $chitietsach=chitietsach::where(['hidden' => 0])->get();
        $sachs = sach::with( 'chitietsach')->get();
        $ngonngu = ngonngu::all();
        $_loaisach = loaisach::all();
        $_nhaxuatban = nhaxuatban::all();
        return view('admin.qlchitietsach',compact('chitietsach', 'sachs', 'ngonngu', '_loaisach', '_nhaxuatban'));
    }
    function qlchitietsach_insert(){
        $sach = sach::all();
        $ngonngu = ngonngu::all();
        return view('admin.qlchitietsach.add', compact('sach', 'ngonngu'));
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
        $chitietsach=chitietsach::where(['masach' => $id])->first();
        $book = sach::findOrFail($id);
        $ngonngu = ngonngu::all();
        return view('admin.qlchitietsach.edit', compact('book', 'chitietsach', 'ngonngu'));
    }

    public function logout() {
        Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }

    function qlchitietsach_update(Request $request, $id){
        $sach = chitietsach::find($id);
        if ($sach) {
            $sach->save($request->input());
        }
        return redirect('/admin/qlchitietsach');
    }

    /**
     * Dashboard page
     */
    public function dashboard() {
        $customerStat = khachhang::all()->count();
        $totalAmount = dondathang::where('trangthai', 2)->sum('tongtien');
        $formattedAmount = number_format($totalAmount, 0, ',', '.');
        $bookStat = sach::all()->count();
        $categoryStat = danhmuc::all()->count();

        return view('admin.dashboard', [
            'customerStat' => $customerStat,
            'totalAmount' => $formattedAmount,
            'bookStat' => $bookStat,
            'categoryStat' => $categoryStat
        ]);
    }
}
