@section('content')
	<div id="content">
		<h2 class="title_pd"><a href="" class="title">Sách mới</a><span class="css"></span><a href="{{ route('loaisach',1) }}" class="more">Xem tất cả</a></h2>
		<div class="list_pd">
			@php
				$dem=1;
				$sbc=1;
				$sgg=1;
			@endphp
		@foreach($sach as $sachmoi)
			@if(($dem<=5))
			@php
				$dem=$dem+1;
			@endphp
			<div class="product">
				<div class="image">
					<div style="position: relative;">
					<a href="{{ route('chitietsanpham',$sachmoi->id) }}"><img src="{{ asset('/image/anhsanpham/' . $sachmoi->anhbia) }}" alt="{{ $sachmoi->tensach }}"></a>
					@if($sachmoi->khuyenmai>0)
					<span class="saleprice" style="background:url({{ url('/image/saleprice.png') }}) no-repeat;">{{ $sachmoi->khuyenmai }}%</span>
					@endif
					</div>
					<a href="{{ route('chitietsanpham',$sachmoi->id) }}"><div class="product_name" title="{{ $sachmoi->tensach }}">{{ $sachmoi->tensach }}</div></a>
					<div class="product_composer"><a href="">{{ $sachmoi->tacgia }}</a></div>
					<div class="prices">{{ number_format($sachmoi->dongia-$sachmoi->dongia*$sachmoi->khuyenmai/100,0,",",".")}}₫</div>
					<div class="rootprices">{{ number_format($sachmoi->dongia,0,",",".") }}₫</div>
					<div class="rating">
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star"></span>
					<span class="fa fa-star"></span>
					<span class="comment">(30 nhận xét)</span></div>
				</div>
			</div>
			@endif
		@endforeach
		</div>
		<h2 class="title_pd"><a href="" class="title">Sách giảm giá</a><span class="css"></span><a href="{{ route('loaisach',2) }}" class="more">Xem tất cả</a></h2>
		<div class="list_pd">
		@foreach($sach as $sachgiamgia)
			@if(($sachgiamgia->khuyenmai>0)&&($sgg<=5))
			@php
				$sgg=$sgg+1;
			@endphp
			<div class="product">
				<div class="image">
					<div style="position: relative;">
					<a href="{{ route('chitietsanpham',$sachgiamgia->id) }}"><img src="{{ asset('/image/anhsanpham').'/'.$sachgiamgia->anhbia}}" alt="" class=""></a>
					<span class="saleprice" style="background:url({{ url('/image/saleprice.png') }}) no-repeat;">{{ $sachgiamgia->khuyenmai }}%</span>
					</div>
					<a href="{{ route('chitietsanpham',$sachgiamgia->id) }}"><div class="product_name" title="{{ $sachgiamgia->tensach }}">{{ $sachgiamgia->tensach }}</div></a>
					<div class="product_composer"><a href="">{{ $sachgiamgia->tacgia }}</a></div>
					<div class="prices">{{ number_format($sachgiamgia->dongia-$sachgiamgia->dongia*$sachgiamgia->khuyenmai/100,0,",",".")}}₫</div>
					<div class="rootprices">{{ number_format($sachgiamgia->dongia,0,",",".") }}₫</div>
					<div class="rating">
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star"></span>
					<span class="fa fa-star"></span>
					<span class="comment">(30 nhận xét)</span></div>
				</div>
			</div>
			@endif
		@endforeach
		</div>
		<h2 class="title_pd"><a href="" class="title">Sách bán chạy</a><span class="css"></span><a href="{{ route('loaisach',3) }}" class="more">Xem tất cả</a></h2>
		<div class="list_pd">
			@php
				$sach_banchay = \App\Models\sach::where('luotmua', '>', 0)->orderByDesc('luotmua')->take(5)->get();
			@endphp

			@foreach($sach_banchay as $sachbanchay)
			@if(($sachbanchay->luotmua>0) && ($sbc<=5))
			@php
				$sbc=$sbc+1;
			@endphp
			<div class="product">
				<div class="image">
					<div style="position: relative;">
					<a href="{{ route('chitietsanpham',$sachbanchay->id) }}"><img src="{{ asset('/image/anhsanpham').'/'.$sachbanchay->anhbia}}" alt="" class=""></a>
					
					<span class="saleprice" style="background:url({{ url('/image/saleprice.png') }}) no-repeat;">{{ $sachbanchay->luotmua }}%</span>
					</div>
					<a href="{{ route('chitietsanpham',$sachbanchay->id) }}"><div class="product_name" title="{{ $sachbanchay->tensach }}">{{ $sachbanchay->tensach }}</div></a>
					<div class="product_composer"><a href="">{{ $sachbanchay->tacgia }}</a></div>
					<div class="prices">{{ number_format($sachbanchay->dongia-$sachbanchay->dongia*$sachbanchay->luotmua/100,0,",",".")}}₫</div>
					<div class="rootprices">{{ number_format($sachbanchay->dongia,0,",",".") }}₫</div>
					<div class="rating">
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star"></span>
					<span class="fa fa-star"></span>
					<span class="comment">(30 nhận xét)</span></div>
				</div>
			</div>
			@endif
			@endforeach
		</div>
		<h2 class="title_pd"><a href="" class="title">Danh mục</a><span class="css"></span><a href="" class="more">Xem tất cả</a></h2>
		<div class="list_pd">
			@for($i=1;$i<count($danhmuc)-1;$i++)
			<div class="product">
				<div class="image"><a href="{{ route('danhmuc',$danhmuc[$i]->id) }}"><img src="{{ url('/image').'/'.$danhmuc[$i]->anhdaidien }}" alt="" class=""></a>

				</div>
				<div class="category"><a href="{{ route('danhmuc',$danhmuc[$i]->id) }}">{{ $danhmuc[$i]->tendanhmuc }}</a></div>
			</div>
			@endfor
		</div>
	</div>
@endsection