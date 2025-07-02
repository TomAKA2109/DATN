@extends('admin.admin')

@section('css')
    @parent
@endsection

@section('donhang')
    <li class="nav-item active">
        <a class="nav-link" href="">
            <i class="fas fa-fw fa-table"></i>
            <span>Quản lý đơn đặt hàng</span>
        </a>
    </li>
@endsection

@section('tenbang')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Đơn hàng</a>
        </li>
        <li class="breadcrumb-item active">Danh sách</li>
    </ol>
@endsection

@section('table')
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Quản lý đơn đặt hàng
        </div>
        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th class="text-center">ID KH</th>
                            <th>Họ tên</th>
                            <th class="text-center">Giới tính</th>
                            <th>Email</th>
                            <th>Địa chỉ</th>
                            <th class="text-center">Số điện thoại</th>
                            <th class="text-center">Ghi chú</th>
                            <th class="text-center">Thanh toán</th>
                            <th class="text-center">Tổng tiền</th>
                            <th class="text-center">Ngày lập</th>
                            <th class="text-center">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dondathang as $order)
                            <tr data-order-id="{{ $order->id }}">
                                <td class="text-center">
                                    <span class="order-id d-none">{{ $order->id }}</span>
                                    <span class="customer-id">{{ $order->id_khachhang }}</span>
                                </td>
                                <td class="customer-name">{{ $order->hoten }}</td>
                                <td class="text-center customer-gender">{{ $order->gioitinh }}</td>
                                <td class="customer-email">{{ $order->email }}</td>
                                <td class="customer-address">{{ Str::limit($order->diachi, 30) }}</td>
                                <td class="text-center customer-phone">{{ $order->sodienthoai }}</td>
                                <td class="text-center order-note">
                                    @if($order->ghichu)
                                        <span title="{{ $order->ghichu }}">{{ Str::limit($order->ghichu, 20) }}</span>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td class="text-center payment-method">
                                    <span class="badge badge-info">{{ $order->phuongthucthanhtoan }}</span>
                                </td>
                                <td class="text-right total-amount">
                                    <strong>{{ number_format($order->tongtien, 0, '.', '.') }} đ</strong>
                                </td>
                                <td class="text-center created-date">
                                    {{ $order->created_at->format('d/m/Y H:i') }}
                                </td>
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('adminschitietdonhang', $order->id) }}" 
                                           class="btn btn-sm btn-primary" 
                                           title="Xem chi tiết">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <button type="button" 
                                                class="btn btn-sm btn-warning btn-edit" 
                                                data-toggle="modal" 
                                                data-target="#editOrderModal"
                                                title="Chỉnh sửa">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button type="button" 
                                                class="btn btn-sm btn-danger btn-delete" 
                                                data-toggle="modal" 
                                                data-target="#deleteOrderModal"
                                                title="Xóa">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
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
    <!-- Modal Chỉnh sửa đơn hàng -->
    <div class="modal fade" id="editOrderModal" tabindex="-1" role="dialog" aria-labelledby="editOrderModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-warning text-white">
                    <h5 class="modal-title" id="editOrderModalLabel">
                        <i class="fas fa-edit"></i> Chỉnh sửa đơn hàng
                    </h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                
                <form id="editOrderForm" action="{{ route('adminsdelete_donhang') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="edit_hoten">Họ tên <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="edit_hoten" name="hoten" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="edit_gioitinh">Giới tính</label>
                                    <select class="form-control" id="edit_gioitinh" name="gioitinh">
                                        <option value="Nam">Nam</option>
                                        <option value="Nữ">Nữ</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="edit_email">Email</label>
                                    <input type="email" class="form-control" id="edit_email" name="email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="edit_sodienthoai">Số điện thoại</label>
                                    <input type="text" class="form-control" id="edit_sodienthoai" name="sodienthoai">
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="edit_diachi">Địa chỉ</label>
                            <textarea class="form-control" id="edit_diachi" name="diachi" rows="2"></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label for="edit_ghichu">Ghi chú</label>
                            <textarea class="form-control" id="edit_ghichu" name="ghichu" rows="3"></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label for="edit_phuongthucthanhtoan">Phương thức thanh toán</label>
                            <select class="form-control" id="edit_phuongthucthanhtoan" name="phuongthucthanhtoan">
                                <option value="Tiền mặt">Tiền mặt</option>
                                <option value="Chuyển khoản">Chuyển khoản</option>
                                <option value="Thẻ tín dụng">Thẻ tín dụng</option>
                            </select>
                        </div>
                        
                        <input type="hidden" id="edit_order_id" name="id">
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

    <!-- Modal Xóa đơn hàng -->
    <div class="modal fade" id="deleteOrderModal" tabindex="-1" role="dialog" aria-labelledby="deleteOrderModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="deleteOrderModalLabel">
                        <i class="fas fa-exclamation-triangle"></i> Xác nhận xóa
                    </h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                
                <div class="modal-body">
                    <div class="text-center">
                        <i class="fas fa-trash fa-3x text-danger mb-3"></i>
                        <h5>Bạn có chắc chắn muốn xóa đơn hàng này?</h5>
                        <p class="text-muted">Hành động này không thể hoàn tác!</p>
                        <input type="hidden" id="delete_order_id">
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
    $('#dataTable').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Vietnamese.json"
        },
        "pageLength": 25,
        "order": [[9, "desc"]] // Sắp xếp theo ngày tạo mới nhất
    });
    
    // Xử lý nút chỉnh sửa
    $(document).on('click', '.btn-edit', function() {
        currentRow = $(this).closest('tr');
        currentRow.addClass('table-warning');
        
        // Lấy dữ liệu từ hàng được chọn
        const orderId = currentRow.find('.order-id').text();
        const customerName = currentRow.find('.customer-name').text();
        const customerGender = currentRow.find('.customer-gender').text();
        const customerEmail = currentRow.find('.customer-email').text();
        const customerAddress = currentRow.find('.customer-address').text();
        const customerPhone = currentRow.find('.customer-phone').text();
        const orderNote = currentRow.find('.order-note span').attr('title') || '';
        const paymentMethod = currentRow.find('.payment-method .badge').text();
        
        // Điền dữ liệu vào form
        $('#edit_order_id').val(orderId);
        $('#edit_hoten').val(customerName);
        $('#edit_gioitinh').val(customerGender);
        $('#edit_email').val(customerEmail);
        $('#edit_diachi').val(customerAddress);
        $('#edit_sodienthoai').val(customerPhone);
        $('#edit_ghichu').val(orderNote);
        $('#edit_phuongthucthanhtoan').val(paymentMethod);
    });
    
    // Xử lý nút xóa
    $(document).on('click', '.btn-delete', function() {
        currentRow = $(this).closest('tr');
        currentRow.addClass('table-danger');
        
        const orderId = currentRow.find('.order-id').text();
        $('#delete_order_id').val(orderId);
    });
    
    // Xử lý khi đóng modal
    $('.modal').on('hidden.bs.modal', function() {
        if (currentRow) {
            currentRow.removeClass('table-warning table-danger');
        }
    });
    
    // Xử lý xác nhận xóa
    $('#confirmDeleteBtn').click(function() {
        const orderId = $('#delete_order_id').val();
        
        if (!orderId) {
            alert('Không tìm thấy ID đơn hàng!');
            return;
        }
        
        // Hiển thị loading
        $(this).prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Đang xóa...');
        
        $.ajax({
            url: "{{ route('adminsdelete_donhang') }}",
            type: "POST",
            data: {
                _token: '{{ csrf_token() }}',
                type: 3,
                id: orderId
            },
            success: function(response) {
                if (response.success) {
                    // Hiển thị thông báo thành công
                    showAlert('success', response.success);
                    
                    // Đóng modal và xóa hàng
                    $('#deleteOrderModal').modal('hide');
                    currentRow.fadeOut(500, function() {
                        $(this).remove();
                    });
                } else {
                    showAlert('error', 'Có lỗi xảy ra khi xóa đơn hàng!');
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
    $('#editOrderForm').submit(function(e) {
        e.preventDefault();
        
        const formData = new FormData(this);
        const submitBtn = $(this).find('button[type="submit"]');
        
        // Hiển thị loading
        submitBtn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Đang cập nhật...');
        
        $.ajax({
            url: $(this).attr('action'),
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.success) {
                    showAlert('success', 'Cập nhật đơn hàng thành công!');
                    $('#editOrderModal').modal('hide');
                    
                    // Cập nhật dữ liệu trên bảng
                    updateRowData(currentRow, formData);
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
    
    // Hàm hiển thị thông báo
    function showAlert(type, message) {
        const alertClass = type === 'success' ? 'alert-success' : 'alert-danger';
        const alertIcon = type === 'success' ? 'check-circle' : 'exclamation-triangle';
        
        const alertHtml = `
            <div class="alert ${alertClass} alert-dismissible fade show" role="alert">
                <i class="fas fa-${alertIcon}"></i> ${message}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        `;
        
        // Thêm alert vào đầu trang
        $('.card').prepend(alertHtml);
        
        // Tự động ẩn sau 5 giây
        setTimeout(function() {
            $('.alert').alert('close');
        }, 5000);
    }
    
    // Hàm cập nhật dữ liệu hàng
    function updateRowData(row, formData) {
        row.find('.customer-name').text(formData.get('hoten'));
        row.find('.customer-gender').text(formData.get('gioitinh'));
        row.find('.customer-email').text(formData.get('email'));
        row.find('.customer-phone').text(formData.get('sodienthoai'));
        
        const address = formData.get('diachi');
        row.find('.customer-address').text(address.length > 30 ? address.substring(0, 30) + '...' : address);
        
        const note = formData.get('ghichu');
        if (note) {
            row.find('.order-note').html(`<span title="${note}">${note.length > 20 ? note.substring(0, 20) + '...' : note}</span>`);
        } else {
            row.find('.order-note').html('<span class="text-muted">-</span>');
        }
        
        row.find('.payment-method .badge').text(formData.get('phuongthucthanhtoan'));
    }
});
</script>
@endsection