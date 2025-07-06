@extends('admin.admin')
@section('css')
    <style>
        .btn-custom {}

        .btn-custom button {
            background-image: none;
            box-shadow: none;
            border: none;
            border-radius: 9px !important;
            font-size: 11.844px !important;
            font-weight: bold;
            padding: 0px 9px;
        }
    </style>
@endsection
@section('donhang')
    <li class="nav-item active">
        <a class="nav-link" href="">
            <i class="fas fa-fw fa-table"></i>
            <span>Quản lý đơn hàng</span></a>
    </li>
@endsection()
@section('tenbang')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Đơn hàng</a>
        </li>
        <li class="breadcrumb-item active">Tables</li>
    </ol>
@endsection
@section('table')
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Quản lí chi tiết đơn hàng
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Họ tên</th>
                            <th>Email</th>
                            <th>Địa chỉ</th>
                            <th>Số điện thoại</th>
                            <th>Thanh toán</th>
                            <th>Tổng tiền</th>
                            <th>Ngày lập</th>
                            <th>Tình trạng</th>
                            <th>Chi tiết hóa đơn</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dondathang as $dondathangs)
                            <tr>
                                <td><label id="lblid" style="display: none;">{{ $dondathangs->id }}</label><label
                                        id="lblmakh">{{ $dondathangs->id_khachhang }}</label></td>
                                <td><label id="lbltenkh">{{ $dondathangs->hoten }}</td>
                                <td><label id="lblemail">{{ $dondathangs->email }}</td>
                                <td><label id="lbldiachi">{{ $dondathangs->diachi }}</td>
                                <td><label id="lblsdt">{{ $dondathangs->sodienthoai }}</td>
                                <td><label id="lblphuongthucthanhtoan">{{ $dondathangs->phuongthucthanhtoan }}</td>
                                <td><label id="lbltongtien">{{ number_format($dondathangs->tongtien, 0, '.', '.') }}</td>
                                <td>{{ $dondathangs->created_at }}</td>
                                <td>
                                    <div class="btn-toolbar btn-custom">
                                        @method('PUT')
                                        <div class="btn-group">
                                            @if ($dondathangs->trangthai == 0)
                                                <button class="btn btn-primary dropdown-toggle btn-mini"
                                                    data-toggle="dropdown">Chờ xác nhận <span
                                                        class="caret"></span></button>
                                            @elseif ($dondathangs->trangthai == 1)
                                                <button class="btn btn-warning dropdown-toggle btn-mini"
                                                    data-toggle="dropdown">Đang giao <span class="caret"></span></button>
                                            @elseif ($dondathangs->trangthai == 2)
                                                <button class="btn btn-success dropdown-toggle btn-mini"
                                                    data-toggle="dropdown">Giao thành công <span
                                                        class="caret"></span></button>
                                            @else
                                                <button class="btn btn-danger dropdown-toggle btn-mini"
                                                    data-toggle="dropdown">Đã hủy <span class="caret"></span></button>
                                            @endif
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="javascript:void(0)"
                                                    onClick="document.getElementById('don_{{ $dondathangs->id }}_trangthai_danggiao').submit()"><i
                                                        class="fa-solid fa-truck"></i> Đang giao</a>
                                                <form id="don_{{ $dondathangs->id }}_trangthai_danggiao"
                                                    action="{{ url('/admin/qldondathang/' . $dondathangs->id . '/trangthai/update') }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="trangthai" value="1" />
                                                </form>
                                                <a class="dropdown-item" href="javascript:void(0)"
                                                    onClick="document.getElementById('don_{{ $dondathangs->id }}_trangthai_dagiao').submit()"><i
                                                        class="fa-solid fa-check"></i> Giao hàng thành công </a>
                                                <form id="don_{{ $dondathangs->id }}_trangthai_dagiao"
                                                    action="{{ url('/admin/qldondathang/' . $dondathangs->id . '/trangthai/update') }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="trangthai" value="2" />
                                                </form>
                                                <a class="dropdown-item" href="javascript:void(0)"
                                                    onClick="document.getElementById('don_{{ $dondathangs->id }}_trangthai_dahuy').submit()"><i
                                                        class="fa-solid fa-xmark"></i> Hủy </a>
                                                <form id="don_{{ $dondathangs->id }}_trangthai_dahuy"
                                                    action="{{ url('/admin/qldondathang/' . $dondathangs->id . '/trangthai/update') }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="trangthai" value="3" />
                                                </form>
                                            </div>
                                        </div><!-- /btn-group -->
                                    </div>
                                </td>
                                <td style="text-align: center;">
                                    <a href="/admin/qldondathang/{{ $dondathangs->id }}"><i
                                            class="fa-solid fa-eye"></i>
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
    <div class="modal fade" id="update_sach">
        <div class="modal-dialog">
            <div class="modal-content">
                <div style="background-color: white;margin: auto;width: 700px;" id="editkh">
                    <button type="button" class="close mr-2" data-dismiss="modal"
                        onclick="CloseEditdatasDialog();">&times;</button>
                    <form action="{{ route('adminsdelete_donhang') }}" method="post" enctype="multipart/form-data"
                        id="update_form">
                        <table style="width:80%;margin:auto;" id="table_cthd">
                            {{ csrf_field() }}
                            <tr style="border:0;">
                                <td colspan="2" class="text-center font-weight-bold p-3">
                                    <h3>Sửa đơn hàng</h3>
                                </td>
                            </tr>
                        </table>
                        <div class="text-center">
                            <input type="submit" class="btn btn-success m-3" style="width: 100px;" value="Sửa">
                            <button class="btn btn-success m-3" style="width: 100px;" data-dismiss="modal"
                                onclick="CloseEditdatasDialog();">Hủy</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Xóa đơn hàng </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                        onclick="CloseEditdatasDialog();">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Bạn có chắc chắn muốn xóa đơn hàng này <label id="idhd" style="display: none;"></label> ?
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
