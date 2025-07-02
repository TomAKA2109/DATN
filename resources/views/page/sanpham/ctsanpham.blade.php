@extends('index.index')
@section('title')
	Chi tiết sách
@endsection
@section('style')
	<link rel="stylesheet" href="{{ asset('css/list_product.css') }}">
	<link href="{{ asset('css/chitietsanphams.css') }}" type="text/css" rel="stylesheet"/>
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
	.products {
    width: 155px;
    background: #FFFFFF;
    padding: 0 5px;
    margin: 10px auto;
    position: relative;
	}
	.products .image .saleprice{
	background:url("{{ url('/image/saleprice.png') }}") no-repeat;
	font-weight: bold;
	text-align: center;
	color: #FFF;
	font-size: 13px;
	line-height: 23px;
	width: 46px;
	height: 37px;
	position: absolute;
	top: 0;
	right: 54px;
	}
	</style>
@endsection
@section('header')
	@include('page.header')
	@include('page.mainmenu')
@endsection
@section('content')
	<div id="container">
        <div class="sortable" id="layoutGroup1">
            <div class="product_view_contener">
	<div class="showleft">
		<div class="image_contenner">
        <div class="mainimage">
		<img src="{{ asset('/image/anhsanpham').'/'.$sach->anhbia }}" id="mainimage" width="250"/>
        
        </div>
    </div>
        <div class="product_info">
            <h1>{{ $sach->tensach }}</h1>
            <div class="groups">
                <div class="viewfields">
                     <span>Tác giả: <a href="" title="{{ $sach->tacgia }}">{{ $sach->tacgia }}</a></span> <span>Phát hành: <a href="" title="">{{ $nxbs->tennhaxuatban }}</a></span>
                </div>
                <div class="clear"></div>
            </div>
            <div class="groups">
                <div class="write_comment">
                	<a href="#comment"><i class="fa fa-pencil"></i> Gửi nhật xét của bạn</a>
                </div>
                <div class="add_wishlist">
                	<a href=""><i class="fa fa-star"></i> Thêm vào yêu thích</a>
                </div>
                <div class="clear"></div>
            </div>        
            <div class="prices_contener">
                <div class="prices">
                    <div class="saleprice">
                        <span id="saleprice">{{ number_format($sach->dongia-$sach->dongia*$sach->khuyenmai/100,0,",",".") }} ₫</span>
                    </div>
                    <div class="vrootprice" id="rootprice">Giá bìa: <span>{{ number_format($sach->dongia,0,",",".") }} ₫</span></div>
                    <div class="yousave" id="yousave">Tiết kiệm: {{ number_format(($sach->dongia*$sach->khuyenmai/100),0,",",".") }} ₫<span> 
                    	@if($sach->khuyenmai>0)
                    	({{ $sach->khuyenmai }})%
                    	@endif
                    </span></div>
                </div>
                <div class="goshop">
            		<a href="{{ route('themvaogiohang',$sach->id) }}">Thêm vào giỏ hàng</a>
           		 </div>
                 <div class="clear"></div>
            </div>
            <div class="clear"></div>
            <div class="intro">
                <div class="block " id="content_ViewProducts"><div class="blockcontent"><p>
	<i class="fa fa-check"></i><span style="font-size:14px;">Bọc Plastic miễn ph&iacute;&nbsp;</span></p>
<p>
	<i class="fa fa-check"></i><span style="font-size:14px;">Giao h&agrave;ng miễn ph&iacute; trong nội th&agrave;nh TP. HCM với đơn h&agrave;ng&nbsp; <span style="color:#33cc33;"><strong>&ge; 150.000 đ</strong></span></span></p>
<p>
	<i class="fa fa-check"></i><span style="font-size:14px;">Giao h&agrave;ng miễn ph&iacute; to&agrave;n quốc với đơn h&agrave;ng <span style="color:#33cc33;"><strong>&ge; 250.000 đ</strong></span></span></p>
</div></div>
            </div>
            <div class="clear"></div>
            {{-- <div class="fb-like" data-href="http://nobita.vn/2896/yeu-anh-tu-cai-nhin-dau-tien-bo-2-tap-.html" data-layout="standard" data-action="like" data-show-faces="false" data-share="false"></div> --}}
        </div>
        
    </div>
    <div class="clear" style="clear: both;"></div>
</div>
         
            <div class="block" id="module_ProductDetail">
	<h3>Giới thiệu sách</h3>
    	<div class="intro" id="contentid">
	    	<p>
	<span style="color:#ff0000;"><span style="font-size:16px;">
          {{ $sach->tensach }}
        </span></span></p>
        @php 
        echo($chitietsanpham->noidung);
        @endphp
        

        </div>
        {{-- <div class="viewmore" id="viewmore"><span>Xem thêm nội dung <i class="fa fa-sort-desc"></i></span></div> --}}
</div>
            <div class="block" id="module_ProductFieds">
	<a name="fieldlist"></a>
    <h3>Thông tin chi tiết</h3>
    <table class="fields" cellpadding="0" cellspacing="0" width="100%">
        <tr class="field_view_contenner row0">
	<td class="title">
		<a href="" title="Tác giả">Tác giả</a>
	</td>
	<td class="values">
		<a href="" title="{{ $sach->tacgia }}">{{ $sach->tacgia }}</a>
	</td>
</tr>{{-- <tr class="field_view_contenner row1">
	<td class="title">
		<a href="" title="Phát hành">Phát hành</a>
	</td>
	<td class="values">
		<a href="" title="TiHabooks">TiHabooks</a>
	</td>
</tr> --}}<tr class="field_view_contenner row0">
	<td class="title">
		<a href="" title="NXB">NXB</a>
	</td>
	<td class="values">
		{{ $nxbs->tennhaxuatban }}
	</td>
</tr><tr class="field_view_contenner row1">
	<td class="title">
		Kích thước
	</td>
	<td class="values">
		{{ $chitietsanpham->kichthuoc }}
	</td>
</tr><tr class="field_view_contenner row0">
	<td class="title">
		Trọng lượng
	</td>
	<td class="values">
		{{ $chitietsanpham->trongluong }}
	</td>
</tr><tr class="field_view_contenner row1">
	<td class="title">
		Lượt xem
	</td>
	<td class="values">
		51
	</td>
</tr><tr class="field_view_contenner row0">
	<td class="title">
		Ngày phát hành
	</td>
	<td class="values">
		{{ \Carbon\Carbon::parse($chitietsanpham->ngayphathanh)->format('d/m/Y') }}
	</td>
</tr><tr class="field_view_contenner row1">
	<td class="title">
		Danh mục
	</td>
	<td class="values">
		<a href="{{ route('loaisach',$loaisachs->id) }}">{{ $loaisachs->tenloai }}</a>
	</td>
</tr>
    </table>
    <div class="goshop cfields">
    	<br>
        <a href="{{ route('themvaogiohang',$sach->id) }}">Thêm vào giỏ hàng</a>
     </div>
</div>
            
            <div class="block" id="module_AlsoBought">
	<h3>Có thể bạn quan tâm</h3>
	<div class="blockcontent">
        <div style="position:relative; padding:0 0; overflow:hidden; height:320px;">
       @foreach($sach_lienquan as $sach_lienquans)
       <div class="product_contener">
	        <div class="products">
			<div class="image"><a href="{{ route('chitietsanpham',$sach_lienquans->id) }}" title=""><img src="{{ asset('/image/anhsanpham').'/'.$sach_lienquans->anhbia }}" alt="" title="" /></a>
				@if($sach_lienquans->khuyenmai>0)
				<span class="saleprice">{{ $sach_lienquans->khuyenmai }}%</span>
				@else

				@endif
			</div>
			<div class="productname">
				<a href="{{ route('chitietsanpham',$sach_lienquans->id) }}" title="">{{ $sach_lienquans->tensach }}</a>
			</div>
			<div class="fields"> <span><a href="" title="">{{ $sach_lienquans->tacgia }}</a></span></div>
			@if($sach_lienquans->khuyenmai>0)
		        <div class="prices">{{ number_format($sach_lienquans->dongia*(100-$sach_lienquans->khuyenmai)/100,0) }}₫</div>
				<div class="rootprice">{{ number_format($sach_lienquans->dongia,0) }}₫</div>
			@else
				<div class="rootprice">{{ number_format($sach_lienquans->dongia,0) }}₫</div>
			@endif
	        
			</div>
		</div>	
       @endforeach
        </div>
    </div>
</div>
    <br style="clear: both;">
        <div class="block" id="module_Comments">
    <h3>Gửi nhật xét của bạn</h3>
    <div class="comment_form">
        <div>
            Vui lòng <a href='' title='đăng nhập'>đăng nhập</a> để viết nhận xét
        </div>
    </div>
    <h3>
   		<ul id="tabnav">
            <li><a href="javascript:" class="active" id="tab0" onclick="ShowTab(0)">Nhận xét của khách hàng</a></li>
            <li><a href="javascript:" id="tab1" onclick="ShowTab(1)"><i class="fa fa-facebook-square"></i>   Thảo luận</a></li>
        </ul>
    </h3>
    <a name="comment"></a>
	<div class="blockcontent">
    	<div id="div0">
            <div class="comment_list">
                <div id="comment_contener" style="background: lavender;height: 200px;padding-left: 30px;padding-right: 30px;">
                    <br>
                    <b>Không tìm thấy nhận xét nào cho sản phẩm này</b>
                    <textarea class="form-control" rows="3" style="padding-left: 30px;"></textarea>
                    <input type="button" value="Gửi  " class="btn btn-primary" style="margin-top: 5px;">
                </div>
            </div>
         </div>
         <div id="div1">
            <div class="fb-comments" data-href="http://nobita.vn/2896/yeu-anh-tu-cai-nhin-dau-tien-bo-2-tap-.html" data-width="100%" data-numposts="5" data-colorscheme="light"></div>
         </div>
	</div>
</div>
    </div>
@endsection
@section('footer')
@include('page.footer')
@endsection