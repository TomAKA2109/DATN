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
            <a href="{{ route('adminsqldondathang') }}">Đơn hàng</a>
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
                            <th>Mã đơn hàng</th>
                            <th>Ảnh</th>
                            <th>Tên sách</th>
                            <th>Số lượng</th>
                            <th>Đơn giá</th>
                            <th>Ngày tạo</th>
                            <th>Ngày sửa</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($chitietdondathang as $chitietdondathang)
                            <tr>
                                <td><label id="lblid" class="d-none">{{ $chitietdondathang->id }}</label>{{ $chitietdondathang->id_dondathang }}</td>
                                <td><img src="{{  }}" /></td>
                                <td>
                                    @foreach ($sach as $sach_ctdh)
                                        @if ($sach_ctdh->id == $chitietdondathang->id_sach)
                                            {{ $sach_ctdh->tensach }}
                                        @endif
                                    @endforeach
                                </td>
                                <td>{{ $chitietdondathang->soluong }}</td>
                                <td>{{ number_format($chitietdondathang->dongia, 0, ',', '.') }}</td>
                                <td>{{ $chitietdondathang->created_at }}</td>
                                <td>{{ $chitietdondathang->updated_at }}</td>
                                <td style="text-align: center;">
                                    <img src="{{ url('/image/delete.png') }}" onclick="deleteclk(this);" data-toggle="modal"
                                        data-target="#exampleModalCenter">
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
    <div class="modal fade" id="update_ctdh">
        <div class="modal-dialog">
            <div class="modal-content">
                <div style="background-color: white;margin: auto;width: 700px;" id="editkh">
                    <button type="button" class="close mr-2" data-dismiss="modal"
                        onclick="CloseEditdatasDialog();">&times;</button>
                    <form action="" method="post" enctype="multipart/form-data" id="update_form">
                        <table style="width:80%;margin:auto;" id="table_cthd">
                            {{ csrf_field() }}
                            <tr style="border:0;">
                                <td colspan="2" class="text-center font-weight-bold p-3">
                                    <h3>Danh sách chi tiết hóa đơn</h3>
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
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Xóa chi tiết đơn hàng </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                        onclick="CloseEditdatasDialog();">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Bạn có chắc chắn muốn xóa chi tiết đơn hàng này <label id="idctdh" style="display: none;"></label> ?
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
@section('javascript')
    <script>
        var row;
        var id;

        function deletedatas(editButton) {
            id = $("#idctdh").text();
            var url = "";
            $.ajax({
                type: "POST",
                url: url,
                cache: false,
                data: {
                    _token: '{{ csrf_token() }}',
                    type: 3,
                    id: id,
                },
                success: function(data) {
                    if (data.success) {
                        alert(data.success);
                        $('#exampleModalCenter').modal('hide');
                        row.removeClass("highlightRow");
                        $(row).remove();
                    } else {
                        alert('There is some error during delete');
                        $('#exampleModalCenter').modal('hide');
                        row.removeClass("highlightRow");
                    }
                }
            });
            // return false;
        }

        function deleteclk(editButton) {
            row = $(editButton).parent().parent();
            id = $("#lblid", row).text();
            $("#idctdh").text(id);
            row.addClass("highlightRow");
            return false;
        }

        function CloseEditdatasDialog() {
            $("#updatemodel").hide();
            row.removeClass("highlightRow");
        }
    </script>
@endsection
