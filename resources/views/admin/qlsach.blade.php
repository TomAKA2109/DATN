@extends('admin.admin')
@section('sach')
	<li class="nav-item active" >
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
              <a> <button class="btn btn-success" id="btnadd" data-target="#insertmodal" data-toggle="modal">Thêm mới</button></div>
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
                        <td><img src="{{ asset('/image/anhsanpham')."/".$sach->anhbia }}" alt=""id="lblanhbia" style="width: 120px;"></td>
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
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
          </div>
@endsection
@section('model')
	<div class="modal fade" id="insertmodal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div style="background-color: white;width: 700px;">
                    <button type="button" class="close mr-2" data-dismiss="modal">&times;</button>
                    <form action="{{ route('adminsqlsach/insert')}}" method="post" enctype="multipart/form-data" id="upload_form">
                        <table style="width: 100%;">
                        {{ csrf_field() }}
                        <tr>
                            <td colspan="2" class="text-center font-weight-bold p-3">
                                <h3>Thêm sản phẩm</h3>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group pl-3 pr-3">
                                  <label>Loại sách:</labe>
                                  <select name="loaisach" id="isloaisach" class="form-control" style="width: 200px;">
                                  @foreach($_loaisach as $loaisach)
                                    <option value="{{ $loaisach->id }}">{{ $loaisach->tenloai }}</option>>
                                  @endforeach
                                  </select>
                                </div>
                            </td>
                            <td>
                                <div class="form-group pl-3 pr-3">
                                  <label>Nhà xuất bản:</labe>
                                  <select name="nxb" id="isnxb" class="form-control" style="width: 200px;">
                                  @foreach($_nhaxuatban as $nhaxuatban)
                                    <option value="{{ $nhaxuatban->id }}">{{ $nhaxuatban->tennhaxuatban }}</option>>
                                  @endforeach
                                  </select>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div class="form-group pl-3 pr-3">
                                    <label>Tên sách:</label>
                                    <input type="text" class="form-control" name="tensach" id="istensach" placeholder="Tên sách" />
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group pl-3 pr-3">
                                    <label>Tác giả:</label>
                                    <input type="text" class="form-control" name="tacgia" id="istacgia" placeholder="Tác giả" />
                                </div>
                            </td>
                            <td>
                                <div class="form-group pl-3 pr-3">
                                    <label>Số lượng:</label>
                                    <input type="text" class="form-control" name="soluong" id="issoluong" placeholder="Số lượng" />
                                </div>
                            </td>
                            <td>
                                <div class="form-group pl-3 pr-3">
                                    <label>Đơn giá:</label>
                                    <input type="number" class="form-control" name="dongia" id="isdongia" placeholder="Đơn giá" min="0" /> 
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group pl-3 pr-3">
                                    <label>Ảnh bìa:</label>
                                    <input type="file" id="myfiles" name="select_file" class="form-control">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group pl-3 pr-3">
                                    <label>Khuyến mãi:</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="inlineFormInputGroupUsername" />
                                         <div class="input-group-text">%</div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group pl-3 pr-3">
                                    <label>Tập:</label>
                                    <input type="number" class="form-control" name="tap" id="istap" min="0" placeholder="tập số">
                                </div>
                            </td>
                            <td>
                                <div class="form-group pl-3 pr-3">
                                    <label>Số tập:</label>
                                    <input type="number" class="form-control" name="sotap" id="issotap" min="0" placeholder="Số tập">
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
      <div class="modal fade" id="update_sach">
          <div class="modal-dialog">
              <div class="modal-content" >
              <div style="background-color: white;margin: auto;width: 700px;" id="editkh">
                <button type="button" class="close mr-2" data-dismiss="modal" onclick="CloseEditdatasDialog();">&times;</button>
                 <form action="{{ route('adminsqlsach/update')}}" method="post" enctype="multipart/form-data" id="update_form">
                <table style="width:100%;">
                  {{ csrf_field() }}
                  <tr>
                    <td colspan="2" class="text-center font-weight-bold p-3"><h3>Edit sách</h3></td>
                  </tr>
                  <tr>
                    <td>
                      <div class="form-group pl-3 pr-3" style="display: none">
                      <label>Mã sách:</label>
                      <input type="text" name="ud_masach" class="form-control" id="txtidsach">
                        </div>
                    </td>
                    <td></td>
                  </tr>
                  <tr>
                            <td>
                                <div class="form-group pl-3 pr-3">
                        <label>Loại sách:</labe>
                        <select name="ud_loaisach" id="udloaisach" class="form-control" style="width: 200px;">
                        @foreach($_loaisach as $loaisach)
                            <option value="{{ $loaisach->id }}" id="loaisach">{{ $loaisach->tenloai }}</option>
                        @endforeach
                        </select>
                      </div>
                            </td>
                            <td>
                                <div class="form-group pl-3 pr-3">
                        <label>Nhà xuất bản:</labe>
                        <select name="ud_nxb" id="udnhaxuatban" class="form-control" style="width: 200px;">
                        @foreach($_nhaxuatban as $nhaxuatban)
                          <option value="{{ $nhaxuatban->id }}">{{ $nhaxuatban->tennhaxuatban }}</option>
                        @endforeach
                        </select>
                      </div>
                            </td>
                        </tr>
                  <tr>
                            <td colspan="2">
                                <div class="form-group pl-3 pr-3">
                                    <label>Tên sách:</label>
                                    <input type="text" class="form-control" name="ud_tensach" id="txttensach" placeholder="Tên sách" />
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group pl-3 pr-3">
                                    <label>Tác giả:</label>
                                    <input type="text" class="form-control" name="ud_tacgia" id="txttacgia" placeholder="Tác giả" />
                                </div>
                            </td>
                            <td>
                                <div class="form-group pl-3 pr-3">
                                    <label>Số lượng:</label>
                                    <input type="text" class="form-control" name="ud_soluong" id="txtsoluong" placeholder="Số lượng" />
                                </div>
                            </td>
                            <td>
                                <div class="form-group pl-3 pr-3">
                                    <label>Đơn giá:</label>
                                    <input type="number" class="form-control" name="ud_dongia" id="txtdongia" placeholder="Đơn giá" min="0"  /> 
                                </div>
                            </td>
                        </tr>
                        <tr>
                          <td>
                            <div class="form-group pl-3 pr-3">
                                    <label>Ảnh bìa:</label>
                                    <input type="file" id="upfiles" name="up_file" class="form-control">
                                </div>
                          </td>
                          <td>
                             <img src="" alt="" id="ud_anhbia" name="ud_anhbia" style="padding-left:50px;height: 120px;">
                          </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group pl-3 pr-3">
                                    <label>Khuyến mãi:</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="inlineFormInputGroupUsername" />
                                         <div class="input-group-text">%</div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                          <td>
                                <div class="form-group pl-3 pr-3">
                                    <label>Tập:</label>
                                    <input type="number" class="form-control" name="ud_tap" id="txttap" min="0" placeholder="tập số">
                                </div>
                            </td>
                            <td>
                                <div class="form-group pl-3 pr-3">
                                    <label>Số tập:</label>
                                    <input type="number" class="form-control" name="ud_sotap" id="txtsotap" min="0" placeholder="Số tập">
                                </div>
                            </td>
                        </tr>
                    </table>
      <div class="text-center">
        {{-- <button class="btn btn-success m-3" style="width: 100px;" data-dismiss="modal" onclick="Updatesdatas(); return false;">Sửa</button> --}}
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
      var id,loaisach,nhaxuatban,tensach,soluong,dongia,luotxem,luotmua,khuyenmai,tap,sotap,anhbia,files;
         $(document).ready(function(){
         $('#upload_form').on('submit', function(event){
            event.preventDefault();
                $.ajax({
                url:"{{ route('adminsqlsach/insert')}}",
                method:"POST",
                _token:'{{ csrf_token() }}',
                data:new FormData(this),
                dataType:'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success:function(data) {
                    location.reload();
                }
            })
        });

        });
      $(document).ready(function(){
         $('#update_form').on('submit', function(event){
          event.preventDefault();
          $.ajax({
           url:"{{ url('admin/qlsach/update')}}",
           method:"POST",
            _token:'{{ csrf_token() }}',
           data:new FormData(this),
           dataType:'JSON',
           contentType: false,
           cache: false,
           processData: false,
           success:function(data)
           {
                alert(data.ok);
                $("#lblmaloai",row).text($("#udloaisach option:selected").text());
                $("#lbltensach",row).text($("#txttensach").val());
                $("#lbltacgia",row).text($("#txttacgia").val());
                $("#lblsoluong",row).text($("#txtsoluong").val());
                $("#lbldongia",row).text($("#txtdongia").val());
                $("#lblluotxem",row).text($("#txtluotxem").val());
                $("#lblluotmua",row).text($("#txtluotmua").val());
                $("#lblkhuyenmai",row).text($("#txtkhuyenmai").val());
                row.removeClass("highlightRow");
                CloseEditdatasDialog();
                //location.assign('{{ url('admin/qlsach') }}');
                location.reload();
           }
          })
         });

        });
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
            loaisach=$("#lblmaloai",row).text();
            nhaxuatban=$("#lblmanxb",row).text();
            tensach=$("#lbltensach",row).text();
            tacgia=$("#lbltacgia",row).text();
            soluong=$("#lblsoluong",row).text();
            dongia=$("#lbldongia",row).text();
            luotxem=$("#lblluotxem",row).text();
            luotmua=$("#lblluotmua",row).text();
            khuyenmai=$("#lblkhuyenmai",row).text();
            tap=$("#lbltap",row).text();
            sotap=$("#lblsotap",row).text();
            anhbia=$("#lblanhbia",row).attr('src');
            row.addClass("highlightRow");
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