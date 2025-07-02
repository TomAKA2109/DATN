@extends('admin.admin')

@section('khachhang')
<li class="nav-item active">
    <a class="nav-link" href="">
        <i class="fas fa-fw fa-table"></i>
        <span>Quản lý khách hàng</span>
    </a>
</li>
@endsection

@section('tenbang')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Khách hàng</a></li>
    <li class="breadcrumb-item active">Quản lý khách hàng</li>
</ol>
@endsection

@section('table')
<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-table"></i>
        Quản lý khách hàng
        <a href="{{ route('adminsqlkhachhang1/addusers') }}" class="btn btn-primary float-right">
            Thêm Khách Hàng
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Họ tên</th>
                        <th>Username</th>
                        <th>Số điện thoại</th>
                        <th>Địa chỉ</th>
                        <th>Email</th>
                        <th>Ngày tạo</th>
                        <th>Ngày cập nhật</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($khachhang as $kh)
                    <tr>
                        <td><span data-field="id">{{ $kh->id }}</span></td>
                        <td><span data-field="ten">{{ $kh->ten }}</span></td>
                        <td><span data-field="username">{{ $kh->username }}</span></td>
                        <td><span data-field="sdt">{{ $kh->sdt }}</span></td>
                        <td><span data-field="diachi">{{ $kh->diachi }}</span></td>
                        <td><span data-field="mail">{{ $kh->mail }}</span></td>
                        <td>{{ $kh->created_at ? $kh->created_at->format('d/m/Y H:i') : '' }}</td>
                        <td>{{ $kh->updated_at ? $kh->updated_at->format('d/m/Y H:i') : '' }}</td>
                        <td>
                            <button class="btn btn-sm btn-danger" onclick="deleteCustomer(this)" 
                                    data-toggle="modal" data-target="#deleteModal">
                                <i class="fas fa-trash"></i>
                            </button>
                            <button class="btn btn-sm btn-primary" onclick="editCustomer(this)" 
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
<!-- Edit Customer Modal -->
<div class="modal fade" id="editModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Sửa thông tin khách hàng</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form id="editForm">
                <div class="modal-body">
                    @csrf
                    <input type="hidden" id="customerId" name="id">
                    
                    <div class="form-group">
                        <label>Tên khách hàng:</label>
                        <input type="text" class="form-control" id="customerName" name="ten" required>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Username:</label>
                                <input type="text" class="form-control" id="customerUsername" name="username" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Password:</label>
                                <input type="password" class="form-control" id="customerPassword" name="password" 
                                       placeholder="Để trống nếu không đổi">
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Số điện thoại:</label>
                                <input type="tel" class="form-control" id="customerPhone" name="sdt" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email:</label>
                                <input type="email" class="form-control" id="customerEmail" name="mail" required>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label>Địa chỉ:</label>
                        <textarea class="form-control" id="customerAddress" name="diachi" rows="3" required></textarea>
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
                <h5 class="modal-title">Xóa khách hàng</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                Bạn có chắc chắn muốn xóa khách hàng này?
                <input type="hidden" id="deleteCustomerId">
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
    // Edit form submission
    $('#editForm').on('submit', function(e) {
        e.preventDefault();
        
        const formData = {
            _token: '{{ csrf_token() }}',
            type: 3,
            id: $('#customerId').val(),
            ten: $('#customerName').val(),
            username: $('#customerUsername').val(),
            password: $('#customerPassword').val(),
            sdt: $('#customerPhone').val(),
            diachi: $('#customerAddress').val(),
            mail: $('#customerEmail').val()
        };
        
        $.ajax({
            url: "{{ route('adminsqlkhachhang/editkh') }}",
            method: "POST",
            data: formData,
            success: function(response) {
                const result = typeof response === 'string' ? JSON.parse(response) : response;
                
                if (result.statusCode) {
                    alert('Cập nhật thành công!');
                    updateRowData(currentRow, formData);
                    $('#editModal').modal('hide');
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

// Edit customer function
function editCustomer(button) {
    currentRow = $(button).closest('tr');
    const data = extractRowData(currentRow);
    
    $('#customerId').val(data.id);
    $('#customerName').val(data.ten);
    $('#customerUsername').val(data.username);
    $('#customerPhone').val(data.sdt);
    $('#customerAddress').val(data.diachi);
    $('#customerEmail').val(data.mail);
    $('#customerPassword').val(''); // Clear password field
    
    currentRow.addClass('table-active');
}

// Delete customer function
function deleteCustomer(button) {
    currentRow = $(button).closest('tr');
    const id = currentRow.find('[data-field="id"]').text();
    $('#deleteCustomerId').val(id);
    currentRow.addClass('table-active');
}

// Confirm delete
function confirmDelete() {
    const id = $('#deleteCustomerId').val();
    
    $.ajax({
        url: "{{ route('adminsqlkhachhang/deletekh') }}",
        method: "POST",
        data: {
            _token: '{{ csrf_token() }}',
            type: 3,
            id: id
        },
        success: function(response) {
            const result = typeof response === 'string' ? JSON.parse(response) : response;
            
            if (result.statusCode) {
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

// Helper functions
function extractRowData(row) {
    return {
        id: row.find('[data-field="id"]').text(),
        ten: row.find('[data-field="ten"]').text(),
        username: row.find('[data-field="username"]').text(),
        sdt: row.find('[data-field="sdt"]').text(),
        diachi: row.find('[data-field="diachi"]').text(),
        mail: row.find('[data-field="mail"]').text()
    };
}

function updateRowData(row, data) {
    row.find('[data-field="ten"]').text(data.ten);
    row.find('[data-field="username"]').text(data.username);
    row.find('[data-field="sdt"]').text(data.sdt);
    row.find('[data-field="diachi"]').text(data.diachi);
    row.find('[data-field="mail"]').text(data.mail);
}

// Clean up on modal close
$('.modal').on('hidden.bs.modal', function() {
    if (currentRow) {
        currentRow.removeClass('table-active');
    }
});
</script>
@endsection