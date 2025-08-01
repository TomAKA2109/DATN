@extends('admin.admin')
@section('css')
    <style>
      table tr{
        line-height: 2.5;
      }
      table tr .first_td{
      width: 150px;
      font-weight: bold;
      font-size: 120%;
    }
    table tr .second_td{
      padding-left: 30px;
    }
    .text{
      width: 820px;
      height: 40px;
    }
    </style>
@endsection
@section('')
	<li class="nav-item active" >
          <a class="nav-link" href="">
            <i class="fas fa-fw fa-table"></i>
            <span>Quản lý chi tiết sách</span></a>
    </li>
@endsection()
@section('tenbang')
	<ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Chi tiết sách</a>
            </li>
            <li class="breadcrumb-item active">Thêm chi tiết</li>
	</ol>
@endsection
@section('table')
<div style="width: 1140px;margin: auto;">
    <form id="formChitietSach" action="{{ route('adminsqlchitietsach/insert/post') }}" method="post">
      {{ csrf_field() }}
      <table style="width: 1000px;margin: auto;">
    <tr>
      <td colspan="2"><center><h2>Thêm chi tiết sách</h2></center></td>
    </tr>
    <tr>
      <td class="first_td"><label>Tên sách:</label></td>
      <td class="second_td">
        <input type="text" class="text" name="tensach" required="">
      </td>
    </tr>
    <tr>
      <td class="first_td"><label>Ngôn ngữ:</label></td>
      <td class="second_td"><select name="ngonngu"style="width: 820px;height: 40px;">
                                  @foreach($ngonngu as $tenngonngu)
                                        <option value="{{ $tenngonngu->id }}">
                                     {{ $tenngonngu->ten}}
                                    </option>
                                  @endforeach
                                  </select></td>
    </tr>
    <tr>
      <td class="first_td"><label>Số trang:</label></td>
      <td class="second_td"><input type="text" class="text" name="sotrang" required=""></td>
    </tr>
    <tr>
      <td class="first_td"><label>Năm xuất bản:</label></td>
      <td class="second_td"><input type="text" class="text" name="namxuatban" required=""></td>
    </tr>
    <tr>
      <td class="first_td"><label>Kích thước:</label></td>
      <td class="second_td"><input type="text" class="text" name="kichthuoc" required=""></td>
    </tr>
    <tr>
      <td class="first_td"><label>Trọng lượng:</label></td>
      <td class="second_td"><input type="text" class="text" name="trongluong" required=""></td>
    </tr>
    <tr>
      <td class="first_td"><label>Ngày phát hành:</label></td>
      <td class="second_td"><input type="text" class="text" name="ngayphathanh" required=""></td>
    </tr>
    <tr>
      <td class="first_td"><label>Mô tả:</label></td>
      <td class="second_td" >
        <textarea rows="4" cols="54" name="noidung"></textarea>
      </td>
    </tr>
    <tr>
      <td colspan="2" style="text-align: center;"><br><input type="submit" value="Thêm" style="width: 100px;">
        <input type="reset" style="width: 100px;">
      </td>
    </tr>
  </table>
    </form>
  </div>
@endsection

@push('js')
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
    <script>
     CKEDITOR.replace('noidung');
     document.getElementById('formChitietSach').addEventListener('submit', function (e) {
      let fields = [
        'tensach',
        'sotrang',
        'namxuatban',
        'kichthuoc',
        'trongluong',
        'ngayphathanh'
      ];

      for (let i = 0; i < fields.length; i++) {
        let field = document.getElementsByName(fields[i])[0];
        if (!field || field.value.trim() === '') {
          alert('Vui lòng nhập đầy đủ thông tin vào trường: ' + fields[i]);
          field.focus();
          e.preventDefault();
          return;
        }
      }

      // Kiểm tra CKEditor (nội dung mô tả)
      let mota = CKEDITOR.instances.noidung.getData().trim();
      if (mota === '') {
        alert('Vui lòng nhập nội dung mô tả.');
        CKEDITOR.instances.noidung.focus();
        e.preventDefault();
        return;
      }
    });
    </script>
@endpush