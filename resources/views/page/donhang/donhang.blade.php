@extends('index.index')

@section('header')
    @include('page.header')
    @include('page.mainmenu')
@endsection

@section('content')
<div class="container mt-5">
    <div class="row">

        {{-- Nội dung chính --}}
        <div class="col-md-10">
            <h3 class="mb-4">Đơn hàng của tôi</h3>

            <table class="table table-bordered w-100">
                <thead class="thead-light">
                    <tr>
                        <th>STT</th>
                        <th>Mã Đơn Hàng</th>
                        <th>Người đặt</th>
                        <th>Số điện thoại</th>
                        <th>Tổng cộng</th>
                        <th>Trạng thái</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($donhangs as $index => $donhang)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $donhang->id }}</td>
                            <td>{{ $donhang->hoten }}</td>
                            <td>{{ $donhang->sodienthoai }}</td>
                            <td>{{ number_format($donhang->tongtien, 0, ',', '.') }}₫</td>
                            <td>
                                @if ($donhang->trangthai == 0)
                                    <span class="badge badge-warning">Chờ xác nhận</span>
                                @elseif ($donhang->trangthai == 1)
                                    <span class="badge badge-info">Đang giao</span>
                                @elseif ($donhang->trangthai == 2)
                                    <span class="badge badge-success">Hoàn tất</span>
                                @else
                                    <span class="badge badge-secondary">Hủy</span>
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