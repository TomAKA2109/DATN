<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\homecontroller;
use App\Http\Controllers\admincontroller;
use App\Http\Controllers\khachhangcontroller;
use App\Http\Controllers\qldanhmuccontroller;
use App\Http\Controllers\qlidonhangcontroller;
use App\Http\Middleware\CustomerMustAuthenticated;
use App\Models\khachhang;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function() {
    return redirect('/home');
});
Route::get('/home',[homecontroller::class,'gethome'])->name('home');
Route::get('/admin/loaisach',[admincontroller::class,'getloaisach'])->name('admin/loaisach');
Route::get('/danhmuc/{id}',[homecontroller::class,'getdanhmuc'])->name('danhmuc');
Route::get('/danhmuc/{id}/{tacgia}',[homecontroller::class,'danhmuc_tacgia'])->name('danhmuc/tacgia');
Route::get('/danh-muc/{id}/{tacgia}', [homecontroller::class,'getlocTheoTacGia'])->name('timtheotacgia');
Route::get('/thongtincanhan', [homecontroller::class,'getThongtin'])->middleware([CustomerMustAuthenticated::class])->name('thongtin');
Route::post('/capnhatthongtin', [homecontroller::class,'postCapNhatThongTin'])->middleware([CustomerMustAuthenticated::class])->name('capnhatthongtin');
Route::get('/donhang', [homecontroller::class,'getDonHang'])->name('donhang')->name('donhang');
Route::get('loaisach/{id}',[homecontroller::class,'getloaisach'])->name('loaisach');
Route::get('sanpham/{id}',[homecontroller::class,'chitietsanpham'])->name('chitietsanpham');
Route::get('/kh_login',[khachhangcontroller::class,'hienThiDangNhap'])->name('kh_login');
Route::post('/kh_login',[khachhangcontroller::class,'dangnhap']);
Route::get('/kh_logout',[admincontroller::class,'kh_logout'])->name('kh_logout');
Route::get('add-to-card/{id}', [homeController::class, 'getAddToCart'])->name('themvaogiohang');
Route::get('delete-cart/{id}',['as'=>'xoagiohang','uses'=>[homecontroller::class,'getDelItemCart']]);
Route::get('update-cart/{id}-{qty}',['as'=>'capnhatgiohang','uses'=>[homecontroller::class,'getUpdateItemCart']]);
Route::get('dat-hang/', [homeController::class, 'getCheckout'])->name('getdathang');
Route::post('dat-hang/', [QliDonHangController::class, 'postCheckout'])->name('postdathang');
Route::post('/timkiem/',['as'=>'timkiem', 'uses'=>[homecontroller::class,'timkiem']]);
Route::get('/searching', [homecontroller::class, 'timkiem_key'])->name('timkiem_key');
Route::get('/dangki', [khachhangcontroller::class, 'hienThiDangKy'])->name('dangki');
Route::post('/dangki', [khachhangcontroller::class, 'dangKy'])->name('dangki');

/**
 * Admin Routes
 * These routes are prefixed with 'admin' and are used for managing the admin panel.
 */
Route::group(['prefix' => 'admin','as'=>'admins'], function() {
   	Route::get('/login',[admincontroller::class,'getlogin'])->name('getlogin');
    Route::post('/admin',[admincontroller::class,'postlogin'])->name('admin');
    Route::get('/qlkhachhang1/addusers',[admincontroller::class,'addkhachhang1'])->name('qlkhachhang1/addusers');
    Route::post('/qlkhachhang1/postusers',[admincontroller::class,'postkhachhang1'])->name('qlkhachhang1/postusers');
    Route::get('/qlkhachhang',[admincontroller::class,'qlkhachhang'])->name('qlkhachhang');
    Route::get('/qlkhachhang/addusers',[admincontroller::class,'addkhachhang'])->name('qlkhachhang/addusers');
	Route::post('qlkhachhang/postkh',[admincontroller::class,'postkhachhang'])->name('qlkhachhang/postkh');
	Route::post('qlkhachhang/editkh',[admincontroller::class,'editkhachhang'])->name('qlkhachhang/editkh');
	Route::post('qlkhachhang/deletekh',[admincontroller::class,'deletekhachhang'])->name('qlkhachhang/deletekh');
    Route::get('/qlsach',[admincontroller::class,'qlsach'])->name('qlsach');
    Route::post('/qlsach/insert',[admincontroller::class,'insertdatas'])->name('qlsach/insert');
    Route::post('qlsach/update',[admincontroller::class,'sach_update'])->name('qlsach/update');
    Route::post('/qlsach/delete/',[admincontroller::class,'qlsach_delete'])->name('qlsach/delete');
    Route::get('/qldanhmuc',[qldanhmuccontroller::class,'qldanhmuc'])->name('qldanhmuc');
    Route::post('/qldanhmuc/insert',[qldanhmuccontroller::class,'qldanhmuc_insert'])->name('qldanhmuc/insert');
    Route::post('/qldanhmuc/update',[qldanhmuccontroller::class,'qldanhmuc_update'])->name('qldanhmuc/update');
    Route::post('/qldanhmuc/delete/',[qldanhmuccontroller::class,'qldanhmuc_delete'])->name('qldanhmuc/delete');
    Route::get('/qldondathang', [qlidonhangcontroller::class, 'qldondathang'])->name('qldondathang');
    Route::post('/qldondathangs/delete',[qlidonhangcontroller::class,'qldonhang_delete'])->name('delete_donhang');
    Route::get('/qldondathang/{id_donhang}',[qlidonhangcontroller::class,'qlchitietdonhang'])->name('chitietdonhang');
    Route::post('/qldondathang/delete',[qlidonhangcontroller::class,'qlchitietdonhang_delete'])->name('chitietdonhang/delete');
    Route::get('/qlchitietsach',[admincontroller::class,'qlchitietsach'])->name('qlchitietsach');
    Route::get('/qlchitietsach/insert',[admincontroller::class,'qlchitietsach_insert'])->name('qlchitietsach/insert');
    Route::post('/qlchitietsach/insert/post',[admincontroller::class,'qlchitietsach_insert_post'])->name('qlchitietsach/insert/post');
    Route::get('/qlchitietsach/edit/{id}',[admincontroller::class,'qlchitietsach_edit'])->name('qlchitietsach.edit');
    Route::post('/qlchitietsach/edit/post/{id}',[admincontroller::class,'qlchitietsach_edit_post'])->name('qlchitietsach.edit.post');


});
Route::get('reset-session', function() {
    session()->forget('cart');
    session()->flush();
});
