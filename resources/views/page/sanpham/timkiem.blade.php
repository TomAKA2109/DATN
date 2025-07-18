@extends('page.danhmucsanpham.danhmucsach_mater')

@section('title')
    Tìm kiếm sản phẩm
@endsection

@section('tendanhmuc')
    Tìm kiếm sản phẩm với từ khóa:"{{ $key }}"
@endsection

@section('danhmuc_tieude')
    @if(count($sach) < 1)
        {{ $error }}
    @else
        Tìm Kiếm Sản Phẩm Với Từ Khóa: "{{ $key }}" - Tìm Thấy {{ count($sach) }} Kết Quả
    @endif
@endsection

@section('loaisach')
    @if(count($sach) >= 1)
            @foreach($loaisach as $ls_sach)
                @if($ls_sach['maloai'])
                    <li>
                        <a href="{{ route('loaisach', $ls_sach['maloai']) }}" >
                            ({{ $ls_sach['sl'] }})
                        </a>
                    </li>
                @endif
            @endforeach
    @endif
@endsection

@section('tacgia')
    @if(count($sach) >= 1)
        @foreach($tacgia as $sach_danhmuc_id_tacgia)
            <a href="" title="Nhiều tác giả">
                <li class="checkbox">
                    <i class="fa fa-square-o"></i> {{ $sach_danhmuc_id_tacgia['tacgia'] }} ({{ $sach_danhmuc_id_tacgia['sl'] }})
                    <span class="count"></span>
                    <span class="delete"></span>
                </li>
            </a>
        @endforeach
    @endif
@endsection

@section('sanpham')
    @if(count($sach) > 0)
        @foreach($sach as $sach_danhmuc_id)
            <div class="product">
                <div class="image">
                    <div style="position: relative;">
                        <a href="{{ route('chitietsanpham', $sach_danhmuc_id->id) }}">
                            <img src="{{ Storage::disk('book')->url($sach_danhmuc_id->anhbia) }}" alt="">
                        </a>
                        @if($sach_danhmuc_id->khuyenmai > 0)
                            <span class="saleprice" style="background:url({{ url('/image/saleprice.png') }}) no-repeat;">
                                {{ $sach_danhmuc_id->khuyenmai }}%
                            </span>
                        @endif
                    </div>
                    <a href="{{ route('chitietsanpham', $sach_danhmuc_id->id) }}">
                        <div class="product_name" title="{{ $sach_danhmuc_id->tensach }}">
                            {{ $sach_danhmuc_id->tensach }}
                        </div>
                    </a>
                    <div class="product_composer">{{ $sach_danhmuc_id->tacgia }}</div>
                    <div class="prices">
                        {{ number_format($sach_danhmuc_id->dongia - $sach_danhmuc_id->dongia * $sach_danhmuc_id->khuyenmai / 100, 0, ",", ".") }}₫
                    </div>
                    <div class="rootprices">
                        {{ number_format($sach_danhmuc_id->dongia, 0, ",", ".") }}₫
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <div style="padding: 20px; font-size: 18px; color: gray;">
            <i class=""></i> Hiện tại chúng tôi chưa có sách phù hợp với từ khóa bạn đang tìm!
        </div>
    @endif
@endsection


