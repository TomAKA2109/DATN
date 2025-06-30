@extends('index.index')
@section('title')
	Đặt hàng
@endsection
@section('style')
	<link rel="stylesheet" href="{{ asset('css/list_product.css') }}">
	<link href="{{ asset('css/chitietsanphams.css') }}" type="text/css" rel="stylesheet"/>
	<link href="{{ asset('css/dathang.css') }}" type="text/css" rel="stylesheet"/>
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
	#content {
    padding: 60px 0;
    min-height: 700px;
	}
	
	</style>
@endsection
@section('header')
	@include('page.header')
	@include('page.mainmenu')
@endsection
@section('content')
		<div class="inner-header">
					<div class="pull-left">
						<h3 class="inner-title">Đặt hàng
						@if(!empty($thongbao))
						<script>
							alert('{{ $thongbao }}');
						</script>
						@endif</h3>
					</div>
					<div class="pull-right">
						<div class="beta-breadcrumb">
							<a href="{{ url('home') }}" style="color: #00cc66;">Trang chủ</a> / <span>Đặt hàng</span>
						</div>
					</div>
					<div class="clearfix"></div>
		</div>
		<div id="content">
			<form action="{{ route('postdathang') }}" method="post" class="beta-form-checkout">
				{{ csrf_field() }}
				<div class="row">
					<div class="col-sm-6">
						<h2>Đặt hàng</h2>
						<div class="space20">&nbsp;</div>
						<table>
							<tr>
								<td class="first"><label for="name">Họ tên*</label></td>
								<td><input type="text" id="name" name="name" placeholder="Họ tên" required class="input_style"></td>
							</tr>
							<tr>
								<td class="first"><label>Giới tính </label></td>
								<td><input id="gender" type="radio" class="input-radio" name="gender" value="nam" checked="checked" style="width: 10%"><span style="margin-right: 10%">Nam</span>
							<input id="gender" type="radio" class="input-radio" name="gender" value="nữ" style="width: 10%"><span>Nữ</span></td>
							</tr>
							<tr>
								<td class="first"><label for="email">Email*</label></td>
								<td><input type="email" name="email" id="email" required placeholder="expample@gmail.com" class="input_style"></td>
							</tr>
							<tr>
								<td class="first"><label for="adress">Địa chỉ*</label></td>
								<td><input type="text" name="address" id="adress" placeholder="Street Address" required class="input_style"></td>
							</tr>
							<tr>
								<td class="first"><label for="phone">Điện thoại*</label></td>
								<td><input type="text" name="phone" id="phone" required class="input_style"></td>
							</tr>
							<tr>
								<td class="first"><label for="notes">Ghi chú</label></td>
								<td><textarea id="notes" name="notes" class="input_style" rows="3"></textarea></td>
							</tr>
						</table>
					</div>
				
					<div class="col-sm-6">
						<div class="your-order">
							<div class="your-order-head"><h2>Đơn hàng của bạn</h2></div>
							<div class="your-order-body" style="padding: 0px 10px">
								<div class="your-order-item">
									<div>
									<!--  one item	 -->
									@if(Session::has('cart'))
										@php
											$cart=Session::get('cart');
											$products_cart=$cart->items;
										@endphp
										@foreach($products_cart as $product)
										<div class="media">
											<img width="25%" src="{{ asset('/image/anhsanpham').'/'.$product['item']['anhbia'] }}" alt="" class="pull-left">
											<div class="media-body" style="margin-left: 30px;">
												<p class="font-large">{{ $product['item']['tensach'] }}</p>
												<span class="color-gray your-order-info">Tác giả: {{ $product['item']['tacgia'] }}</span>
												<span class="color-gray your-order-info">Số lượng: {{ $product['qty'] }}</span>
												<span class="color-gray your-order-info">Đơn giá: {{ number_format($product['price'],0,",",".") }}₫</span>
											</div>
										</div>
										<hr>
										@endforeach
									@endif
									<!-- end one item -->
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="your-order-item">
									<div class="pull-left"><p class="your-order-f18">Tổng tiền:</p></div>
									<div class="pull-right"><h5 class="color-black">@if(Session::has('cart')){{ number_format($cart->totalPrice,0,",",".") }}₫@else 0₫ @endif</h5></div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="your-order-head"><h5>Hình thức thanh toán</h5></div>
							
							<div class="your-order-body">
								<ul class="payment_methods">
									<li class="payment_method_cod">
										<input id="payment_method_cod" type="radio" class="input-radio" name="payment_method" value="COD" checked>
										<label for="payment_method_cod">Thanh toán khi nhận hàng</label>				
									</li>
									<div class="payment_box payment_method_cod d-none">
										Cửa hàng sẽ gửi hàng đến địa chỉ của bạn, bạn xem hàng rồi thanh toán tiền cho nhân viên giao hàng
									</div>

									<li class="payment_method_atm">
										<input id="payment_method_atm" type="radio" class="input-radio" name="payment_method" value="ATM">
										<label for="payment_method_atm">Chuyển khoản qua ngân hàng</label>
									</li>
									<div class="payment_box payment_method_atm d-none" id="bank-transfer-info">
										<label for="bank-select">Chọn ngân hàng:</label>
										<select id="bank-select" name="bank" class="input_style">
											<option value="">-- Chọn ngân hàng --</option>
											<option value="ncb">NCB - Ngân hàng Quốc Dân</option>
										</select>

										<div id="qr-code-area" style="margin-top: 10px; display: none;">
											<p>Quét mã QR để chuyển khoản:</p>
											<img id="qr-code-img" src="" alt="QR Code chuyển khoản" style="width: 200px; border: 1px solid #ccc;">
										</div>
									</div>
								</ul>
							</div>

							<div class="text-center"><input type="submit" class="beta-btn primary" value="Đặt hàng"></div>
						</div> <!-- .your-order -->
					</div>
				</div>
			</form>
		</div> <!-- #content -->
@endsection
@section('footer')
	@include('page.footer')
@endsection

@push('scripts')
	<script>
		document.addEventListener('DOMContentLoaded', function () {
			const atmRadio = document.getElementById('payment_method_atm');
			const codRadio = document.getElementById('payment_method_cod');
			const bankTransferInfo = document.getElementById('bank-transfer-info');
			const bankSelect = document.getElementById('bank-select');
			const qrArea = document.getElementById('qr-code-area');
			const qrImg = document.getElementById('qr-code-img');

			// Nếu bất kỳ phần tử nào bị thiếu (do giỏ hàng trống, phần form không render...), thì dừng script
			if (!atmRadio || !codRadio || !bankTransferInfo || !bankSelect || !qrArea || !qrImg) {
				console.warn('Một hoặc nhiều phần tử cần thiết chưa được render – bỏ qua xử lý JS.');
				return;
			}

			const qrCodes = {
				'ncb': '{{ asset("/image/ncb.png") }}',
			};

			function toggleBankInfo() {
				if (atmRadio.checked) {
					bankTransferInfo.style.display = 'block';
					document.querySelector('div.payment_box.payment_method_atm').classList.remove('d-none');
					document.querySelector('div.payment_box.payment_method_cod').classList.add('d-none');
				} else {
					document.querySelector('div.payment_box.payment_method_atm').classList.add('d-none');
					document.querySelector('div.payment_box.payment_method_cod').classList.remove('d-none');
					qrArea.style.display = 'none';
					qrImg.src = '';
					bankSelect.value = '';
				}
			}

			atmRadio.addEventListener('change', toggleBankInfo);
			codRadio.addEventListener('change', toggleBankInfo);

			bankSelect.addEventListener('change', function () {
				const selectedBank = this.value;
				if (selectedBank && qrCodes[selectedBank]) {
					qrImg.src = qrCodes[selectedBank];
					qrArea.style.display = 'block';
				} else {
					qrImg.src = '';
					qrArea.style.display = 'none';
				}
			});

			// Gọi 1 lần khi load trang để đảm bảo đúng trạng thái
			toggleBankInfo();
		});

	</script>
@endpush