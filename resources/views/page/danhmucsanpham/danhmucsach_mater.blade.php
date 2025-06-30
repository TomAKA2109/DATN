@extends('index.index')
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
		input[type=radio] {
		  border: 1px solid black;
		  border-radius: 2px;
		  padding: 0.5em;
		  -webkit-appearance: none;
		}

		input[type=radio]:checked {
		  /*background: url(data:image/gif;base64,R0lGODlhAQABAPAAAP///////yH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==) no-repeat center center;*/
		  background: #00cc66;
		  background-size: 9px 9px;
		}

		input[type=radio]:focus {
		  outline-color: transparent;
		}
	</style>
@endsection
@section('header')
	@include('page.header')
	@include('page.mainmenu')
@endsection
@section('content')
	<div class="pathway"><ul><li><a href="http://127.0.0.1:8000/home" title="Trang chủ">Trang chủ \</a></li><li>@section('tendanhmuc')
	@show</li></ul></div>
<div class="clear"></div>
	    <div id="container">
        <div class="sortable" id="layoutGroup3">
            <div class="block" id="module_categories">
	<h2>Danh mục</h2>
	<div class="blockcontent">
		<ul>
			@isset($loaisach)
				@foreach ($loaisach as $loai)
					<li>
						<a href="{{ url('loai/' . $loai['maloai']) }}">
							{{ $loai['maloai'] }} ({{ $loai['sl'] }})
						</a>
					</li>
				@endforeach
			@endisset
		</ul>
		<div class="clear"></div>
	</div>
</div>

<div class="block" id="module_listfields">
    <div class="fields_contener">
		<h2>Tác giả</h2>
		<div class="blockcontent">
			<div class="showboxfield">
			<ul>
			@isset($tacgia)
				@foreach ($tacgia as $tg)
					<li>
						<a href="{{ url('tacgia/' . urlencode($tg['tacgia'])) }}">
							{{ $tg['tacgia'] }} ({{ $tg['sl'] }})
						</a>
					</li>
				@endforeach
			@endisset
			</ul>
			</div>
		</div>
	</div>
    <div class="clear"></div>
</div>
        </div>
        <div class="sortable" id="layoutGroup4">    	
            <div class="block" id="module_listproducts">
	<h1>@section('danhmuc_tieude')@show</h1>
	<div class="intro"></div>
	<div class="clear"></div>
	<div class="pagesright">
		<div class="views">
			<a class="active fa fa-th-large" href="/danh-muc/1/sach-kinh-te.html?page=1" title="Xem danh sách theo dạng lưới"></a>
			<a class=" fa fa-th-list" href="/danh-muc/1/sach-kinh-te.html?page=1&view=1" title="Xem theo dạng danh sách"></a>
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
	@section('sanpham')
	@show
	</div>
	</div>
	<div class="clear">&nbsp;</div>
   	@section('phantrang')
   	{{-- <ul class="pagenav"><li class="active"><span>1</span></li><li><a href='/danh-muc/1/sach-kinh-te.html?page=2'>2</a></li><li><a href='/danh-muc/1/sach-kinh-te.html?page=3'>3</a></li><li><a href='/danh-muc/1/sach-kinh-te.html?page=4'>4</a></li><li><a href='/danh-muc/1/sach-kinh-te.html?page=5'>5</a></li><li><a href='/danh-muc/1/sach-kinh-te.html?page=6'>6</a></li><li class="next"><a href="/danh-muc/1/sach-kinh-te.html?page=2">Trang sau <i class="fa fa-chevron-right"></i></a></li></ul> --}}
   	@show
    <div class="clear"></div>
</div>
            
        </div>	
    </div>	
@endsection
@section('footer')
	@include('page.footer')
@endsection