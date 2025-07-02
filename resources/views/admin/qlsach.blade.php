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
        <button class="btn btn-primary float-right" data-target="#insertmodal" data-toggle="modal">
            Thêm sách mới
        </button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="thead-dark">
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
                        <th>Tập</th>
                        <th>Số tập</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($_sach as $sach)
                    <tr>
                        <td>
                            <span class="d-none" data-id="{{ $sach->id }}"></span>
                            <span data-field="tenloai">{{ $sach->tenloai }}</span>
                        </td>
                        <td><span data-field="tennhaxuatban">{{ $sach->tennhaxuatban }}</span></td>
                        <td><span data-field="tensach">{{ $sach->tensach }}</span></td>
                        <td><span data-field="tacgia">{{ $sach->tacgia }}</span></td>
                        <td><span data-field="soluong">{{ $sach->soluong }}</span></td>
                        <td><span data-field="dongia">{{ number_format($sach->dongia, 0, ",", ".") }}</span></td>
                        <td><span data-field="luotxem">{{ $sach->luotxem }}</span></td>
                        <td><span data-field="luotmua">{{ $sach->luotmua }}</span></td>
                        <td><span data-field="khuyenmai">{{ $sach->khuyenmai }}</span></td>
                        <td>
                            <img src="{{ asset('/image/anhsanpham/' . $sach->anhbia) }}" 
                                 data-field="anhbia" style="width: 120px;" alt="Book cover">
                        </td>
                        <td><span data-field="tap">{{ $sach->tap }}</span></td>
                        <td><span data-field="sotap">{{ $sach->sotap }}</span></td>
                        <td>
                            <button class="btn btn-sm btn-danger" onclick="deleteBook(this)" 
                                    data-toggle="modal" data-target="#deleteModal">
                                <i class="fas fa-trash"></i>
                            </button>
                            <button class="btn btn-sm btn-primary" onclick="editBook(this)" 
                                    data-toggle="modal" data-target="#editModal">
                                <i class="fas fa-edit"></i>
                            </button>
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
<!-- Add Book Modal -->
<div class="modal fade" id="insertmodal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Thêm sản phẩm</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="{{ route('adminsqlsach/insert') }}" method="post" enctype="multipart/form-data" id="addForm">
                <div class="modal-body">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Loại sách:</label>
                                <select name="loaisach" class="form-control" required>
                                    @foreach($_loaisach as $loaisach)
                                    <option value="{{ $loaisach->id }}">{{ $loaisach->tenloai }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nhà xuất bản:</label>
                                <select name="nxb" class="form-control" required>
                                    @foreach($_nhaxuatban as $nhaxuatban)
                                    <option value="{{ $nhaxuatban->id }}">{{ $nhaxuatban->tennhaxuatban }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label>Tên sách:</label>
                        <input type="text" class="form-control" name="tensach" placeholder="Tên sách" required>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tác giả:</label>
                                <input type="text" class="form-control" name="tacgia" placeholder="Tác giả" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Số lượng:</label>
                                <input type="number" class="form-control" name="soluong" placeholder="Số lượng" min="0" required>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Đơn giá:</label>
                                <input type="number" class="form-control" name="dongia" placeholder="Đơn giá" min="0" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Khuyến mãi (%):</label>
                                <input type="number" class="form-control" name="khuyenmai" placeholder="Khuyến mãi" min="0" max="100">
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tập:</label>
                                <input type="number" class="form-control" name="tap" placeholder="Tập số" min="0">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Số tập:</label>
                                <input type="number" class="form-control" name="sotap" placeholder="Số tập" min="0">
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label>Ảnh bìa:</label>
                        <input type="file" name="select_file" class="form-control" accept="image/*">
                    </div>
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
</div>
@endsection

@section('javascript')
<script>
let currentRow;

// Form submissions
$(document).ready(function() {
    // Add form
    $('#addForm').on('submit', function(e) {
        e.preventDefault();
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
            error: function() {
                alert('Có lỗi xảy ra khi thêm sách');
            }
        });
    });

    // Edit form
    $('#editForm').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: "{{ url('admin/qlsach/update') }}",
            method: "POST",
            data: new FormData(this),
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                if (data.ok) {
                    alert(data.ok);
                    location.reload();
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

// Delete book function
function deleteBook(button) {
    currentRow = $(button).closest('tr');
    const id = currentRow.find('[data-id]').data('id');
    $('#deleteId').val(id);
    currentRow.addClass('table-active');
}

// Confirm delete
function confirmDelete() {
    const id = $('#deleteId').val();
    $.ajax({
        url: "{{ route('adminsqlsach/delete') }}",
        method: "POST",
        data: {
            _token: '{{ csrf_token() }}',
            type: 3,
            id: id
        },
        success: function(data) {
            if (data.success) {
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
    });
}

// Clean up on modal close
$('.modal').on('hidden.bs.modal', function() {
    if (currentRow) {
        currentRow.removeClass('table-active');
    }
});
</script>
@endsection