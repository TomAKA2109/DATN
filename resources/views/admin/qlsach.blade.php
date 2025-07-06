@extends('admin.admin')
@section('sach')
    <li class="nav-item active">
        <a class="nav-link" href="">
            <i class="fas fa-fw fa-table"></i>
            <span>Quản lý sách</span></a>
    </li>
@endsection()
@section('tenbang')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Sách</a>
        </li>
        <li class="breadcrumb-item active">Quản lý sách</li>
    </ol>
@endsection
@section('table')
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Quản lý sách
            <a> <button class="btn btn-primary" id="btnadd" data-target="#insertmodal" data-toggle="modal">Thêm
                    mới</button>
        </div>
        <div class="card-body"></a>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Loại sách</th>
                            <th>Nhà xuất bản</th>
                            <th>Tên sách</th>
                            <th>Tác giả</th>
                            <th>Số lượng</th>
                            <th>Đơn giá</th>
                            <th>Lượt xem</th>
                            <th>Lượt mua</th>
                            <th>Khuyến mãi</th>
                            <th>Ảnh bìa</th>
                            <th>Tập </th>
                            <th>Số tập</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($_sach as $sach)
                            <tr>
                                <td><label id="lblid" style="display: none;">{{ $sach->id }}</label><label
                                        id="lblmaloai">{{ $sach->tenloai }}</label></td>
                                <td><label id="lblmanxb">{{ $sach->tennhaxuatban }}</td>
                                <td><label id="lbltensach">{{ $sach->tensach }}</td>
                                <td><label id="lbltacgia">{{ $sach->tacgia }}</td>
                                <td><label id="lblsoluong">{{ $sach->soluong }}</td>
                                <td><label id="lbldongia">{{ number_format($sach->dongia, 0, ',', '.') }}</td>
                                <td><label id="lblluotxem">{{ $sach->luotxem }}</td>
                                <td><label id="lblluotmua">{{ $sach->luotmua }}</td>
                                <td><label id="lblkhuyenmai">{{ $sach->khuyenmai }}</td>
                                <td><img src="{{ Storage::disk('book')->url($sach->anhbia) }}" alt=""id="lblanhbia"
                                        style="width: 120px;"></td>
                                <td><label id="lbltap">{{ $sach->tap }}</td>
                                <td><label id="lblsotap">{{ $sach->sotap }}</td>
                                <td>
                                    <img src="{{ asset('/image/delete.png') }}" onclick="deleteclk(this);"
                                        data-toggle="modal" data-target="#exampleModalCenter">
                                    <img src="{{ asset('/image/edit.png') }}" onclick="Editdatas(this);"data-toggle="modal"
                                        data-target="#update_sach">
                                </td>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endsection
    @section('model')
        {{-- Create --}}
        <div class="modal fade" id="insertmodal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div style="background-color: white">
                        <button type="button" class="close mr-2" data-dismiss="modal">&times;</button>
                        <form action="{{ route('adminsqlsach/insert') }}" method="post" enctype="multipart/form-data"
                            id="upload_form">
                            <table style="width: 100%;">
                                <tr>
                                    <td colspan="2" class="text-center font-weight-bold p-3">
                                        <h3>Thêm sản phẩm</h3>
                                    </td>
                                </tr>
                                @include('admin.qlsach._form')
                            </table>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success m-3" value="Thêm" style="width: 100px;">Thêm
                                    mới</button>
                                <button class="btn btn-default m-3" style="width: 100px;" data-dismiss="modal">Hủy</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- Update --}}
        <div class="modal fade" id="update_sach">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div style="background-color: white">
                        <button type="button" class="close mr-2" data-dismiss="modal">&times;</button>
                        <form action="{{ url('/qlsach/update') }}" method="post" enctype="multipart/form-data" id="update_form">
                            <input type="hidden" name="id" />
                            <table style="width: 100%;">
                                <tr>
                                    <td colspan="2" class="text-center font-weight-bold p-3">
                                        <h3>Sửa thông tin sách</h3>
                                    </td>
                                </tr>
                                @include('admin.qlsach._update')
                            </table>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success m-3" value="Thêm" style="width: 100px;">Cập nhật</button>
                                <button class="btn btn-default m-3" style="width: 100px;" data-dismiss="modal">Hủy</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

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
    @section('javascript')
        <script>
            var row;
            var id, loaisach, nhaxuatban, tensach, soluong, dongia, luotxem, luotmua, khuyenmai, tap, sotap, anhbia, files;
            $(document).ready(function() {
                $('#upload_form').on('submit', function(event) {
                    event.preventDefault();
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "{{ route('adminsqlsach/insert') }}",
                        method: "POST",
                        data: new FormData(this),
                        dataType: 'JSON',
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {
                            location.reload();
                        },
                        error: function(err) {
                            const resp = JSON.parse(err.responseText);
                            const errors = resp.errors;
                            for (const error in errors) {
                                $(`input[name='${error}']`).addClass('is-invalid')
                                $(`.${error}.invalid-feedback`).text(errors[error][0])
                            }
                        }
                    })
                });
            });

// Update
            $(document).ready(function() {
                $('#update_form').on('submit', function(event) {
                    event.preventDefault();
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "{{ url('admin/qlsach/update') }}",
                        method: "POST",
                        data: new FormData(this),
                        dataType: 'JSON',
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {
                            alert(data.ok);
                            $("#lblmaloai", row).text($("#udloaisach option:selected").text());
                            $("#lbltensach", row).text($("#txttensach").val());
                            $("#lbltacgia", row).text($("#txttacgia").val());
                            $("#lblsoluong", row).text($("#txtsoluong").val());
                            $("#lbldongia", row).text($("#txtdongia").val());
                            $("#lblluotxem", row).text($("#txtluotxem").val());
                            $("#lblluotmua", row).text($("#txtluotmua").val());
                            $("#lblkhuyenmai", row).text($("#txtkhuyenmai").val());
                            row.removeClass("highlightRow");
                            CloseEditdatasDialog();
                            //location.assign('{{ url('admin/qlsach') }}');
                            location.reload();
                        }
                    });
                });
            });

            function deletedatas(editButton) {
                id = $("#idsach").text();
                var url = "{{ route('adminsqlsach/delete') }}";
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
                            row.removeClass("highlightRow");
                        }
                    }
                });
                // return false;
            }

            function Editdatas(editButton) {
                row = $(editButton).parent().parent();
                id = $("#lblid", row).text();
                loaisach = $("#lblmaloai", row).text();
                nhaxuatban = $("#lblmanxb", row).text();
                tensach = $("#lbltensach", row).text();
                tacgia = $("#lbltacgia", row).text();
                soluong = $("#lblsoluong", row).text();
                dongia = $("#lbldongia", row).text();
                luotxem = $("#lblluotxem", row).text();
                luotmua = $("#lblluotmua", row).text();
                khuyenmai = $("#lblkhuyenmai", row).text();
                tap = $("#lbltap", row).text();
                sotap = $("#lblsotap", row).text();
                anhbia = $("#lblanhbia", row).attr('src');
                row.addClass("highlightRow");

                $("#update_sach input[name='id']").val(id);
                $('#udloaisach > option').each(function() {
                    if ($(this).text() == loaisach) $(this).parent('select').val($(this).val());
                });
                $('#udnhaxuatban > option').each(function() {
                    if ($(this).text() == nhaxuatban) $(this).parent('select').val($(this).val());
                });
                $("#update_sach input[name='tensach']").val(tensach);
                $("#update_sach input[name='tacgia']").val(tacgia);
                $("#update_sach input[name='soluong']").val(soluong);
                $("#update_sach input[name='dongia']").val(dongia.replace('.', ''));
                $("#update_sach input[name='khuyenmai']").val(khuyenmai);
                $("#update_sach input[name='tap']").val(tap);
                $("#update_sach input[name='sotap']").val(sotap);
                $("#update_sach img").attr('src', anhbia);
                $("#update_sach input[name='anhbia']").attr('value', anhbia.split('/')[5]);

                return false;
            }

            function deleteclk(editButton) {
                row = $(editButton).parent().parent();
                id = $("#lblid", row).text();
                $("#idsach").text(id);
                row.addClass("highlightRow");
                return false;
            }

            function CloseEditdatasDialog() {
                $("#updatemodel").hide();
                row.removeClass("highlightRow");
            }
        </script>
    @endsection
