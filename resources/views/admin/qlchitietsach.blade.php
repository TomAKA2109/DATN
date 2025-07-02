@extends('admin.admin')

@section('chitietsach')
<li class="nav-item active">
    <a class="nav-link" href="">
        <i class="fas fa-fw fa-table"></i>
        <span>Quản lý chi tiết sách</span>
    </a>
</li>
@endsection

@section('tenbang')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Sách</a></li>
    <li class="breadcrumb-item active">Quản lý chi tiết sách</li>
</ol>
@endsection

@section('table')
<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-table"></i>
        Quản lý chi tiết sách
        <a href="{{ route('adminsqlchitietsach/insert') }}" class="btn btn-primary float-right">
            Thêm Chi Tiết Sách
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="thead-dark">
                    <tr>
                        <th>Tên sách</th>
                        <th>Ngôn ngữ</th>
                        <th>Số trang</th>
                        <th>Năm xuất bản</th>
                        <th>Mô tả</th>
                        <th>Kích thước</th>
                        <th>Trọng lượng</th>
                        <th>Ngày phát hành</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sachs as $sach)
                    <tr>
                        <td><span data-field="tensach">{{ $sach->tensach }}</span></td>
                        <td><span data-field="ngonngu">{{ $sach->chitietsach->ngonngu ?? '' }}</span></td>
                        <td><span data-field="sotrang">{{ $sach->chitietsach->sotrang ?? '' }}</span></td>
                        <td><span data-field="namxuatban">{{ $sach->chitietsach->namxuatban ?? '' }}</span></td>
                        <td><span data-field="noidung">{!! $sach->chitietsach && strlen($sach->chitietsach->noidung) > 100 ? substr($sach->chitietsach->noidung, 0, 100) . "..." : ($sach->chitietsach->noidung ?? '') !!}</span></td>
                        <td><span data-field="kichthuoc">{{ $sach->chitietsach->kichthuoc ?? '' }}</span></td>
                        <td><span data-field="trongluong">{{ $sach->chitietsach->trongluong ?? '' }}</span></td>
                        <td><span data-field="ngayphathanh">{{ $sach->chitietsach->ngayphathanh ?? '' }}</span></td>
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
<!-- Edit Book Modal -->
<div class="modal fade" id="editModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Sửa chi tiết sách</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form id="editForm">
                <div class="modal-body">
                    @csrf
                    <input type="hidden" id="bookId" name="id">
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Loại sách:</label>
                                <select name="loaisach" id="bookCategory" class="form-control" required>
                                    @foreach($_loaisach as $loaisach)
                                        <option value="{{ $loaisach->id }}">{{ $loaisach->tenloai }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nhà xuất bản:</label>
                                <select name="nxb" id="bookPublisher" class="form-control" required>
                                    @foreach($_nhaxuatban as $nxb)
                                        <option value="{{ $nxb->id }}">{{ $nxb->tennhaxuatban }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label>Tên sách:</label>
                        <input type="text" class="form-control" id="bookName" name="tensach" required>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Tác giả:</label>
                                <input type="text" class="form-control" id="bookAuthor" name="tacgia" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Số lượng:</label>
                                <input type="number" class="form-control" id="bookQuantity" name="soluong" min="0" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Đơn giá:</label>
                                <input type="number" class="form-control" id="bookPrice" name="dongia" min="0" required>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Ngôn ngữ:</label>
                                <input type="text" class="form-control" id="bookLanguage" name="ngonngu">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Số trang:</label>
                                <input type="number" class="form-control" id="bookPages" name="sotrang" min="1">
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Kích thước:</label>
                                <input type="text" class="form-control" id="bookSize" name="kichthuoc">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Trọng lượng:</label>
                                <input type="text" class="form-control" id="bookWeight" name="trongluong">
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Năm xuất bản:</label>
                                <input type="number" class="form-control" id="bookYear" name="namxuatban" min="1900" max="2030">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Ngày phát hành:</label>
                                <input type="date" class="form-control" id="bookReleaseDate" name="ngayphathanh">
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label>Mô tả:</label>
                        <textarea class="form-control" id="bookDescription" name="noidung" rows="4"></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label>Ảnh bìa:</label>
                        <input type="file" class="form-control" name="anhbia" accept="image/*">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Cập nhật</button>
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
                <h5 class="modal-title">Xóa chi tiết sách</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                Bạn có chắc chắn muốn xóa chi tiết sách này?
                <input type="hidden" id="deleteBookId">
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

$(document).ready(function() {
    $('#editForm').on('submit', function(e) {
        e.preventDefault();
        
        const formData = new FormData(this);
        
        $.ajax({
            url: '/admin/qlchitietsach/edit/post/' + $('#bookId').val(),
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                const result = typeof response === 'string' ? JSON.parse(response) : response;
                
                if (result.success) {
                    alert('Cập nhật thành công!');
                    location.reload();
                } else {
                    alert('Có lỗi xảy ra khi cập nhật!');
                }
            },
            error: function() {
                alert('Có lỗi xảy ra! Vui lòng thử lại.');
            }
        });
    });
});

function editBook(button) {
    currentRow = $(button).closest('tr');
    const data = extractRowData(currentRow);
    
    // Populate form fields
    $('#bookId').val(data.id);
    $('#bookName').val(data.tensach);
    $('#bookLanguage').val(data.ngonngu);
    $('#bookPages').val(data.sotrang);
    $('#bookYear').val(data.namxuatban);
    $('#bookDescription').val(data.noidung);
    $('#bookSize').val(data.kichthuoc);
    $('#bookWeight').val(data.trongluong);
    $('#bookReleaseDate').val(data.ngayphathanh);
    
    currentRow.addClass('table-active');
}

function deleteBook(button) {
    currentRow = $(button).closest('tr');
    const data = extractRowData(currentRow);
    $('#deleteBookId').val(data.id);
    currentRow.addClass('table-active');
}

function confirmDelete() {
    const id = $('#deleteBookId').val();
    
    $.ajax({
        url: '/admin/qlchitietsach/delete',
        method: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
            id: id
        },
        success: function(response) {
            const result = typeof response === 'string' ? JSON.parse(response) : response;
            
            if (result.success) {
                alert('Xóa thành công!');
                currentRow.remove();
                $('#deleteModal').modal('hide');
            } else {
                alert('Có lỗi xảy ra khi xóa!');
            }
        },
        error: function() {
            alert('Có lỗi xảy ra! Vui lòng thử lại.');
        }
    });
}

function extractRowData(row) {
    return {
        tensach: row.find('[data-field="tensach"]').text(),
        ngonngu: row.find('[data-field="ngonngu"]').text(),
        sotrang: row.find('[data-field="sotrang"]').text(),
        namxuatban: row.find('[data-field="namxuatban"]').text(),
        noidung: row.find('[data-field="noidung"]').text(),
        kichthuoc: row.find('[data-field="kichthuoc"]').text(),
        trongluong: row.find('[data-field="trongluong"]').text(),
        ngayphathanh: row.find('[data-field="ngayphathanh"]').text()
    };
}

$('.modal').on('hidden.bs.modal', function() {
    if (currentRow) {
        currentRow.removeClass('table-active');
    }
});
</script>
@endsection