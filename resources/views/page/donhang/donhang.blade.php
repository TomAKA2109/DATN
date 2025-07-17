@extends('index.index')

@section('header')
    @include('page.header')
    @include('page.mainmenu')
@endsection

@section('title')
    Đơn hàng của tôi
@endsection

@section('content')
@php
        use Carbon\Carbon;
@endphp
<div class="container mt-5">
    <div class="row">

        {{-- Nội dung chính --}}
        <div class="col-md-12">
            <h3 class="mb-4">Đơn hàng của tôi</h3>

            <table class="table table-bordered w-100">
                <thead class="thead-light">
                    <tr>
                        <th>STT</th>
                        <th>Mã Đơn Hàng</th>
                        <th>Người đặt</th>
                        <th>Ngày đặt</th>
                        <th>Tổng cộng</th>
                        <th>Trạng thái</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($donhangs as $index => $donhang)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $donhang->id }}</td>
                            <td>{{ $donhang->hoten }}</td>
                            <td>{{ Carbon::parse($donhang->created_at)->format('d/m/Y H:i:s') }}</td>
                            <td>{{ number_format($donhang->tongtien, 0, ',', '.') }}₫</td>
                            <td>
                                @if ($donhang->trangthai == 0)
                                    <span class="badge badge-warning">Đã xác nhận</span>
                                @elseif ($donhang->trangthai == 1)
                                    <span class="badge badge-info">Đang giao</span>
                                @elseif ($donhang->trangthai == 2)
                                    <span class="badge badge-success">Hoàn tất</span>
                                @elseif ($donhang->trangthai == 3)
                                    <span class="badge badge-secondary">Hủy</span>
                                @endif
                            </td>
                            <td>
                                @if($donhang->trangthai == 0 || $donhang->trangthai == 1)
                                    <button class="btn btn-danger" onclick="document.getElementById('donhang-{{ $donhang->id }}').submit()">Hủy</button>
                                    <form id="donhang-{{ $donhang->id }}" action="{{ url('qldondathang/'.$donhang->id.'/trangthai/update') }}" method="POST">
                                        @method('PUT')
                                        <input type="hidden" name="trangthai" value="3"/>
                                        @csrf
                                    </form
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('footer')
    @include('page.footer')

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#donhangTable').DataTable({
                language: {
                    emptyTable: "Không có đơn hàng nào",
                    search: "Tìm kiếm:",
                    lengthMenu: "Hiển thị _MENU_ dòng",
                    info: "Hiển thị _START_ đến _END_ trong _TOTAL_ dòng",
                    paginate: {
                        first: "Đầu",
                        last: "Cuối",
                        next: "→",
                        previous: "←"
                    }
                }
            });
        });
    </script>
@endsection
