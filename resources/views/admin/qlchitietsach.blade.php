@extends('admin.admin')

@section('chitietsach')
    <li class="nav-item active">
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
            <a href="{{ route('adminsqlchitietsach/insert') }}"> <button type="button" class="btn btn-primary"
                    id="btnadd">Thêm mới</button>
        </div>
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
                        @foreach ($sachs as $sach)
                            <tr>
                                @php
                                    $chiTietSach = $sach->chitietsach;
                                @endphp
                                <td>
                                    <label id="lblid" style="display: none;"></label><label
                                        id="lbltensach">{{ $sach->tensach }}</label>
                                </td>
                                <td>
                                    <label id="lblngonngu">{{ $chiTietSach ? $chiTietSach->ngonngu->ten : '' }}</label>
                                </td>

                                <!-- Note: Những gì liên quan đến chi tiết sách mà mã sách (chi tiết sách) ko có trong id của sách thì ghi như dòng 51 -->
                                <td><label id="lblsotrang">{{ $chiTietSach ? $chiTietSach->sotrang : '' }}</td>
                                <td><label id="lblnamxuatban">{{ $chiTietSach ? $chiTietSach->namxuatban : '' }}</td>
                                @php
                                    $noidung = $chiTietSach ? $chiTietSach->noidung : '';
                                @endphp
                                <td><label id="lblnoidung">{!! strlen($noidung) > 200 ? substr($noidung, 0, 200) . '...' : $noidung !!}</td>
                                <td><label id="lblkichthuoc">{{ $chiTietSach ? $chiTietSach->kichthuoc : '' }}</td>
                                <td><label id="lbltrongluong">{{ $chiTietSach ? $chiTietSach->trongluong : '' }}</td>
                                <td><label id="lbllngayphathanh">{{ $chiTietSach ? $chiTietSach->ngayphathanh : '' }}</td>
                                <td>
                                    <img src="{{ asset('/image/delete.png') }}" onclick="deleteclk(this);" data-toggle="modal" data-target="#exampleModalCenter">
                                    <a href="{{ url('/admin/qlchitietsach/'.$chiTietSach->masach.'/edit') }}"><img src="{{ asset('/image/edit.png') }}" data-toggle="modal"/></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('model')
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Xóa Sản phẩm </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                        onclick="CloseEditdatasDialog();">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Bạn có chắc chắn muốn xóa sản phẩm này <label id="idsach" style="display: none;"></label> ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="deletedatas(this);">Xóa</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal"
                        onclick="CloseEditdatasDialog();">Hủy</button>
                </div>
            </div>
        </div>
    </div>
@endsection
