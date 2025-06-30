@extends('admin.admin')

@section('chitietsach')
	<li class="nav-item active" >
          <a class="nav-link" href="">
            <i class="fas fa-fw fa-table"></i>
            <span>Quản lý chi tiết sách</span></a>

    </li>
@endsection()
@section('tenbang')
	<ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Sách</a>
            </li>
            <li class="breadcrumb-item active">Tables</li>
	</ol>
@endsection
@section('table')
<div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Chi tiết sách
              <a href="{{ route('adminsqlchitietsach/insert') }}"> <button type="button" class="btn btn-success" id="btnadd">Thêm mới</button></div>
                <div class="card-body"></a>
                <div class="table-responsive">
	            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Tên sách</th>
                      <th>Ngôn ngữ</th>
                      <th>Số trang</th>
                      <th>Năm xuất bản</th>
                      <th>Mô tả</th>
                      <th>Kích thước</th>
                      <th>Trọng lượng</th>
                      <th>Ngày phát hành</th>
                       <th>Edit</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($sachs as $sach)
                        <tr>
                        <td>
                            <label id="lblid" style="display: none;"></label><label id="lbltensach">{{ $sach->tensach }}</label>
                        </td>
                        <td>
                            <label id="lblngonngu"></label>
                        </td>
                        @php
                        $chitietsach = $sach->chitietsach
                        @endphp
                        <!-- Note: Những gì liên quan đến chi tiết sách mà mã sách (chi tiết sách) ko có trong id của sách thì ghi như dòng 51 -->
                        <td><label id="lblsotrang">{{ $chitietsach ? $chitietsach->sotrang : '' }}</td>
                        <td><label id="lblnamxuatban">{{ $sach->chitietsach->namxuatban }}</td>
                        @php
                            $noidung = $sach->chitietsach->noidung
                        @endphp 
                        <td><label id="lblnoidung">{!! strlen($noidung) > 200 ? substr($noidung, 0, 200) . "..." : $noidung  !!}</td>
                        <td><label id="lblkichthuoc">{{ $sach->chitietsach->kichthuoc }}</td>
                        <td><label id="lbltrongluong">{{ $sach->chitietsach->trongluong }}</td>
                        <td><label id="lbllngayphathanh">{{ $sach->chitietsach->ngayphathanh }}</td>
                        <td>
                            <img src="{{ asset('/image/delete.png') }}" onclick="deleteclk(this);" data-toggle="modal" data-target="#exampleModalCenter">
                            <img src="{{ asset('/image/edit.png') }}" onclick="Editdatas(this);"data-toggle="modal" data-target="#update_sach_{{ $sach->id }}">

                            <!-- Modal edit -->
                            <div class="modal fade" id="update_sach_{{ $sach->id }}">
                                <div class="modal-dialog">
                                    <div class="modal-content" >
                                    <div style="background-color: white;margin: auto;width: 700px;" id="editkh">
                                        <button type="button" class="close mr-2" data-dismiss="modal" onclick="CloseEditdatasDialog();">&times;</button>
                                        <form action="{{ url('/admin/qlchitietsach/edit/post', ['id' => $sach->id]) }}" method="post" enctype="multipart/form-data" id="update_form">
                                        <table style="width:100%;">
                                        {{ csrf_field() }}
                                        <tr>
                                            <td colspan="2" class="text-center font-weight-bold p-3"><h3>Edit sách</h3></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-group pl-3 pr-3">
                                                    <label>Loại sách:</labe>
                                                    <select name="ud_loaisach" id="udloaisach" class="form-control" style="width: 200px;">
                                                    @foreach($_loaisach as $loaisach)
                                                        <option value="{{ $loaisach->id }}" id="loaisach" {{ $sach->maloai == $loaisach->id ? 'selected' : '' }}>{{ $loaisach->tenloai }}</option>
                                                    @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                                <td>
                                                    <div class="form-group pl-3 pr-3">
                                                        <label>Nhà xuất bản:</labe>
                                                        <select name="ud_nxb" id="udnhaxuatban" class="form-control" style="width: 200px;">
                                                            @foreach($_nhaxuatban as $nhaxuatban)
                                                                <option value="{{ $nhaxuatban->id }}" {{ $sach->manhaxuatban == $nhaxuatban->id ? 'selected' : ''}}>{{ $nhaxuatban->tennhaxuatban }}</option>
                                                            @endforeach
                                                        </select>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <div class="form-group pl-3 pr-3">
                                                            <label>Tên sách:</label>
                                                            <input type="text" class="form-control" name="ud_tensach" id="txttensach" value="{{ $sach->tensach }}" />
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-group pl-3 pr-3">
                                                            <label>Tác giả:</label>
                                                            <input type="text" class="form-control" name="ud_tacgia" id="txttacgia"  value="{{ $sach->tacgia }}"/>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group pl-3 pr-3">
                                                            <label>Số lượng:</label>
                                                            <input type="text" class="form-control" name="ud_soluong" id="txtsoluong" value="{{ $sach->soluong }}"/>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group pl-3 pr-3">
                                                            <label>Đơn giá:</label>
                                                            <input type="number" class="form-control" name="ud_dongia" id="txtdongia" min="0" value="{{ $sach->dongia }}" /> 
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                <td>
                                                    <div class="form-group pl-3 pr-3">
                                                            <label>Ảnh bìa:</label>
                                                            <input type="file" id="upfiles" name="up_file" class="form-control">
                                                        </div>
                                                </td>
                                                <td>
                                                    <img src="" alt="" id="ud_anhbia" name="ud_anhbia" style="padding-left:50px;height: 120px;">
                                                </td>
                                                </tr>
                                                
                                                <tr>
                                                    <td>
                                                        <div class="form-group pl-3 pr-3">
                                                            <label>Tập:</label>
                                                            <input type="number" class="form-control" name="ud_tap" id="txttap" min="0" value="{{ $sach->tap }}">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group pl-3 pr-3">
                                                            <label>Số tập:</label>
                                                            <input type="number" class="form-control" name="ud_sotap" id="txtsotap" min="0" value="{{ $sach->sotap }}">
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="text-center">
                                                <input type="submit" class="btn btn-success m-3" style="width: 100px;" value="Sửa">
                                                <button class="btn btn-default" style="width: 100px;" data-dismiss="modal" onclick="CloseEditdatasDialog();">Hủy</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        </tr>
                      @endforeach
                    </tbody>
                </table>
                </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
          </div>
@endsection
@section('model')
  <div class="modal fade" id="insertmodal">
        <div class="modal-dialog"  style="width: 700px;">
            <div class="modal-content"  style="width: 700px;">
                <div style="background-color: white;width: 700px;">
                    <button type="button" class="close mr-2" data-dismiss="modal">&times;</button>
                    <form action="" method="post" enctype="multipart/form-data" id="upload_form">
                        <table style="width: 100%;">
                        {{ csrf_field() }}
                        <tr>
                            <td colspan="2" class="text-center font-weight-bold p-3">
                                <h3>Thêm sản phẩm</h3>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group pl-3 pr-3">
                                  <label>Tên sách:</labe>
                                   <input type="text" name="tensach" value="" />
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group pl-3 pr-3" >
                                    <label>Ngôn ngữ:</label>
                                    <input type="text" class="form-control" name="ngonngu" id="is_ngonngu" placeholder="ngôn ngữ" />
                                </div>
                            </td>
                            <td>
                                <div class="form-group pl-3 pr-3">
                                    <label>Kích thước:</label>
                                    <input type="text" class="form-control" name="kichthuoc" id="is_kichthuoc" placeholder="Kích thước" />
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group pl-3 pr-3">
                                    <label>Số trang:</label>
                                    <input type="text" class="form-control" name="sotrang" id="is_sotrang" placeholder="Số trang" />
                                </div>
                            </td>
                            <td>
                                <div class="form-group pl-3 pr-3">
                                    <label>Năm xuất bản:</label>
                                    <input type="text" class="form-control" name="namxuatban" id="is_namxuatban" placeholder="Năm xuất bản" />
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td >
                                <div class="form-group pl-3 pr-3">
                                    <label>Trọng lượng:</label>
                                    <input type="text" class="form-control" name="trongluong" id="is_trongluong" placeholder="Trọng lượng">
                                </div>
                            </td>
                            <td>
                                <div class="form-group pl-3 pr-3" >
                                    <label>Ngày phát hành:</label>
                                    <input type="text" class="form-control" name="ngayphathanh" id="is_ngayphathanh"  placeholder="Ngày phát hành">
                                </div>
                            </td>
                        </tr>
                        <tr>
                         <td>
                                <div class="form-group pl-3 pr-3">
                                    <label>Mô tả:</label>
                                    <textarea rows="4" cols="50">
                                      
                                    </textarea>
                                    {{-- <input type="text" class="form-control" name="noidung" id="is_noidung" placeholder="Nội dung" />  --}}
                                </div>
                            </td>
                        </tr>

                    </table> 
                    <div class="text-center">
                        <input type="submit" class="btn btn-success m-3" value="Thêm" style="width: 100px;" id="them"><button class="btn btn-success m-3" style="width: 100px;" data-dismiss="modal">Hủy</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </div> 
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Xóa Sản phẩm </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="CloseEditdatasDialog();">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Bạn có chắc chắn muốn xóa sản phẩm này <label id="idsach" style="display: none;"></label> ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" onclick="deletedatas(this);" >Xóa</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="CloseEditdatasDialog();">Hủy</button>
      </div>
    </div>
    </div>
  </div>
@endsection
