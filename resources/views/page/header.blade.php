@section('header')
<div id="header">
	<form action="{{ route('timkiem_key') }}" method="get">
		<div id="top" style="width: 1140px;margin: auto;height: 55px;">
			<div id="logo" style="width: 342px;height: 55px;">
				<a href="{{ url('home') }}">
					<span style="font-weight: bold;font-size: 300%;line-height: 30px;">
						<img src="{{ asset('image/logo.png') }}" alt="" style="width: 170px;height: 55px;">
					</span>
				</a>
			</div>
			<div style="width: 440px;height: 30px;margin-top:13px;position: relative;bottom: 57px;left: 342px;">
				<input type="text" name="key" style="width: 394px;height: 30px;" id="searching">
				<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
				<a href="">
					<input type="submit" value="Tìm" style="width: 44px;float: right;height: 30px;text-align: center;font-weight: bold;color: #00cc66;background: white">
				</a>
				<div id="producrslist"></div>
			</div>

			<div style="float: right;bottom:87px;position: relative;height: 30px;" id="login">
				<label style="margin-right: 5px;">
				@if (!Cookie::get('khachhang_login'))
                    <div style="margin-right: 30px; background: white;width: 100px; height: 30px;line-height: 30px;text-align: center;overflow: hidden;">
                        <a href="{{ route('kh_login') }}" style="color: black;">Đăng nhập</a>
                    </div>
				@else
                    <div id="users" style="margin-right: 30px; position: relative; display: inline-block;">
                        <div style="background: white;width: 100px; height: 30px;line-height: 30px;text-align: center;overflow: hidden;cursor: pointer;">
                            {{ request()->cookie('khachhang_login') }}
                        </div>
                        <ul id="user_menu" style="display: none; position: absolute; top: 30px; left: 0; background: white; border: 1px solid #ccc; list-style: none; padding: 5px 0; z-index: 100; width: 160px;">
                            <li style="padding: 5px 15px;"><a href="{{ url('thongtincanhan') }}" style="color: black;">Thông tin cá nhân</a></li>
                            <li style="padding: 5px 15px;"><a href="{{ url('donhang') }}" style="color: black;">Đơn hàng của tôi</a></li>
                            <li style="padding: 5px 15px;"><a href="{{ url('kh_logout') }}" style="color: black;">Đăng xuất</a></li>
                        </ul>
                    </div>
				@endif
				</label>
				<div class="cart" id="cart">
					<div class="beta-select">
						<span class="cart-total-quantity">Số lượng: {{ $totalQty }}</span>
					</div>
					<div class="beta-dropdown cart-body">
						@if(Session::has('cart'))
						@foreach($product_cart as $product)
						<div class="cart-item">
							<a class="cart-item-delete" href="{{route('xoagiohang',$product['item']['id'])}}"><i class="fa fa-times"></i></a>
							<div class="media">
								<a class="pull-left" href="#"><img src="{{ asset('/image/anhsanpham').'/'.$product['item']['anhbia'] }}" alt="" style="width: 50px;height: 70px;"></a>
								<div class="media-body" id="cart_body">
									<span class="cart-item-title">{{ $product['item']['tensach'] }}</span>
									<span class="cart-item-options">Tác giả:{{ $product['item']['tacgia'] }}</span>
									<span class="cart-item-amount">
										<input type="number" name="qty" id="qty" onchange="changeqty(this,{{ $product['item']['id'] }})" value="{{ $product['qty'] }}" min="1" style="width: 40px;border: 1px solid lavender;text-align: center;">
										*<span>{{ number_format($product['price'],0,",",".") }}₫</span>
									</span>
								</div>
							</div>
						</div>
						@endforeach
						@else
						<p>Chưa có sản phẩm nào trong giỏ hàng</p>
						@endif
						<div class="cart-caption">
							<div class="cart-total text-right">Tổng tiền: <span class="cart-total-value">@if(Session::has('cart')){{ number_format($totalPrice,0,",",".") }}₫@else 0 @endif</span></div>
							<div class="clearfix"></div>
							<div class="center">
								<div class="space10">&nbsp;</div>
								<a href="{{ url('dat-hang') }}" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
							</div>
						</div>
					</div>
				</div> <!-- .cart -->
			</div>
		</div>
	</form>
</div>

<style>
	ul li:hover {
		background: lavender;
	}

	a:hover {
		text-decoration: none;
	}
</style>

<script>
	function changeqty(editButton, id) {
		var row = $(editButton).parent();
		var qty = $("#qty", row).val();
		location.assign('/update-cart/' + id + '-' + qty);
	}

	$(document).ready(function () {
		$('#searching').keyup(function () {
			var key = $('#searching').val();
			let url = "{{ route('timkiem') }}";
			if (key.length == 0) {
				$('#producrslist').fadeIn();
				$('#producrslist').html(key);
			} else {
				$.ajax({
					type: "POST",
					url: url,
					cache: false,
					data: {
						_token: $('#token').val(),
						query: key
					},
					success: function (data) {
						if (data.success) {
							$('#producrslist').fadeIn();
							$('#producrslist').html(data.success);
						}
					}
				});
			}
		});

		// Hiện menu khi hover
		$('#users').hover(
			function () {
				$('#user_menu').stop(true, true).fadeIn(100);
			},
			function () {
				$('#user_menu').stop(true, true).fadeOut(100);
			}
		);
	});
</script>
@endsection
