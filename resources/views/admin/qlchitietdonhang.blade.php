@extends('admin.admin')
@section('css')
    @parent
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
            <a href="{{ url('/admin/qldondathang') }}">Đơn hàng</a>
        </li>
    </ol>
@endsection
@section('table')
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Quản lí chi tiết đơn hàng
        </div>
        <div class="card-body">
            {{-- Ghi chú --}}
            <p><strong>Ghi chú: </strong>{{ $order->ghichu }}</p>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Mã đơn hàng</th>
                            <th>Ảnh</th>
                            <th>Tên sách</th>
                            <th>Số lượng</th>
                            <th>Đơn giá</th>
                            <th>Ngày tạo</th>
                            <th>Ngày sửa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($chitietdondathang as $chitietdondathang)
                            <tr>
                                <td>{{ $chitietdondathang->id_dondathang }}</td>
                                <td><img width="100" height="150" src="{{ Storage::disk('book')->url($chitietdondathang->sach->anhbia) }}" /></td>
                                <td>{{ $chitietdondathang->sach->tensach }}</td>
                                <td>{{ $chitietdondathang->soluong }}</td>
                                <td>{{ number_format($chitietdondathang->dongia, 0, ',', '.') }}</td>
                                <td>{{ Carbon\Carbon::parse($chitietdondathang->created_at)->format('d/m/Y H:i:s') }}</td>
                                <td>{{ Carbon\Carbon::parse($chitietdondathang->updated_at)->format('d/m/Y H:i:s') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

