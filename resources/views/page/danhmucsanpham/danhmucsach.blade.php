@extends('page.danhmucsanpham.danhmucsach_mater')
@section('tendanhmuc')
    {{ $danhmuc_id->tendanhmuc }}
@endsection
@section('danhmuc_tieude')
    @if (count($sach_danhmuc_id) > 0)
        {{ $danhmuc_id->tendanhmuc }}
    @else
        {{ $error }}
    @endif
@endsection
@section('loaisach')
    @foreach ($ls as $loaisach)
        @if ($loaisach->madanhmuc == $id)
            <li><a href="{{ route('loaisach/', $loaisach->id) }}" title="{{ $loaisach->tenloai }}">{{ $loaisach->tenloai }}</a>
            </li>
        @endif
    @endforeach
@endsection
@section('tacgia')
    @if (count($sach_danhmuc_id) > 0)
        @foreach ($tacgia as $sach_danhmuc_id_tacgia)
            <a href="{{ route('danhmuc/tacgia', [$danhmuc_id->id, $sach_danhmuc_id_tacgia['tacgia']]) }}"
                title="{{ $sach_danhmuc_id_tacgia['tacgia'] }}" class="checkboxs">
                <li class="checkbox">
                    <input type="radio" name="checktacgia"> {{ $sach_danhmuc_id_tacgia['tacgia'] }}<span
                        class="count">({{ $sach_danhmuc_id_tacgia['sl'] }})</span>
                    <span class="delete"></span>
                </li>
            </a>
        @endforeach
    @else
    @endif
@endsection
@section('sanpham')
    @if (count($sach_danhmuc_id) > 0)
        @foreach ($sach_danhmuc_id as $sach_danhmuc_ids)
            <div class="product">
                <div class="image">
                    <div style="position: relative;">
                        <a href="{{ route('chitietsanpham', $sach_danhmuc_ids->id) }}"><img
                                src="{{ Storage::disk('book')->url($sach_danhmuc_ids->anhbia) }}" alt=""
                                class=""></a>
                        @if ($sach_danhmuc_ids->khuyenmai > 0)
                            <span class="saleprice"
                                style="background:url({{ url('public/image/saleprice.png') }}) no-repeat;">{{ $sach_danhmuc_ids->khuyenmai }}%</span>
                        @endif
                    </div>
                    <a href="{{ route('chitietsanpham', $sach_danhmuc_ids->id) }}">
                        <div class="product_name" title="{{ $sach_danhmuc_ids->tensach }}">
                            {{ $sach_danhmuc_ids->tensach }}</div>
                    </a>
                    <div class="product_composer">{{ $sach_danhmuc_ids->tacgia }}</div>
                    <div class="prices">
                        {{ number_format($sach_danhmuc_ids->dongia - ($sach_danhmuc_ids->dongia * $sach_danhmuc_ids->khuyenmai) / 100, 0, ',', '.') }}₫
                    </div>
                    <div class="rootprices">{{ number_format($sach_danhmuc_ids->dongia, 0, ',', '.') }}₫</div>
                </div>
            </div>
        @endforeach
    @else
    @endif
@endsection
@section('nhaxuatban')
    @if (count($sach_danhmuc_id) < 1)
    @else
        @foreach ($nxbs as $sach_nxb_id)
            @foreach ($nxb as $nhaxuatban)
                @if ($nhaxuatban->id == $sach_nxb_id['nxb'])
                    <a href="/danh-muc/1/sach-kinh-te.html?field2=4" title="Thái Hà">
                        <li class="checkbox">
                            <input type="radio" name="checknxb"> {{ $nhaxuatban->tennhaxuatban }}</i> <span
                                class="count">({{ $sach_nxb_id['sl'] }})</span>
                            <span class="delete"></span>
                        </li>
                    </a>
                @else
                @endif
            @endforeach
        @endforeach
    @endif
@endsection
