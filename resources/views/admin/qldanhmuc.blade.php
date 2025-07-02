@extends('admin.admin')

@section('danhmuc')
<li class="nav-item active">
    <a class="nav-link" href="">
        <i class="fas fa-fw fa-table"></i>
        <span>Quản lý danh mục</span>
    </a>
</li>
@endsection

@section('tenbang')
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="http://127.0.0.1:8000/admin/qldanhmuc">Danh mục sách</a>
    </li>
    <li class="breadcrumb-item active">Quản lý danh mục</li>
</ol>
@endsection

@section('table')
<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-table"></i>
        Quản lý danh mục
        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#insertModal">
            Thêm Danh Mục
        </button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead class="thead-dark">
                    <tr>
                        <th>Tên danh mục</th>
                        <th>Ảnh</th>
                        <th>Thứ tự hiển thị</th>
                        <th>Ngày tạo</th>
                        <th>Ngày cập nhật</th>
                        <th width="120px">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($danhmuc as $item)
                    <tr>
                        <td>
                            <span class="d-none" data-field="id">{{ $item->id }}</span>
                            <span data-field="tendanhmuc">{{ $item->tendanhmuc }}</span>
                        </td>
                        <td class="text-center">
                            <img src="{{ url('/image').'/'.$item->anhdaidien }}" 
                                 alt="Category Image" 
                                 class="img-thumbnail" 
                                 style="width: 80px; height: 60px; object-fit: cover;">
                        </td>
                        <td>
                            <span data-field="thutu">{{ $item->thutu }}</span>
                        </td>
                        <td>{{ $item->created_at ? $item->created_at->format('d/m/Y H:i') : '' }}</td>
                        <td>{{ $item->updated_at ? $item->updated_at->format('d/m/Y H:i') : '' }}</td>
                        <td class="text-center">
                            <button class="btn btn-sm btn-primary mr-1" onclick="editCategory(this)" 
                                    data-toggle="modal" data-target="#editModal" title="Sửa">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="btn btn-sm btn-danger" onclick="deleteCategory(this)" 
                                    data-toggle="modal" data-target="#deleteModal" title="Xóa">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer small text-muted">
        Cập nhật lần cuối: {{ now()->format('d/m/Y H:i') }}
    </div>
</div>
@endsection

@section('model')
<!-- Add Category Modal -->
<div class="modal fade" id="insertModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">
                    <i class="fas fa-plus-circle"></i> Thêm danh mục mới
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <form id="insertForm" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="categoryName">
                            <i class="fas fa-tag"></i> Tên danh mục <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control" id="categoryName" name="is_tendanhmuc" 
                               placeholder="Nhập tên danh mục" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="categoryImage">
                            <i class="fas fa-image"></i> Ảnh danh mục
                        </label>
                        <input type="file" class="form-control-file" id="categoryImage" name="is_files" 
                               accept="image/*">
                        <small class="form-text text-muted">Chọn file ảnh (JPG, PNG, GIF)</small>
                    </div>
                    
                    <div class="form-group">
                        <label for="categoryOrder">
                            <i class="fas fa-sort-numeric-up"></i> Thứ tự hiển thị <span class="text-danger">*</span>
                        </label>
                        <input type="number" class="form-control" id="categoryOrder" name="is_thutu" 
                               placeholder="Nhập thứ tự hiển thị" min="1" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Thêm mới
                    </button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="fas fa-times"></i> Hủy bỏ
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Category Modal -->
<div class="modal fade" id="editModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-info text-white">
                <h5 class="modal-title">
                    <i class="fas fa-edit"></i> Chỉnh sửa danh mục
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <form id="editForm" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <input type="hidden" id="editCategoryId" name="ud_id">
                    
                    <div class="form-group">
                        <label for="editCategoryName">
                            <i class="fas fa-tag"></i> Tên danh mục <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control" id="editCategoryName" name="ud_tendanhmuc" 
                               placeholder="Nhập tên danh mục" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="editCategoryImage">
                            <i class="fas fa-image"></i> Ảnh danh mục
                        </label>
                        <input type="file" class="form-control-file" id="editCategoryImage" name="up_files" 
                               accept="image/*">
                        <small class="form-text text-muted">Để trống nếu không muốn thay đổi ảnh</small>
                    </div>
                    
                    <div class="form-group">
                        <label for="editCategoryOrder">
                            <i class="fas fa-sort-numeric-up"></i> Thứ tự hiển thị <span class="text-danger">*</span>
                        </label>
                        <input type="number" class="form-control" id="editCategoryOrder" name="ud_thutu" 
                               placeholder="Nhập thứ tự hiển thị" min="1" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Cập nhật
                    </button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="fas fa-times"></i> Hủy bỏ
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">
                    <i class="fas fa-exclamation-triangle"></i> Xác nhận xóa
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <i class="fas fa-question-circle fa-3x text-warning mb-3"></i>
                <h5>Bạn có chắc chắn muốn xóa danh mục này?</h5>
                <p class="text-muted">Hành động này không thể hoàn tác!</p>
                <input type="hidden" id="deleteCategoryId">
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-danger" onclick="confirmDelete()">
                    <i class="fas fa-trash"></i> Xóa ngay
                </button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    <i class="fas fa-times"></i> Hủy bỏ
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
<script>
let currentRow;

$(document).ready(function() {
    // Initialize DataTable
    $('#dataTable').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/Vietnamese.json"
        },
        "pageLength": 10,
        "responsive": true
    });
    
    // Add form submission
    $('#insertForm').on('submit', function(e) {
        e.preventDefault();
        
        const submitBtn = $(this).find('button[type="submit"]');
        const originalText = submitBtn.html();
        
        // Show loading state
        submitBtn.html('<i class="fas fa-spinner fa-spin"></i> Đang xử lý...').prop('disabled', true);
        
        $.ajax({
            url: "{{ route('adminsqldanhmuc/insert') }}",
            method: "POST",
            data: new FormData(this),
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                if (data.success) {
                    showAlert('success', 'Thành công!', data.success);
                    $('#insertModal').modal('hide');
                    setTimeout(() => {
                        location.reload();
                    }, 1500);
                } else {
                    showAlert('error', 'Lỗi!', 'Có lỗi xảy ra khi thêm danh mục');
                }
            },
            error: function(xhr) {
                showAlert('error', 'Lỗi!', 'Có lỗi xảy ra! Vui lòng thử lại.');
            },
            complete: function() {
                // Restore button state
                submitBtn.html(originalText).prop('disabled', false);
            }
        });
    });
    
    // Edit form submission
    $('#editForm').on('submit', function(e) {
        e.preventDefault();
        
        const submitBtn = $(this).find('button[type="submit"]');
        const originalText = submitBtn.html();
        
        // Show loading state
        submitBtn.html('<i class="fas fa-spinner fa-spin"></i> Đang xử lý...').prop('disabled', true);
        
        $.ajax({
            url: "{{ route('adminsqldanhmuc/update') }}",
            method: "POST",
            data: new FormData(this),
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                if (data.success) {
                    showAlert('success', 'Thành công!', data.success);
                    $('#editModal').modal('hide');
                    setTimeout(() => {
                        location.reload();
                    }, 1500);
                } else {
                    showAlert('error', 'Lỗi!', 'Có lỗi xảy ra khi cập nhật danh mục');
                }
            },
            error: function(xhr) {
                showAlert('error', 'Lỗi!', 'Có lỗi xảy ra! Vui lòng thử lại.');
            },
            complete: function() {
                // Restore button state
                submitBtn.html(originalText).prop('disabled', false);
            }
        });
    });
});

// Edit category function
function editCategory(button) {
    currentRow = $(button).closest('tr');
    const data = extractRowData(currentRow);
    
    $('#editCategoryId').val(data.id);
    $('#editCategoryName').val(data.tendanhmuc);
    $('#editCategoryOrder').val(data.thutu);
    
    currentRow.addClass('table-active');
}

// Delete category function
function deleteCategory(button) {
    currentRow = $(button).closest('tr');
    const data = extractRowData(currentRow);
    $('#deleteCategoryId').val(data.id);
    currentRow.addClass('table-active');
}

// Confirm delete
function confirmDelete() {
    const id = $('#deleteCategoryId').val();
    const deleteBtn = $('#deleteModal').find('.btn-danger');
    const originalText = deleteBtn.html();
    
    // Show loading state
    deleteBtn.html('<i class="fas fa-spinner fa-spin"></i> Đang xóa...').prop('disabled', true);
    
    $.ajax({
        url: "{{ route('adminsqldanhmuc/delete') }}",
        method: "POST",
        data: {
            _token: '{{ csrf_token() }}',
            type: 3,
            id: id
        },
        success: function(data) {
            if (data.success) {
                showAlert('success', 'Thành công!', data.success);
                $('#deleteModal').modal('hide');
                currentRow.fadeOut(500, function() {
                    $(this).remove();
                });
            } else {
                showAlert('error', 'Lỗi!', 'Có lỗi xảy ra khi xóa danh mục');
            }
        },
        error: function(xhr) {
            showAlert('error', 'Lỗi!', 'Có lỗi xảy ra! Vui lòng thử lại.');
        },
        complete: function() {
            // Restore button state
            deleteBtn.html(originalText).prop('disabled', false);
        }
    });
}

// Helper functions
function extractRowData(row) {
    return {
        id: row.find('[data-field="id"]').text(),
        tendanhmuc: row.find('[data-field="tendanhmuc"]').text(),
        thutu: row.find('[data-field="thutu"]').text()
    };
}

function showAlert(type, title, message) {
    const alertClass = type === 'success' ? 'alert-success' : 'alert-danger';
    const iconClass = type === 'success' ? 'fa-check-circle' : 'fa-exclamation-circle';
    
    const alertHtml = `
        <div class="alert ${alertClass} alert-dismissible fade show" role="alert">
            <i class="fas ${iconClass}"></i>
            <strong>${title}</strong> ${message}
            <button type="button" class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
        </div>
    `;
    
    // Remove existing alerts
    $('.alert').remove();
    
    // Add new alert at the top of the page
    $('body').prepend(alertHtml);
    
    // Auto hide after 5 seconds
    setTimeout(() => {
        $('.alert').fadeOut();
    }, 5000);
}

// Clean up on modal close
$('.modal').on('hidden.bs.modal', function() {
    if (currentRow) {
        currentRow.removeClass('table-active');
    }
    // Reset forms
    $(this).find('form')[0]?.reset();
});

// File input preview (optional enhancement)
$('input[type="file"]').on('change', function() {
    const file = this.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            // You can add image preview here if needed
            console.log('Image selected:', file.name);
        };
        reader.readAsDataURL(file);
    }
});
</script>
@endsection