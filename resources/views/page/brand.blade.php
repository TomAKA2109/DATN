@extends('master')

@section('content')
<div class="container mt-4">
    <h3 class="mb-3">Sách thuộc thương hiệu: <strong>{{ $brand }}</strong></h3>

    @if(count($sach_theo_thuonghieu) > 0)
        <div class="row">
            @foreach($sach_theo_thuonghieu as $sach)
                <div class="col-md-3 mb-4">
                    <div class="card h-100">
                        <img src="{{ asset('image/'.$sach->hinhanh) }}" class="card-img-top" alt="{{ $sach->tensach }}" style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $sach->tensach }}</h5>
                            <p class="card-text">{{ number_format($sach->gia, 0, ',', '.') }} VND</p>
                            <a href="{{ route('chitietsanpham', ['id' => $sach->id]) }}" class="btn btn-primary btn-sm">Xem chi tiết</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p>Không tìm thấy sách nào thuộc thương hiệu này.</p>
    @endif
</div>
@endsection
