@extends('admin.admin')
@section('css')
@parent
@endsection
@section('donhang')
	<li class="nav-item active" >
          <a class="nav-link" href="">
            <i class="fas fa-fw fa-table"></i>
            <span>Quản lý đơn hàng</span></a>
    </li>
@endsection()
@section('tenbang')
	<ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Đơn hàng</a>
            </li>
            <li class="breadcrumb-item active">Tables</li>
	</ol>
@endsection
@section('table')
<div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Data Table Example
              <div class="table-responsive">
  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID Khách hàng</th>
                      <th>Họ tên</th>
                      <th>Giới</th>
                      <th>email</th>
                      <th>Địa chỉ</th>
                      <th>Số điện thoại</th>
                      <th>Ghi chú</th>
                      <th>Thanh toán</th>
                      <th>Tổng tiền</th>
                      <th>Ngày lập</th>  
                      <!-- <th>Edit</th> -->
                      <th>Chi tiết hóa đơn</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($dondathang as $dondathangs)
                        <tr>
                        <td><label id="lblid" style="display: none;">{{ $dondathangs->id }}</label><label id="lblmakh">{{ $dondathangs->id_khachhang }}</label></td>
                        <td><label id="lbltenkh">{{ $dondathangs->hoten }}</td>
                        <td><label id="lblgiotinh">{{ $dondathangs->gioitinh }}</td>
                        <td><label id="lblemail">{{ $dondathangs->email }}</td>
                        <td><label id="lbldiachi">{{ $dondathangs->diachi }}</td>
                        <td><label id="lblsdt">{{ $dondathangs->sodienthoai }}</td>
                        <td><label id="lblghichu" style="overflow: hidden;">{{ $dondathangs->ghichu }}</td>
                        <td><label id="lblphuongthucthanhtoan">{{ $dondathangs->phuongthucthanhtoan }}</td>
                        <td><label id="lbltongtien">{{ number_format($dondathangs->tongtien,0,".",".") }}</td>
                        <td>{{ $dondathangs->created_at }}</td>
                        <!-- <td>
                            <img src="{{ asset('/image/delete.png') }}" onclick="deleteclk(this);" data-toggle="modal" data-target="#exampleModalCenter">
                            <img src="{{ asset('/image/edit.png') }}" onclick="Editdatas(this);"data-toggle="modal" data-target="#update_sach">
                        </td> -->
                        <td style="text-align: center;"><a href="{{ route('adminschitietdonhang',$dondathangs->id) }}"><input type="button" value="ctdh"></a></td>
                        </tr\>
                    @endforeach
                    </tbody>
                </table>
                </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
          </div>
@endsection
@section('model')
      <div class="modal fade" id="update_sach">
          <div class="modal-dialog">
              <div class="modal-content" >
              <div style="background-color: white;margin: auto;width: 700px;" id="editkh">
                <button type="button" class="close mr-2" data-dismiss="modal" onclick="CloseEditdatasDialog();">&times;</button>
                 <form action="{{ route('adminsdelete_donhang') }}" method="post" enctype="multipart/form-data" id="update_form">
                <table style="width:80%;margin:auto;" id="table_cthd">
                  {{ csrf_field() }}
                  <tr style="border:0;">
                    <td colspan="2" class="text-center font-weight-bold p-3"><h3>Sửa đơn hàng</h3></td>
                  </tr>
                </table>
      <div class="text-center">
        <input type="submit" class="btn btn-success m-3" style="width: 100px;" value="Sửa">
        <button class="btn btn-success m-3" style="width: 100px;" data-dismiss="modal" onclick="CloseEditdatasDialog();">Hủy</button>
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
        <h5 class="modal-title" id="exampleModalLongTitle">Xóa đơn hàng </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="CloseEditdatasDialog();">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Bạn có chắc chắn muốn xóa đơn hàng này <label id="idhd" style="display: none;"></label> ?
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
      var id;
      // $(document).ready(function(){
      //    $('#update_form').on('submit', function(event){
      //     event.preventDefault();
      //     $('#update_sach').modal('toggle');
      //     $.ajax({
      //      url:"{{ url('admin/qlsach/update')}}",
      //      method:"POST",
      //       _token:'{{ csrf_token() }}',
      //      data:new FormData(this),
      //      dataType:'JSON',
      //      contentType: false,
      //      cache: false,
      //      processData: false,
      //      success:function(data)
      //      {
      //       alert(data.ok);
      //       $("#lblmaloai",row).text($("#udloaisach option:selected").text());
      //       $("#lbltensach",row).text($("#txttensach").val());
      //       $("#lbltacgia",row).text($("#txttacgia").val());
      //       $("#lblsoluong",row).text($("#txtsoluong").val());
      //       $("#lbldongia",row).text($("#txtdongia").val());
      //       $("#lblluotxem",row).text($("#txtluotxem").val());
      //       $("#lblluotmua",row).text($("#txtluotmua").val());
      //       $("#lblkhuyenmai",row).text($("#txtkhuyenmai").val());
      //       row.removeClass("highlightRow");
      //       CloseEditdatasDialog();
      //       //location.assign('{{ url('admin/qlsach') }}');
      //      }
      //     })
      //    });

      //   });
      function deletedatas(editButton) {
            id=$("#idhd").text();
            var url = "{{ route('adminsdelete_donhang') }}"; 
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
                $('#exampleModalCenter').modal('hide');
                row.removeClass("highlightRow");
                $(row).remove();
                      }
                else {
                alert('There is some error during delete');
                row.removeClass("highlightRow");
                      }
                      }
                      });
                // return false;
        }
      function Editdatas(editButton) {
            row = $(editButton).parent().parent();
            row.addClass("highlightRow");
            DisplayEditdatasDialog();
            return false;
        }
        function deleteclk(editButton){
            row = $(editButton).parent().parent();
            id = $("#lblid", row).text();
            $("#idhd").text(id);
            row.addClass("highlightRow");
            return false;
        }
      function DisplayEditdatasDialog() {
          id=$("#lblid",row).text();
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