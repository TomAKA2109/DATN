@extends('admin.admin')
@section('khachhang')
    <li class="nav-item active">
        <a class="nav-link" href="">
            <i class="fas fa-fw fa-table"></i>
            <span>Quản lý khách hàng</span></a>
    </li>
@endsection()
@section('tenbang')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">khachhang</a>
        </li>
        <li class="breadcrumb-item active">Tables</li>
    </ol>
@endsection
@section('table')
    <div class="card mb-3">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Họ tên</th>
                            <th>UserName</th>
                            <th>PhoneNumber</th>
                            <th>Địa chỉ</th>
                            <th>Mail</th>
                            <th>Create_at</th>
                            <th>Update_at</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($khachhang as $kh)
                            <tr>
                                <td><label id="lblid">{{ $kh->id }}</label></td>
                                <td><label id="lblten">{{ $kh->ten }}</label></td>
                                <td><label id="lblusername">{{ $kh->username }}</td>
                                <td><label id="lblsdt">{{ $kh->sdt }}</td>
                                <td><label id="lbldiachi">{{ $kh->diachi }}</td>
                                <td><label id="lblmail">{{ $kh->mail }}</td>
                                <td>{{ $kh->created_at }}</td>
                                <td>{{ $kh->updated_at }}</td>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

