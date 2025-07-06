@extends('admin.admin')

@section('sach')
<li class="nav-item active">
    <a class="nav-link" href="">
        <i class="fas fa-fw fa-table"></i>
        <span>Quản lý sách</span>
    </a>
</li>
@endsection

@section('tenbang')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="http://127.0.0.1:8000/admin/qlsach">Sách</a></li>
    <li class="breadcrumb-item active">Quản lý sách</li>
</ol>
@endsection

@section('table')
<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-table"></i>
        Quản lý sách
        <a> <button class="btn btn-primary" id="btnadd" data-target="#insertmodal" data-toggle="modal">Thêm mới</button></div>
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
                @foreach($_sach as $sach)
                    <tr>
                    <td><label id="lblid" style="display: none;">{{ $sach->id }}</label><label id="lblmaloai">{{ $sach->tenloai }}</label></td>
                    <td><label id="lblmanxb">{{ $sach->tennhaxuatban }}</td>
                    <td><label id="lbltensach">{{ $sach->tensach }}</td>
                    <td><label id="lbltacgia">{{ $sach->tacgia }}</td>
                    <td><label id="lblsoluong">{{ $sach->soluong }}</td>
                    <td><label id="lbldongia">{{ number_format($sach->dongia,0,",",".") }}</td>
                    <td><label id="lblluotxem">{{ $sach->luotxem }}</td>
                    <td><label id="lblluotmua">{{ $sach->luotmua }}</td>
                    <td><label id="lblkhuyenmai">{{ $sach->khuyenmai }}</td>
                    <td><img src="{{ Storage::disk('book')->url($sach->anhbia) }}" alt=""id="lblanhbia" style="width: 120px;"></td>
                    <td><label id="lbltap">{{ $sach->tap }}</td>
                    <td><label id="lblsotap">{{ $sach->sotap }}</td>

                    <td>
                        <img src="{{ asset('/image/delete.png') }}" onclick="deleteclk(this);" data-toggle="modal" data-target="#exampleModalCenter">
                        <img src="{{ asset('/image/edit.png') }}" onclick="Editdatas(this);"data-toggle="modal" data-target="#update_sach">
                    </td>
                    </tr\>
                @endforeach
                </tbody>
            </table>
            </div>
        </div>
@endsection

@section('model')
	<div class="modal fade" id="insertmodal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div style="background-color: white">
                    <button type="button" class="close mr-2" data-dismiss="modal">&times;</button>
                    <form action="{{ route('adminsqlsach/insert')}}" method="post" enctype="multipart/form-data" id="upload_form">
                        @include("admin.qlsach._form")
                        <div class="text-center">
                            <button type="submit" class="btn btn-success m-3" value="Thêm" style="width: 100px;">Thêm mới</button>
                            <button class="btn btn-default m-3" style="width: 100px;" data-dismiss="modal">Hủy</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Thêm</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Book Modal -->
<div class="modal fade" id="editModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Sửa sách</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="{{ route('adminsqlsach/update') }}" method="post" enctype="multipart/form-data" id="editForm">
                <div class="modal-body">
                    @csrf
                    <input type="hidden" name="ud_masach" id="editId">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Loại sách:</label>
                                <select name="ud_loaisach" id="editLoaiSach" class="form-control" required>
                                    @foreach($_loaisach as $loaisach)
                                    <option value="{{ $loaisach->id }}">{{ $loaisach->tenloai }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nhà xuất bản:</label>
                                <select name="ud_nxb" id="editNXB" class="form-control" required>
                                    @foreach($_nhaxuatban as $nhaxuatban)
                                    <option value="{{ $nhaxuatban->id }}">{{ $nhaxuatban->tennhaxuatban }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Tên sách:</label>
                        <input type="text" class="form-control" name="ud_tensach" id="editTenSach" required>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tác giả:</label>
                                <input type="text" class="form-control" name="ud_tacgia" id="editTacGia" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Số lượng:</label>
                                <input type="number" class="form-control" name="ud_soluong" id="editSoLuong" min="0" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Đơn giá:</label>
                                <input type="number" class="form-control" name="ud_dongia" id="editDonGia" min="0" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Khuyến mãi (%):</label>
                                <input type="number" class="form-control" name="ud_khuyenmai" id="editKhuyenMai" min="0" max="100">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tập:</label>
                                <input type="number" class="form-control" name="ud_tap" id="editTap" min="0">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Số tập:</label>
                                <input type="number" class="form-control" name="ud_sotap" id="editSoTap" min="0">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Ảnh bìa:</label>
                                <input type="file" name="up_file" class="form-control" accept="image/*">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <img id="editAnhBia" src="" alt="Current image" style="max-height: 120px;">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Sửa</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Xóa Sản phẩm</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                Bạn có chắc chắn muốn xóa sản phẩm này?
                <input type="hidden" id="deleteId">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" onclick="confirmDelete()">Xóa</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
            </div>
        </div>
    </div>
    <div class="modal fade" id="update_sach">
        <div class="modal-dialog">
            <div class="modal-content" >
            <div style="background-color: white;margin: auto" id="editkh">
            <button type="button" class="close mr-2" data-dismiss="modal" onclick="CloseEditdatasDialog();">&times;</button>
                <form action="{{ route('adminsqlsach/update')}}" method="post" enctype="multipart/form-data" id="update_form">
                    @include("admin.qlsach._form")
                    <div class="text-center">
                        <button type="submit" class="btn btn-success m-3" value="Thêm" style="width: 100px;">Cập nhật</button>
                        <button class="btn btn-default m-3" style="width: 100px;" data-dismiss="modal">Hủy</button>
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

@section('javascript')
<script>
      var row;
      var id,loaisach,nhaxuatban,tensach,soluong,dongia,luotxem,luotmua,khuyenmai,tap,sotap,anhbia,files;
        $(document).ready(function(){
        $('#upload_form').on('submit', function(event){
            event.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url:"{{ route('adminsqlsach/insert')}}",
                method:"POST",
                data:new FormData(this),
                dataType:'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success:function(data) {
                    location.reload();
                },
                error: function (err) {
                    const resp = JSON.parse(err.responseText);
                    const errors = resp.errors;
                    for (const error in errors) {
                        $(`input[name='${error}']`).addClass('is-invalid')
                        $(`.${error}.invalid-feedback`).text(errors[error][0])
                    }
                }
            },
            error: function() {
                alert('Có lỗi xảy ra khi cập nhật sách');
            }
        });
    });
});

// Edit book function
function editBook(button) {
    currentRow = $(button).closest('tr');
    const data = extractRowData(currentRow);

    $('#editId').val(data.id);
    $('#editTenSach').val(data.tensach);
    $('#editTacGia').val(data.tacgia);
    $('#editSoLuong').val(data.soluong);
    $('#editDonGia').val(data.dongia.replace(/\./g, ''));
    $('#editKhuyenMai').val(data.khuyenmai);
    $('#editTap').val(data.tap);
    $('#editSoTap').val(data.sotap);
    $('#editAnhBia').attr('src', data.anhbia);

    // Set select options
    setSelectByText('#editLoaiSach', data.tenloai);
    setSelectByText('#editNXB', data.tennhaxuatban);

    currentRow.addClass('table-active');
    }
      function deletedatas(editButton) {
            id=$("#idsach").text();
            var url = "{{ route('adminsqlsach/delete')}}";
            $.ajax({
                type: "POST",
                url: url,
                cache: false,
                data:{
                _token:'{{ csrf_token() }}',
                type: 3,
                id:id,
                },
                success: function(data){
                if(data.success)
                {
                alert(data.success);
                currentRow.remove();
                $('#deleteModal').modal('hide');
            } else {
                alert('Có lỗi xảy ra khi xóa');
            }
        },
        error: function() {
            alert('Có lỗi xảy ra khi xóa');
        }
    });
}

// Helper functions
function extractRowData(row) {
    return {
        id: row.find('[data-id]').data('id'),
        tenloai: row.find('[data-field="tenloai"]').text(),
        tennhaxuatban: row.find('[data-field="tennhaxuatban"]').text(),
        tensach: row.find('[data-field="tensach"]').text(),
        tacgia: row.find('[data-field="tacgia"]').text(),
        soluong: row.find('[data-field="soluong"]').text(),
        dongia: row.find('[data-field="dongia"]').text(),
        luotxem: row.find('[data-field="luotxem"]').text(),
        luotmua: row.find('[data-field="luotmua"]').text(),
        khuyenmai: row.find('[data-field="khuyenmai"]').text(),
        tap: row.find('[data-field="tap"]').text(),
        sotap: row.find('[data-field="sotap"]').text(),
        anhbia: row.find('[data-field="anhbia"]').attr('src')
    };
}

function setSelectByText(selector, text) {
    $(selector + ' option').each(function() {
        if ($(this).text() === text) {
            $(this).prop('selected', true);
        }
        function deleteclk(editButton){
            row = $(editButton).parent().parent();
            id = $("#lblid", row).text();
            $("#idsach").text(id);
            row.addClass("highlightRow");
            return false;
        }
      function DisplayEditdatasDialog() {
          $("#txtidsach").val(id);
          $('#udloaisach > option').each(function(){
			 if($(this).text()==loaisach) $(this).parent('select').val($(this).val());
			 });
          $('#udnhaxuatban > option').each(function(){
			 if($(this).text()==nhaxuatban) $(this).parent('select').val($(this).val());
			 });
          $("#txttensach").val(tensach);
          $("#txttacgia").val(tacgia);
          $("#txtsoluong").val(soluong);
          $("#txtdongia").val(dongia.replace('.',''));
          $("#txtluotmua").val(luotmua);
          $("#txtluotxem").val(luotxem);
          $("#txtkhuyenmai").val(khuyenmai);
          $("#txttap").val(tap);
          $("#txtsotap").val(sotap);
          $("#ud_anhbia").attr('src',anhbia);
          // $("#upfiles").attr('accept',anhbia);
      }
      function CloseEditdatasDialog() {
          $("#updatemodel").hide();
          row.removeClass("highlightRow");
      }
      $(function () {
           $('#upfiles').change(function () {
                var path = $(this).val();
               if (path != '' && path != null) {
                   var q ="{{ asset('/image/anhsanpham').'/' }}"+path.substring(path.lastIndexOf('\\') + 1);
                   $("#ud_anhbia").attr('src',q);
               }
           })
        })
    </script>
@endsection
