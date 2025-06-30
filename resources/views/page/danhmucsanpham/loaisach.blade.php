@extends('index.index')
@section('title')
{{ $loaisach->tenloai }}
@endsection
@section('style')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/danhmucsach.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">
	<style>
	#ulmenu{
		position: absolute;
		display: none;
		z-index: 10;
		background: white;
		box-sizing: border-box;
		border-left: 2px solid lavender;
		border-bottom: 2px solid lavender;
		border-right: 2px solid lavender;
	}
	#mainmenu #menucontact div:hover #ulmenu{
		display: block;
	}
	#content{
		z-index: 9.5;
	}
	.product{
			min-height: 250px;
			width:20%;
			display: inline-block;
			float: left;
			line-height: 150%;
		}
		.product .image{
			height: 380px;
			width: 130px;
			margin: auto;
			border:none;
		}
		.image img{
			height: 182px;
			width: 130px;
		}
		.product .product_name{
			width: 130px;
			height: 48px;
			overflow: hidden;
			/*white-space: normal;
			text-overflow: ellipsis:;*/
			text-transform: capitalize;
		}
		.product .prices{
			 color: #444444;
		    font-weight: bold;
		    font-size: 14px;
		}
		.product .rootprices{
			color: #999999;
		    text-decoration: line-through;
		    font-size: 11px !important;
		}
		.product .rating .comment{
			font-size: 12px;
		    color: #787878;
		    display: block;
		}
		.product .rating .checked{
		    color: orange;
		}
		.product .product_name:hover{
			color: #00cc66;
			cursor: pointer;
		}
		.product .product_	composer:hover{
			color: #00cc66;
			cursor: pointer;
		}
		.product .category{
			width: 100%;
			font-weight: bold;
			color: #444;
			text-transform: capitalize;
			font-size: 14px;
			text-align: center;
			margin-top:15px;

		}
		.product .category:hover{
			color: #00cc66;
			cursor: pointer;
		}
	</style>
@endsection
@section('header')
	@include('page.header')
	@include('page.mainmenu')
@endsection
@section('content')
	<div class="pathway"><ul><li><a href="http://127.0.0.1:8000/home" title="Trang chủ">Trang chủ \</a></li><li>{{ $loaisach->tenloai }}</li></ul></div>
	<div class="clear"></div>
	<h3 style="font-weight: bold;">@if(count($sach)<1)Loại sách này chưa được cung cấp vui lòng chọn loại sách khác!@else{{ $loaisach->tenloai }}@endif</h3>
	    <div id="container">
        <div class="sortable" id="layoutGroup4" style="margin-left: 0;width: 1140px;">    	
            <div class="block" id="module_listproducts">
	<div class="clear"></div>
	<div class="pagesright">
		<div class="views">
			<a class="active fa fa-th-large" href="#" title="Xem danh sách theo dạng lưới"></a>
			<a class=" fa fa-th-list" href="#" title="Xem theo dạng danh sách"></a>
		</div>
		<div class="sorts">
			Xem theo: &nbsp;&nbsp;&nbsp;
			<select onchange="setOrder(this);" id="order" name="item_order">
				<option selected="selected" value="0">Mới trước cũ sau</option>
				<option  value="1">Cũ trước mới sau</option>
				<option  value="2">Giá thấp đến cao</option>
				<option  value="3">Giá cao đến thấp</option>
                <option  value="4">Bán chạy nhất</option>
                <option  value="5">Xem nhiều</option>
                <option  value="6">Ngày xuất bản</option>
			</select>
		</div>
		<div class="clear"></div>
	</div>
	<div class="clear"></div>
	<div class="blockcontent">
		<br>
	@section('sanpham')
	@foreach($sach as $sachs)
	<div class="product">
		<div class="image">
			<div style="position: relative;">
			<a href="{{ route('chitietsanpham',$sachs->id) }}"><img src="{{ asset('/image/anhsanpham').'/'.$sachs->anhbia}}" alt="" class=""></a>
			@if($sachs->khuyenmai>0)
			<span class="saleprice" style="background:url({{ url('public/image/saleprice.png') }}) no-repeat;">{{ $sachs->khuyenmai }}%</span>
			@endif
			</div>
			<a href="{{ route('chitietsanpham',$sachs->id) }}"><div class="product_name" title="{{ $sachs->tensach }}">{{ $sachs->tensach }}</div></a>
			<div class="product_composer">{{ $sachs->tacgia }}</div>
			<div class="prices">{{ number_format($sachs->dongia-$sachs->dongia*$sachs->khuyenmai/100,0,",",".")}}₫</div>
			<div class="rootprices">{{ number_format($sachs->dongia,0,",",".") }}₫</div>
			<div class="rating">
			<span class="fa fa-star checked"></span>
			<span class="fa fa-star checked"></span>
			<span class="fa fa-star checked"></span>
			<span class="fa fa-star"></span>
			<span class="fa fa-star"></span>
			<span class="comment">(30 nhận xét)</span></div>
		</div>
	</div>
	@endforeach
	@show
	</div>
	</div>
	<div class="clear">&nbsp;</div>
   	@section('phantrang')
   	<ul class="pagenav"><li class="active"><span>1</span></li><li><a href='/danh-muc/1/sach-kinh-te.html?page=2'>2</a></li><li><a href='/danh-muc/1/sach-kinh-te.html?page=3'>3</a></li><li><a href='/danh-muc/1/sach-kinh-te.html?page=4'>4</a></li><li><a href='/danh-muc/1/sach-kinh-te.html?page=5'>5</a></li><li><a href='/danh-muc/1/sach-kinh-te.html?page=6'>6</a></li><li class="next"><a href="/danh-muc/1/sach-kinh-te.html?page=2">Trang sau <i class="fa fa-chevron-right"></i></a></li></ul>
   	@show
    <div class="clear"></div>
</div>
            
        </div>	
    </div>	
@endsection
@section('footer')
	@include('page.footer')
@endsection
