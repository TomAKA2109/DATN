<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\slide as slides;
use Illuminate\Support\Facades\DB;
use App\Models\khachhang as khachhang;
use App\Models\chitietsach;
use App\Models\danhmuc as danhmuc;
use App\Models\loaisach as loaisach;
use App\Models\nhaxuatban as nhaxuatban;
use App\Models\sach as sach;
use App\Models\Cart;
// Removed duplicate 'use Session;' statement
use App\demphantu;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class homecontroller extends Controller
{
    function gethome(){
    	$sl=DB::table('quangcao')->where('maloaiquangcao', '=', 1)->get();
        $danhmuc=danhmuc::all();
        $loaisach=loaisach::all();
        $nxb=nhaxuatban::all();
        $totalQty = 0;
        $product_cart = Session::get('cart');
        $sach=DB::table('sach')->where('hidden','=',0)->get();
    	return View('page.home',compact('sl','danhmuc','loaisach','nxb','sach', 'totalQty', 'product_cart'));
    }

    public function addusers(){
    	return View('admin.adduser');
    }

    public function getThongTin(){
        // Lấy thông tin người dùng từ cookie/session
        $user = Cookie::get('khachhang_login'); // hoặc dùng Auth nếu có

        // Truy vấn DB theo tên đăng nhập, ví dụ:
        $khachhang = DB::table('khachhang')->where('username', $user)->first();

        return view('page.thongtin.thongtin', compact('khachhang'));
    }

    public function postCapNhatThongTin(Request $request){
        $username = Cookie::get('khachhang_login');
        $customer = khachhang::where('username', $username)->first();
        $request->validate([
            'ten' => 'required',
            'sdt' => 'required|unique:khachhang,sdt,'.$customer->id,
            'diachi' => 'required'
        ]);

        if ($customer) {
            $customer->update($request->input());
        }

        return redirect()->back()->with('success', 'Cập nhật thông tin thành công!');

    }

    function getDonHang(){
        $username = Cookie::get('khachhang_login');

        if (!$username) {
            return redirect()->route('kh_login')->with('error', 'Bạn cần đăng nhập để xem đơn hàng.');
        }

        // Lấy id của khách hàng từ username
        $khachhang = DB::table('khachhang')->where('username', $username)->first();

        if (!$khachhang) {
            return redirect()->route('kh_login')->with('error', 'Tài khoản không tồn tại.');
        }

        // Lấy đơn hàng theo id_khachhang và chọn rõ các cột
        $donhangs = DB::table('dondathang')
            ->select('id', 'hoten', 'sodienthoai', 'tongtien', 'trangthai') // Thêm dòng này
            ->where('id_khachhang', $khachhang->id)
            ->orderByDesc('id')
            ->get();

        return view('page.donhang.donhang', compact('donhangs'));
    }



    function getsachkinhte(Request $req){
        $id=$req->id;
        $danhmuc_id=danhmuc::find($id);
        $sach_danhmuc_id=sach::where('maloai',$danhmuc_id->id)->get();
        $tacgia=[];
        $nxbs=[];
        $error="";
        if(count( $sach_danhmuc_id)>0)
        {
            $array=array();
            $array[0]['tacgia']= $sach_danhmuc_id[0]->tacgia;
            $array[0]['sl']=0;
            $dem=0;
            for($i=0;$i<1;$i++){
                foreach( $sach_danhmuc_id as $datas){
                    if($array[$i]['tacgia']!=$datas->tacgia){
                        $dem+=1;
                        $array[$dem]['tacgia']=$datas->tacgia;
                        $array[$dem]['sl']=1;
                    }
                    else{
                        $array[$i]['sl']+=1;
                    }
                }
            }
            $arrays=array_unique($array,0);
            $tacgia=array();
            $dem=-1;
            foreach($arrays as $ls){
                $dem+=1;
                $tacgia[$dem]['tacgia']=$ls['tacgia'];
                $tacgia[$dem]['sl']=0;
            }
            for($i=0;$i<count($tacgia);$i++){
                foreach ( $sach_danhmuc_id as $sachs) {
                    if($tacgia[$i]['tacgia']==$sachs->tacgia)
                    {
                        $tacgia[$i]['sl']+=1;
                    }
                }
            }
            $array=array();
            $array[0]['nxb']= $sach_danhmuc_id[0]->manhaxuatban;
            $array[0]['sl']=0;
            $dem=0;
            for($i=0;$i<1;$i++){
                foreach( $sach_danhmuc_id as $datas){
                    if($array[$i]['nxb']!=$datas->manhaxuatban){
                        $dem+=1;
                        $array[$dem]['nxb']=$datas->manhaxuatban;
                        $array[$dem]['sl']=1;
                    }
                    else{
                        $array[$i]['sl']+=1;
                    }
                }
            }
            $arrays=array_unique($array,0);
            $nxbs=array();
            $dem=-1;
            foreach($arrays as $nxb){
                $dem+=1;
                $nxbs[$dem]['nxb']=$nxb['nxb'];
                $nxbs[$dem]['sl']=0;
            }
            for($i=0;$i<count($nxbs);$i++){
                foreach ( $sach_danhmuc_id as $sach_nxb) {
                    if($nxbs[$i]['nxb']==$sach_nxb->manhaxuatban)
                    {
                        $nxbs[$i]['sl']+=1;
                    }
                }
            }
        }
        else{
            $error="Danh mục sản phẩm này chưa được bày bán trên website.Vui lòng chọn sản phẩm khác!";
        }
    	return View('page.danhmucsanpham.danhmucsach',compact('id','danhmuc_id','sach_danhmuc_id','tacgia','error','nxbs'));
    }
    function danhmuc_tacgia($id,$tacgia){
        $danhmuc_id=danhmuc::find($id);
        $danhmucsach_id=sach::where('maloai',$danhmuc_id->id)->get();
        $danhmucsach_tacgia=sach::where('tacgia',$tacgia)->get();
        $error="";
        if(count($danhmucsach_id)>0){
            $array=array();
        $array[0]['tacgia']= $danhmucsach_id[0]->tacgia;
        $array[0]['sl']=0;
        $dem=0;
        for($i=0;$i<1;$i++){
            foreach( $danhmucsach_id as $datas){
                if($array[$i]['tacgia']!=$datas->tacgia){
                    $dem+=1;
                    $array[$dem]['tacgia']=$datas->tacgia;
                    $array[$dem]['sl']=1;
                }
                else{
                    $array[$i]['sl']+=1;
                }
            }
         }
        $arrays=array_unique($array,0);
        $tacgia=array();
        $dem=-1;
        foreach($arrays as $ls){
             $dem+=1;
            $tacgia[$dem]['tacgia']=$ls['tacgia'];
            $tacgia[$dem]['sl']=0;
        }
        for($i=0;$i<count($tacgia);$i++){
            foreach ( $danhmucsach_id as $sachs) {
                if($tacgia[$i]['tacgia']==$sachs->tacgia)
                {
                    $tacgia[$i]['sl']+=1;
                }
            }
       }
       $array=array();
        $array[0]['nxb']= $danhmucsach_id[0]->manhaxuatban;
        $array[0]['sl']=0;
        $dem=0;
        for($i=0;$i<1;$i++){
            foreach( $danhmucsach_id as $datas){
                if($array[$i]['nxb']!=$datas->manhaxuatban){
                    $dem+=1;
                    $array[$dem]['nxb']=$datas->manhaxuatban;
                    $array[$dem]['sl']=1;
                }
                else{
                    $array[$i]['sl']+=1;
                }
            }
         }
        $arrays=array_unique($array,0);
        $nxbs=array();
        $dem=-1;
        foreach($arrays as $nxb){
             $dem+=1;
            $nxbs[$dem]['nxb']=$nxb['nxb'];
            $nxbs[$dem]['sl']=0;
        }
        for($i=0;$i<count($nxbs);$i++){
            foreach ( $danhmucsach_id as $sach_nxb) {
                if($nxbs[$i]['nxb']==$sach_nxb->manhaxuatban)
                {
                    $nxbs[$i]['sl']+=1;
                }
            }
        }
        }
        else{
            $error="Danh mục sản phẩm này chưa được bày bán trên website.Vui lòng chọn sản phẩm khác!";
        }

        //echo "ok";
        return View('page.danhmucsanpham.danhmucsach_tacgia',compact('id','danhmuc_id','danhmucsach_id','tacgia','error','nxbs','danhmucsach_tacgia'));
    }
    function getdanhmuc($id){
        $danhmuc=danhmuc::all();
        $loaisach = loaisach::all();
        $danhmucDangxem=danhmuc::find($id);
        $nxb=nhaxuatban::all();

        $maloaiList = DB::table('loaisach')
        ->where('madanhmuc', $id)
        ->pluck('id');

        $sach=DB::table('sach')
            ->where('hidden','=',0)
            ->whereIn('maloai',$maloaiList)
            ->get();

        $tacgias = $sach->pluck('tacgia')->unique();

    	return View('page.danhmucsanpham.danhmuc',compact('danhmuc','danhmucDangxem','nxb','sach','tacgias','loaisach'));
    }


    function getlocTheoTacGia($madanhmuc, $tacgia) {
        $danhmuc = danhmuc::all();
        $danhmucDangxem = danhmuc::find($madanhmuc);

        $maloaiList = DB::table('loaisach')
            ->where('madanhmuc', $madanhmuc)
            ->pluck('id');

        // Giải mã tên tác giả từ URL
        $tentacgia = urldecode($tacgia);

        // Lọc sách theo tên tác giả
        $sach = DB::table('sach')
            ->where('hidden', 0)
            ->whereIn('maloai', $maloaiList)
            ->where('tacgia', $tentacgia)
            ->get();

        // Lấy danh sách tác giả hiện có trong danh mục
        $tacgias = DB::table('sach')
            ->whereIn('maloai', $maloaiList)
            ->pluck('tacgia')->unique();

        return view('page.danhmucsanpham.danhmuc', compact(
            'danhmuc', 'danhmucDangxem', 'sach', 'tacgias'
        ));
    }



    function getloaisach($id){
        $sach=sach::where('maloai',$id)->get();
        $loaisach=loaisach::find($id);
        $danhmuc=danhmuc::all();
    	return View('page.danhmucsanpham.loaisach',compact('sach','loaisach','danhmuc'));
        // return [$sach, $loaisach];
    }

    function chitietsanpham(Request $request)
    {   $id=$request->id;
        $danhmuc = danhmuc::all();
        $loaisach = loaisach::all();
        $sach=sach::find($id);
        $nxbs=nhaxuatban::find($sach->manhaxuatban);
        $loaisachs=loaisach::find($sach->maloai);
        $sach_lienquan=sach::where('maloai',$sach->maloai)->get();
        $chitietsanpham=chitietsach::find($id);
        return View('page.sanpham.ctsanpham',compact('sach','nxbs','chitietsanpham','loaisachs','sach_lienquan', 'danhmuc','loaisach'));
    }
    function getAddToCart(Request $req,$id){
        $product=sach::find($id);
        $totalQty = 0;
        $product_cart = Session::get('cart');
        $oldcart=Session('cart')?Session::get('cart'):null;
        $cart=new Cart($oldcart);
        $cart->add($product,$id);
        $req->session()->put('cart',$cart);
        return redirect()->back()->with([
            'totalQty' => $cart->totalQty,
            'product_cart' => $cart
        ]);
    }
    function getUpdateItemCart(Request $req,$id,$qty){
        $product=sach::find($id);
        $oldcart=Session::get('cart');
        foreach ($oldcart->items as $carts) {
            if($carts['item']['id']==$id){
                if ($carts['qty']<$qty) {
                    $cart=new Cart($oldcart);
                    $cart->add($product,$id);
                    $req->session()->put('cart',$cart);
                }
                else
                   {
                    $cart=new Cart($oldcart);
                    $cart->reduceByOne($id);
                    if(count($cart->items)>0){
                        Session::put('cart',$cart);
                     }
                     else{
                        session()->forget('cart');
                     }
                   }
            }
        }
         return redirect()->back();
    }
    function getDelItemCart($id){
        $oldcart=Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldcart);
        $cart->removeItem($id);
        if(count($cart->items)>0){
            Session::put('cart',$cart);
        }
        else{
            session()->forget('cart');
        }
        return redirect()->back();
    }
    function getCheckout(){
        $danhmuc=danhmuc::all();
        $loaisach=loaisach::all();
        $nxb=nhaxuatban::all();
        return View('page.sanpham.checkout', compact('danhmuc', 'loaisach', 'nxb'));
    }
    function timkiem(Request $req) {
        return 0;
        // if ($req->has('query')) {
        //     $querys = trim($req->input('query'));

        //     // Nếu chuỗi tìm kiếm rỗng thì trả về output trống
        //     if ($querys === '') {
        //         return response()->json(['success' => '']);
        //     }

        //     $data = DB::table('sach')
        //         ->where('tensach', 'LIKE', '%' . $querys)
        //         ->orWhere('tensach', 'LIKE', $querys . '%')
        //         ->get();

        //     // Nếu không có kết quả tìm thấy
        //     if ($data->isEmpty()) {
        //         return response()->json(['success' => '']);
        //     }

        //     // Có kết quả → tạo HTML
        //     $output = '<ul style="display:block;position:relative;background:white;z-index:1000;list-style-type: none;width:394px;">';
        //     foreach ($data as $row) {
        //         $output .= "<a href=\"sanpham/$row->id\"><li><img src=\"/image/anhsanpham/$row->anhbia\" style=\"width:50px;height:70px\">&nbsp;&nbsp;$row->tensach</li></a>";
        //     }
        //     $output .= '</ul>';

        //     return response()->json(['success' => $output]);
        // }

        // // Nếu không có request query
        // return response()->json(['success' => '']);
    }

    function timkiem_key(Request $req) {
        $key = $req->key;
        $error = null; // ✅ Khởi tạo biến để tránh lỗi compact
        $danhmuc = danhmuc::all();

        $sach = sach::where('tensach', 'LIKE', '%' . $key . '%')->get();

        if (count($sach) == 0) {
            $error = "Không Tìm Thấy Sản Phẩm Nào Với Từ Khóa: \"$key\". Vui Lòng Tìm Kiếm Sản Phẩm Khác!";

            // Truyền thêm các biến với mảng rỗng để tránh lỗi
            $sach = collect();
            $loaisach = [];
            $tacgia = [];
            $nxbs = [];

            return view('page.sanpham.timkiem', compact('key', 'error', 'sach', 'loaisach', 'tacgia', 'nxbs', 'danhmuc'));
        }

        // ================== Đếm theo loại sách ==================
        $array = [];
        $array[0]['maloai'] = $sach[0]->maloai;
        $array[0]['sl'] = 0;
        $dem = 0;

        for ($i = 0; $i < 1; $i++) {
            foreach ($sach as $datas) {
                if ($array[$i]['maloai'] != $datas->maloai) {
                    $dem++;
                    $array[$dem]['maloai'] = $datas->maloai;
                    $array[$dem]['sl'] = 1;
                } else {
                    $array[$i]['sl']++;
                }
            }
        }

        $arrays = array_unique($array, SORT_REGULAR);
        $loaisach = [];
        $dem = -1;
        foreach ($arrays as $ls) {
            $dem++;
            $loaisach[$dem]['maloai'] = $ls['maloai'];
            $loaisach[$dem]['sl'] = 0;
        }

        for ($i = 0; $i < count($loaisach); $i++) {
            foreach ($sach as $sachs) {
                if ($loaisach[$i]['maloai'] == $sachs->maloai) {
                    $loaisach[$i]['sl']++;
                }
            }
        }

        // ================== Đếm theo tác giả ==================
        $array = [];
        $array[0]['tacgia'] = $sach[0]->tacgia;
        $array[0]['sl'] = 0;
        $dem = 0;

        for ($i = 0; $i < 1; $i++) {
            foreach ($sach as $datas) {
                if ($array[$i]['tacgia'] != $datas->tacgia) {
                    $dem++;
                    $array[$dem]['tacgia'] = $datas->tacgia;
                    $array[$dem]['sl'] = 1;
                } else {
                    $array[$i]['sl']++;
                }
            }
        }

        $arrays = array_unique($array, SORT_REGULAR);
        $tacgia = [];
        $dem = -1;
        foreach ($arrays as $ls) {
            $dem++;
            $tacgia[$dem]['tacgia'] = $ls['tacgia'];
            $tacgia[$dem]['sl'] = 0;
        }

        for ($i = 0; $i < count($tacgia); $i++) {
            foreach ($sach as $sachs) {
                if ($tacgia[$i]['tacgia'] == $sachs->tacgia) {
                    $tacgia[$i]['sl']++;
                }
            }
        }

        // ================== Đếm theo nhà xuất bản ==================
        $array = [];
        $array[0]['nxb'] = $sach[0]->manhaxuatban;
        $array[0]['sl'] = 0;
        $dem = 0;

        for ($i = 0; $i < 1; $i++) {
            foreach ($sach as $datas) {
                if ($array[$i]['nxb'] != $datas->manhaxuatban) {
                    $dem++;
                    $array[$dem]['nxb'] = $datas->manhaxuatban;
                    $array[$dem]['sl'] = 1;
                } else {
                    $array[$i]['sl']++;
                }
            }
        }

        $arrays = array_unique($array, SORT_REGULAR);
        $nxbs = [];
        $dem = -1;
        foreach ($arrays as $nxb) {
            $dem++;
            $nxbs[$dem]['nxb'] = $nxb['nxb'];
            $nxbs[$dem]['sl'] = 0;
        }

        for ($i = 0; $i < count($nxbs); $i++) {
            foreach ($sach as $sach_nxb) {
                if ($nxbs[$i]['nxb'] == $sach_nxb->manhaxuatban) {
                    $nxbs[$i]['sl']++;
                }
            }
        }

        return view('page.sanpham.timkiem', compact('key', 'sach', 'loaisach', 'error', 'tacgia', 'nxbs','danhmuc'));
        // return $loaisach;
    }


}
