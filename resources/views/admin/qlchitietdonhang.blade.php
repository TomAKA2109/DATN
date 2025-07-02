@extends('admin.admin')

@section('css')
    @parent
    <style>
        .order-summary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-radius: 10px;
        }
        .book-image {
            width: 40px;
            height: 40px;
            object-fit: cover;
            border-radius: 5px;
        }
        .highlight-row {
            background-color: rgba(255, 193, 7, 0.2) !important;
        }
        .total-summary {
            font-size: 1.1em;
            font-weight: bold;
            background-color: #f8f9fa;
            padding: 10px;
            border-radius: 5px;
        }
    </style>
@endsection

@section('donhang')
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('adminsqldondathang') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Quản lý đơn đặt hàng</span>
        </a>
    </li>
@endsection

@section('tenbang')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('adminsqldondathang') }}">Đơn hàng</a>
        </li>
        <li class="breadcrumb-item active">Chi tiết đơn hàng</li>
    </ol>
@endsection

@section('table')
    <!-- Thông tin tổng quan đơn hàng -->
    @if(isset($orderInfo))
    <div class="card mb-4 order-summary">
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <h5 class="card-title mb-3">
                        <i class="fas fa-shopping-cart"></i> 
                        Đơn hàng #{{ $orderInfo->id ?? 'N/A' }}
                    </h5>
                    <div class="row">
                        <div class="col-md-6">
                            <p class="mb-1"><strong>Khách hàng:</strong> {{ $orderInfo->hoten ?? 'N/A' }}</p>
                            <p class="mb-1"><strong>Email:</strong> {{ $orderInfo->email ?? 'N/A' }}</p>
                            <p class="mb-0"><strong>Điện thoại:</strong> {{ $orderInfo->sodienthoai ?? 'N/A' }}</p>
                        </div>
                        <div class="col-md-6">
                            <p class="mb-1"><strong>Ngày đặt:</strong> {{ $orderInfo->created_at ? $orderInfo->created_at->format('d/m/Y H:i') : 'N/A' }}</p>
                            <p class="mb-1"><strong>Thanh toán:</strong> {{ $orderInfo->phuongthucthanhtoan ?? 'N/A' }}</p>
                            <p class="mb-0"><strong>Trạng thái:</strong> 
                                <span class="badge badge-success">Đã xác nhận</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 text-right">
                    <h4 class="mb-0">
                        <i class="fas fa-money-bill-wave"></i>
                        {{ number_format($orderInfo->tongtien ?? 0, 0, '.', '.') }} đ
                    </h4>
                    <small>Tổng giá trị đơn hàng</small>
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- Bảng chi tiết đơn hàng -->
    <div class="card mb-3">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                <i class="fas fa-list-alt"></i>
                Chi tiết đơn hàng
            </div>
            <div>
                <a href="{{ route('adminsqldondathang') }}" class="btn btn-sm btn-outline-primary">
                    <i class="fas fa-arrow-left"></i> Quay lại
                </a>
            </div>
        </div>
        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="orderDetailTable" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th class="text-center" width="10%">STT</th>
                            <th width="40%">Tên sách</th>
                            <th class="text-center" width="15%">Số lượng</th>
                            <th class="text-center" width="15%">Đơn giá</th>
                            <th class="text-center" width="15%">Thành tiền</th>
                            <th class="text-center" width="5%">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php 
                            $totalAmount = 0;
                            $totalQuantity = 0;
                        @endphp
                        
                        @forelse($chitietdondathang as $index => $detail)
                        @php
                            $bookName = 'Không tìm thấy sách';
                            foreach($sach as $book) {
                                if($book->id == $detail->id_sach) {
                                    $bookName = $book->tensach;
                                    break;
                                }
                            }
                            $subtotal = $detail->soluong * $detail->dongia;
                            $totalAmount += $subtotal;
                            $totalQuantity += $detail->soluong;
                        @endphp
                        
                        <tr data-detail-id="{{ $detail->id }}">
                            <td class="text-center">
                                <span class="detail-id d-none">{{ $detail->id }}</span>
                                {{ $index + 1 }}
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="book-info">
                                        <strong class="book-name">{{ $bookName }}</strong>
                                        <br>
                                        <small class="text-muted">Mã sách: {{ $detail->id_sach }}</small>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">
                                <span class="badge badge-info badge-pill quantity">{{ $detail->soluong }}</span>
                            </td>
                            <td class="text-right unit-price">
                                {{ number_format($detail->dongia, 0, '.', '.') }} đ
                            </td>
                            <td class="text-right subtotal">
                                <strong>{{ number_format($subtotal, 0, '.', '.') }} đ</strong>
                            </td>
                            <td class="text-center">
                                <div class="btn-group" role="group">
                                    <button type="button" 
                                            class="btn btn-sm btn-outline-warning btn-edit" 
                                            data-toggle="modal" 
                                            data-target="#editDetailModal"
                                            title="Chỉnh sửa">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button type="button" 
                                            class="btn btn-sm btn-outline-danger btn-delete" 
                                            data-toggle="modal" 
                                            data-target="#deleteDetailModal"
                                            title="Xóa">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">
                                <i class="fas fa-inbox fa-2x mb-2"></i>
                                <br>
                                Không có chi tiết đơn hàng nào
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    
                    @if(count($chitietdondathang) > 0)
                    <tfoot class="total-summary">
                        <tr>
                            <td colspan="2" class="text-center"><strong>Tổng cộng:</strong></td>
                            <td class="text-center">
                                <span class="badge badge-primary badge-pill">{{ $totalQuantity }}</span>
                            </td>
                            <td class="text-right">-</td>
                            <td class="text-right">
                                <strong class="text-primary">{{ number_format($totalAmount, 0, '.', '.') }} đ</strong>
                            </td>
                            <td></td>
                        </tr>
                    </tfoot>
                    @endif
                </table>
            </div>
        </div>
        
        <div class="card-footer small text-muted d-flex justify-content-between">
            <span>Cập nhật: {{ now()->format('d/m/Y H:i') }}</span>
            <span>Tổng: {{ count($chitietdondathang) }} mục</span>
        </div>
    </div>
@endsection

@section('model')
    <!-- Modal Chỉnh sửa chi tiết -->
    <div class="modal fade" id="editDetailModal" tabindex="-1" role="dialog" aria-labelledby="editDetailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-warning text-white">
                    <h5 class="modal-title" id="editDetailModalLabel">
                        <i class="fas fa-edit"></i> Chỉnh sửa chi tiết đơn hàng
                    </h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                
                <form id="editDetailForm" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="edit_book_name">Tên sách</label>
                                    <input type="text" class="form-control" id="edit_book_name" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="edit_book_id">Mã sách</label>
                                    <input type="text" class="form-control" id="edit_book_id" readonly>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="edit_quantity">Số lượng <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="edit_quantity" name="soluong" min="1" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="edit_price">Đơn giá <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="edit_price" name="dongia" min="0" required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label>Thành tiền</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="edit_subtotal" readonly>
                                <div class="input-group-append">
                                    <span class="input-group-text">đ</span>
                                </div>
                            </div>
                        </div>
                        
                        <input type="hidden" id="edit_detail_id" name="id">
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            <i class="fas fa-times"></i> Hủy
                        </button>
                        <button type="submit" class="btn btn-warning">
                            <i class="fas fa-save"></i> Cập nhật
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Xóa chi tiết -->
    <div class="modal fade" id="deleteDetailModal" tabindex="-1" role="dialog" aria-labelledby="deleteDetailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="deleteDetailModalLabel">
                        <i class="fas fa-exclamation-triangle"></i> Xác nhận xóa
                    </h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                
                <div class="modal-body">
                    <div class="text-center">
                        <i class="fas fa-trash fa-3x text-danger mb-3"></i>
                        <h5>Bạn có chắc chắn muốn xóa mục này?</h5>
                        <p class="text-muted">
                            Sách: <strong id="delete_book_name"></strong><br>
                            Số lượng: <strong id="delete_quantity"></strong><br>
                            Hành động này không thể hoàn tác!
                        </p>
                        <input type="hidden" id="delete_detail_id">
                    </div>
                </div>
                
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="fas fa-times"></i> Hủy
                    </button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteBtn">
                        <i class="fas fa-trash"></i> Xóa
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
<script>
$(document).ready(function() {
    let currentRow;
    
    // Khởi tạo DataTable
    $('#orderDetailTable').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Vietnamese.json"
        },
        "pageLength": 25,
        "order": [[0, "asc"]], // Sắp xếp theo STT
        "columnDefs": [
            { "orderable": false, "targets": [5] } // Không cho phép sort cột thao tác
        ]
    });
    
    // Xử lý nút chỉnh sửa
    $(document).on('click', '.btn-edit', function() {
        currentRow = $(this).closest('tr');
        currentRow.addClass('highlight-row');
        
        // Lấy dữ liệu từ hàng được chọn
        const detailId = currentRow.find('.detail-id').text();
        const bookName = currentRow.find('.book-name').text();
        const bookId = currentRow.find('small:contains("Mã sách:")').text().replace('Mã sách: ', '');
        const quantity = currentRow.find('.quantity').text();
        const unitPrice = currentRow.find('.unit-price').text().replace(/[^\d]/g, '');
        
        // Điền dữ liệu vào form
        $('#edit_detail_id').val(detailId);
        $('#edit_book_name').val(bookName);
        $('#edit_book_id').val(bookId);
        $('#edit_quantity').val(quantity);
        $('#edit_price').val(unitPrice);
        
        // Tính thành tiền
        updateSubtotal();
    });
    
    // Xử lý nút xóa
    $(document).on('click', '.btn-delete', function() {
        currentRow = $(this).closest('tr');
        currentRow.addClass('highlight-row');
        
        const detailId = currentRow.find('.detail-id').text();
        const bookName = currentRow.find('.book-name').text();
        const quantity = currentRow.find('.quantity').text();
        
        $('#delete_detail_id').val(detailId);
        $('#delete_book_name').text(bookName);
        $('#delete_quantity').text(quantity);
    });
    
    // Xử lý khi đóng modal
    $('.modal').on('hidden.bs.modal', function() {
        if (currentRow) {
            currentRow.removeClass('highlight-row');
        }
    });
    
    // Tự động tính thành tiền khi thay đổi số lượng hoặc đơn giá
    $('#edit_quantity, #edit_price').on('input', function() {
        updateSubtotal();
    });
    
    function updateSubtotal() {
        const quantity = parseInt($('#edit_quantity').val()) || 0;
        const price = parseInt($('#edit_price').val()) || 0;
        const subtotal = quantity * price;
        
        $('#edit_subtotal').val(formatNumber(subtotal));
    }
    
    // Xử lý xác nhận xóa
    $('#confirmDeleteBtn').click(function() {
        const detailId = $('#delete_detail_id').val();
        
        if (!detailId) {
            showAlert('error', 'Không tìm thấy ID chi tiết!');
            return;
        }
        
        // Hiển thị loading
        $(this).prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Đang xóa...');
        
        $.ajax({
            url: "{{ route('adminschitietdonhang/delete') }}",
            type: "POST",
            data: {
                _token: '{{ csrf_token() }}',
                type: 3,
                id: detailId
            },
            success: function(response) {
                if (response.success) {
                    showAlert('success', response.success);
                    $('#deleteDetailModal').modal('hide');
                    
                    // Xóa hàng và cập nhật tổng
                    currentRow.fadeOut(500, function() {
                        $(this).remove();
                        updateTotalSummary();
                    });
                } else {
                    showAlert('error', 'Có lỗi xảy ra khi xóa chi tiết!');
                }
            },
            error: function(xhr, status, error) {
                showAlert('error', 'Có lỗi xảy ra: ' + error);
            },
            complete: function() {
                $('#confirmDeleteBtn').prop('disabled', false).html('<i class="fas fa-trash"></i> Xóa');
            }
        });
    });
    
    // Xử lý submit form chỉnh sửa
    $('#editDetailForm').submit(function(e) {
        e.preventDefault();
        
        const formData = new FormData(this);
        const submitBtn = $(this).find('button[type="submit"]');
        
        // Hiển thị loading
        submitBtn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Đang cập nhật...');
        
        // URL cập nhật (cần được định nghĩa trong routes)
        const updateUrl = "{{ url('admin/chitietdonhang/update') }}";
        
        $.ajax({
            url: updateUrl,
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.success) {
                    showAlert('success', 'Cập nhật chi tiết thành công!');
                    $('#editDetailModal').modal('hide');
                    
                    // Cập nhật dữ liệu trên bảng
                    updateRowData(currentRow, formData);
                    updateTotalSummary();
                } else {
                    showAlert('error', 'Có lỗi xảy ra khi cập nhật!');
                }
            },
            error: function(xhr, status, error) {
                showAlert('error', 'Có lỗi xảy ra: ' + error);
            },
            complete: function() {
                submitBtn.prop('disabled', false).html('<i class="fas fa-save"></i> Cập nhật');
            }
        });
    });
    
    // Hàm hiển thị thông báo stylish
    function showAlert(type, message) {
        const alertClass = type === 'success' ? 'alert-success' : 'alert-danger';
        const alertIcon = type === 'success' ? 'check-circle' : 'exclamation-triangle';
        
        const alertHtml = `
            <div class="alert ${alertClass} alert-dismissible fade show shadow-sm" role="alert">
                <i class="fas fa-${alertIcon} mr-2"></i>${message}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        `;
        
        // Thêm alert vào đầu trang
        $('.card').first().prepend(alertHtml);
        
        // Tự động ẩn sau 5 giây
        setTimeout(function() {
            $('.alert').alert('close');
        }, 5000);
    }
    
    // Hàm cập nhật dữ liệu hàng
    function updateRowData(row, formData) {
        const quantity = formData.get('soluong');
        const price = formData.get('dongia');
        const subtotal = quantity * price;
        
        row.find('.quantity').text(quantity);
        row.find('.unit-price').text(formatNumber(price) + ' đ');
        row.find('.subtotal strong').text(formatNumber(subtotal) + ' đ');
    }
    
    // Hàm cập nhật tổng kết
    function updateTotalSummary() {
        let totalQuantity = 0;
        let totalAmount = 0;
        
        $('#orderDetailTable tbody tr').each(function() {
            if (!$(this).find('.detail-id').length) return;
            
            const quantity = parseInt($(this).find('.quantity').text()) || 0;
            const subtotalText = $(this).find('.subtotal strong').text().replace(/[^\d]/g, '');
            const subtotal = parseInt(subtotalText) || 0;
            
            totalQuantity += quantity;
            totalAmount += subtotal;
        });
        
        // Cập nhật footer
        $('#orderDetailTable tfoot .badge-primary').text(totalQuantity);
        $('#orderDetailTable tfoot .text-primary').text(formatNumber(totalAmount) + ' đ');
    }
    
    // Hàm format số
    function formatNumber(num) {
        return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }
});
</script>
@endsection