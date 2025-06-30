@extends('admin.admin')
@section('danhmuc')
	<li class="nav-item active" >
          <a class="nav-link" href="">
            <i class="fas fa-fw fa-table"></i>
            <span>Quản lý danh mục</span></a>
    </li>
@endsection()
@section('tenbang')
	<ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Danh mục sách</a>
            </li>
            <li class="breadcrumb-item active">Tables</li>
	</ol>
@endsection
@section('table')
<div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Data Table Example
              <a> <input type="button" value="Thêm Danh Mục" id="btnadd" data-target="#insertmodal" data-toggle="modal" /></div>
            <div class="card-body"></a>
              <div class="table-responsive">
	<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
						<th>Tên danh mục</th>
						<th>Ảnh </th>
						<th>Thứ tự hiển thị</th>
						<th>Created_at</th>
						<th>Update_at</th>
                       	<th>Edit</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($danhmuc as $danhmuc)
                        <tr>
                        <td><label id="lblid" style="display: none;">{{ $danhmuc->id }}</label><label id="lbltendanhmuc">{{ $danhmuc->tendanhmuc }}</label></td>
                        <td><label id="lblanhdaidien"><img src="{{ url('/image').'/'.$danhmuc->anhdaidien }}" alt="not image" style="width: 120px;"></td>
                        <td><label id="lblthutu">{{ $danhmuc->thutu }}</td>
                        <td><label id="lblcreated_at">{{$danhmuc->created_at }}</td>
                        <td><label id="lblupdated_at">{{ $danhmuc->updated_at }}</td>
                        <td>
                            <img src="{{ asset('/image/delete.png') }}" onclick="deleteclk(this);" data-toggle="modal" data-target="#exampleModalCenter">
                            <img src="{{ asset('/image/edit.png') }}" onclick="Editdatas(this);"data-toggle="modal" data-target="#update_danhmuc">
                        </td>
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
	<div class="modal fade" id="insertmodal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div style="background-color: white;width: 500px;">
                    <button type="button" class="close mr-2" data-dismiss="modal">&times;</button>
                    <form action="{{ route('adminsqldanhmuc/insert') }}" method="post" enctype="multipart/form-data" id="insert_form">
                        <table style="width: 100%;">
                        {{ csrf_field() }}
                        <tr>
                            <td colspan="2" class="text-center font-weight-bold p-3">
                                <h3>Thêm danh mục sản phẩm</h3>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group pl-3 pr-3">
                                  <label>Tên danh mục:</labe>
                                  	<input type="text" name="is_tendanhmuc" id="is_tendanhmuc" placeholder="Tên danh mục" class="form-control">
                                </div>
                            </td>
                        </tr>
                        <tr>
                        	<td>
                                <div class="form-group pl-3 pr-3">
                                    <label>Ảnh:</label>
                                    <input type="file" id="is_files" name="is_files" class="form-control">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div class="form-group pl-3 pr-3">
                                    <label>Thứ tự hiển thị:</label>
                                    <input type="number" class="form-control" name="is_thutu" id="is_thutu" placeholder="Thứ tự hiển thị" />
                                </div>
                            </td>
                        </tr>
                    </table> 
                    <div class="text-center">
                        <input type="submit" class="btn btn-success m-3" value="Thêm" style="width: 100px;" id="them"><button class="btn btn-success m-3" style="width: 100px;" data-dismiss="modal">Hủy</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
      <div class="modal fade" id="update_danhmuc">
          <div class="modal-dialog">
              <div class="modal-content" >
              <div style="background-color: white;margin: auto;width: 500px;" id="editkh">
                <button type="button" class="close mr-2" data-dismiss="modal" onclick="CloseEditdatasDialog();">&times;</button>
                 <form action="{{ route('adminsqldanhmuc/update') }}" method="post" enctype="multipart/form-data" id="update_form">
                <table style="width:100%;">
                  {{ csrf_field() }}
                  <tr>
                    <td colspan="2" class="text-center font-weight-bold p-3"><h3>Edit danh mục sách</h3></td>
                  </tr>
                  <tr>
                  <tr>
                  	<td><input type="text" id="ud_id" name="ud_id" style="display: none;"></td>
                  </tr>
                    <td>
                      <div class="form-group pl-3 pr-3">
                      <label>Tên danh mục:</label>
                      <input type="text" name="ud_tendanhmuc" class="form-control" id="ud_tendanhmuc">
                        </div>
                    </td>
                  </tr>
                  <tr>
	                	<td>
	                        <div class="form-group pl-3 pr-3">
	                            <label>Ảnh:</label>
	                            <input type="file" id="up_files" name="up_files" class="form-control">
	                        </div>
	                    </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div class="form-group pl-3 pr-3">
                                    <label>Thứ tự hiển thị:</label>
                                    <input type="number" class="form-control" name="ud_thutu" id="ud_thutu" placeholder="Thứ tự hiển thị" />
                                </div>
                            </td>
                        </tr>
                    </table>
      <div class="text-center">
        <input type="submit" class="btn btn-success m-3" style="width: 100px;" value="Sửa">
        <button class="btn btn-success m-3" style="width: 100px;" data-dismiss="modal" onclick="CloseEditdatasDialog();">Hủy</button>
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
      var id,tendanhmuc,anh,thutuhienthi,create,update;
         $(document).ready(function(){
         $('#insert_form').on('submit', function(event){
          event.preventDefault();
          $('#insertmodal').modal('toggle');
          $.ajax({
           url:"{{ route('adminsqldanhmuc/insert')}}",
           method:"POST",
            _token:'{{ csrf_token() }}',
           data:new FormData(this),
           dataType:'JSON',
           contentType: false,
           cache: false,
           processData: false,
           success:function(data)
           {
            alert(data.success);
            location.assign("{{ url('admin/qldanhmuc') }}");
           }
          })
         });

        });
      $(document).ready(function(){
         $('#update_form').on('submit', function(event){
          event.preventDefault();
          $('#update_sach').modal('toggle');
          $.ajax({
           url:"{{ route('adminsqldanhmuc/update')}}",
           method:"POST",
            _token:'{{ csrf_token() }}',
           data:new FormData(this),
           dataType:'JSON',
           contentType: false,
           cache: false,
           processData: false,
           success:function(data)
           {
            alert(data.success);
            // $("#lblmaloai",row).text($("#udloaisach").text());
            // $("#lbltensach",row).text($("#txttensach").val());
            // $("#lbltacgia",row).text($("#txttacgia").val());
            // $("#lblsoluong",row).text($("#txtsoluong").val());
            // $("#lbldongia",row).text($("#txtdongia").val());
            // $("#lblluotxem",row).text($("#txtluotxem").val());
            // $("#lblluotmua",row).text($("#txtluotmua").val());
            // $("#lblkhuyenmai",row).text($("#txtkhuyenmai").val());
            row.removeClass("highlightRow");
            CloseEditdatasDialog();
            location.assign("{{ url('admin/qldanhmuc') }}");
           }
          })
         });

        });
      function deletedatas(editButton) {
            id=$("#idsach").text();
            var url = "{{ route('adminsqldanhmuc/delete')}}"; 
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
            id=$("#lblid",row).text();
            tendanhmuc=$("#lbltendanhmuc",row).text();
            thutuhienthi=$("#lblthutu",row).text();
            DisplayEditdatasDialog();
            return false;
        }
        function deleteclk(editButton){
            row = $(editButton).parent().parent();
            id = $("#lblid", row).text();
            $("#idsach").text(id);
            row.addClass("highlightRow");
            return false;
        }
      function DisplayEditdatasDialog() {
          $("#ud_id").val(id);
          $("#ud_tendanhmuc").val(tendanhmuc);
          $("#ud_thutu").val(thutuhienthi);
         
      }
      function CloseEditdatasDialog() {
          $("#updatemodel").hide();
          row.removeClass("highlightRow");
      }
      // $(function () {
      //      $('#upfiles').change(function () {
      //           var path = $(this).val();
      //          if (path != '' && path != null) {
      //              var q ="{{ asset('/image/anhsanpham').'/' }}"+path.substring(path.lastIndexOf('\\') + 1);
      //              $("#ud_anhbia").attr('src',q); 
      //          }
      //      })
      //   })
    </script>
@endsection