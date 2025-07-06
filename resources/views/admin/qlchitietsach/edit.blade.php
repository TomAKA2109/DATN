@extends('admin.admin')

@section('css')
    <style>
        table tr {
            line-height: 2.5;
        }

        table tr .first_td {
            width: 150px;
            font-weight: bold;
            font-size: 120%;
        }

        table tr .second_td {
            padding-left: 30px;
        }

        .text {
            width: 820px;
            height: 40px;
        }
    </style>
@endsection

@section('')
    <li class="nav-item active">
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
        <form action="{{ url('/admin/qlchitietsach/'.$chitietsach->masach) }}" method="post">
            {{ csrf_field() }}
            @method('PUT')
            <table style="width: 1000px;margin: auto;">
                <tr>
                    <td colspan="2">
                        <center>
                            <h2>Sửa thông tin chi tiết sản phẩm</h2>
                        </center>
                    </td>
                </tr>
                <tr>
                    <td class="first_td"><label>Tên sách:</label></td>
                    <td class="second_td">{{ $book->tensach }}</td>
                </tr>
                <tr>
                    <td class="first_td"><label>Ngôn ngữ:</label></td>
                    <td class="second_td">
                        <select name="ngonngu" style="width: 820px;height: 40px;">
                            @foreach ($ngonngu as $tenngonngu)
                                <option value="{{ $tenngonngu->id }}" {{ old('ngonngu') == $tenngonngu->id ? 'selected' : '' }}>
                                    {{ $tenngonngu->ten }}
                                </option>
                            @endforeach
                        </select>
                        @error('ngonngu')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td class="first_td"><label>Số trang:</label></td>
                    <td class="second_td">
                        <input type="text" class="text" name="sotrang" required value="{{ old('sotrang', $chitietsach->sotrang) }}">
                        @error('sotrang')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td class="first_td"><label>Năm xuất bản:</label></td>
                    <td class="second_td">
                        <input type="text" class="text" name="namxuatban" required value="{{ old('namxuatban', $chitietsach->namxuatban) }}">
                        @error('namxuatban')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td class="first_td"><label>Kích thước:</label></td>
                    <td class="second_td">
                        <input type="text" class="text" name="kichthuoc" required value="{{ old('kichthuoc',$chitietsach->kichthuoc) }}">
                        @error('kichthuoc')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td class="first_td"><label>Trọng lượng:</label></td>
                    <td class="second_td">
                        <input type="text" class="text" name="trongluong" required value="{{ old('trongluong', $chitietsach->trongluong) }}">
                        @error('trongluong')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td class="first_td"><label>Ngày phát hành:</label></td>
                    <td class="second_td">
                        <input type="text" class="text" name="ngayphathanh" required value="{{ old('ngayphathanh', $chitietsach->ngayphathanh) }}">
                        @error('ngayphathanh')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td class="first_td"><label>Mô tả:</label></td>
                    <td class="second_td">
                        <textarea rows="4" cols="54" name="noidung">{{ old('noidung', $chitietsach->noidung) }}</textarea>
                        @error('noidung')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center;">
                        <br>
                        <button type="submit" class="btn btn-success" style="width: 100px;">Cập nhật</button>
                        <button type="reset" class="btn btn-default" style="width: 100px;">Reset</button>
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
    </script>
@endpush
