<?php

namespace App\Http\Controllers;
use App\Models\danhmuc;
use Illuminate\Http\Request;

class qldanhmuccontroller extends Controller
{
    function qldanhmuc(){
        $danhmuc = danhmuc::all();
    	return View('admin.qldanhmuc', compact('danhmuc'));
    }
    function qldanhmuc_insert(Request $req){
    	$_danhmuc=new danhmuc();
    	$image = $req->file('is_files');
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move('public/image', $new_name);
        $_danhmuc->tendanhmuc=$req->is_tendanhmuc;
        $_danhmuc->thutu=$req->is_thutu;
        $_danhmuc->anhdaidien= $new_name;
        $_danhmuc->save();
    	return response()->json([
       'success'   => 'add Successfully'   
      ]);
    }
    function qldanhmuc_update(Request $req){
    	$id=$req->ud_id;
    	$_danhmuc=danhmuc::find($id);
    	$_danhmuc->tendanhmuc=$req->ud_tendanhmuc;
        $_danhmuc->thutu=$req->ud_thutu;
        //$_danhmuc->anhdaidien= $new_name;
        $_danhmuc->save();
    	return response()->json([
       'success'   => 'update Successfully'   
      ]);
    }
    function qldanhmuc_delete(Request $req){
        $id=$req->id;
        $_danhmuc=danhmuc::where('id',$id)->delete();
        return response()->json([
       'success'   => 'Delete Successfully' ,
      ]);
    }
}

