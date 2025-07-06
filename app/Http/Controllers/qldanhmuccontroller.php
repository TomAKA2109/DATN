<?php

namespace App\Http\Controllers;
use App\Models\danhmuc;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class qldanhmuccontroller extends Controller
{
    function qldanhmuc(){
        $danhmuc = danhmuc::all();
    	return View('admin.qldanhmuc', compact('danhmuc'));
    }

    public function qldanhmuc_insert(Request $req){
        if ($req->ajax()) {
            $validator = Validator::make($req->all(), [
                'tendanhmuc' => 'required',
                'anhdaidien' => 'required|image|mimes:jpg,jpeg,png|max:100000',
                'thutu' => 'required'
            ]);
            if ($validator->fails()) {
                return response()->json(['success'=>false, 'errors' => $validator->errors()], 422);
            }

            $imageName = "default.jpg";
            if ($req->hasFile('anhdaidien')) {
                $image = $req->file('anhdaidien');
                $imageName = $image->hashName();
                try {
                    Storage::disk('category')->putFileAs('', $image, $imageName);
                } catch (\Exception $e) {
                    return $e->getMessage();
                }
            }
            $requestInput = $req->input();
            $data = array_merge($requestInput, ['anhdaidien' => $imageName, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
            danhmuc::insert($data);

            return response()->json([
                'success'   => 'add Successfully'
            ]);
        }
    }

    function qldanhmuc_update(Request $req){
    	$id=$req->ud_id;
    	$_danhmuc=danhmuc::find($id);
    	$_danhmuc->tendanhmuc=$req->ud_tendanhmuc;
        $_danhmuc->thutu=$req->ud_thutu;
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

