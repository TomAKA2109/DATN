@section('mainmenu')
<div id="mainmenu">
	<div id="menucontact" style="width:1140px;margin: auto;position: relative;">
		<div style="width: 220px;">
			<p style="height:32px;background: white;width: 220px;cursor:default;">
				&nbsp;<span><img src="{{ asset('/image/tảixuống.png') }}" alt="" style="height: 20px;width: 20px;line-height: 32px;"></span>&nbsp;
				<b style="line-height: 32px;">DANH MỤC SẢN PHẨM</b>
			</p>
			<div style="position: relative;float: left;z-index: 10;bottom: 16px;" id="div_dropmenu">
				<ul id="ulmenu">
					@for($i = 0; $i < count($danhmuc) - 1; $i++)
						<li class="child">
							<a href="{{ route('danhmuc', $danhmuc[$i]->id) }}" class="first">{{ $danhmuc[$i]->tendanhmuc }}</a>
							<ul class="ulsmenu_l">
								@foreach($loaisach as $ls)
									@if(is_object($ls) && $ls->madanhmuc == $danhmuc[$i]->id)
										<li><a href="{{ route('loaisach', $ls->id) }}">{{ $ls->tenloai }}</a></li>
									@endif
								@endforeach
							</ul>
						</li>
					@endfor

					<!-- <li class="child">
						<a href="" class="first">Công ty phát hành</a>
						<ul class="ulsmenu_l">
							@for($i = 0; $i < 21 && isset($nxb[$i]); $i++)
								@if($i <= 10)
									<li><a href="">{{ $nxb[$i]->tennhaxuatban }}</a></li>
								@else
									<li class="right"><a href="">{{ $nxb[$i]->tennhaxuatban }}</a></li>
								@endif
							@endfor
							<li class="right"><a href="" style="font-weight: bold">Tất cả các nhà phát hành</a></li>
							<li class="right"><a href=""></a></li>
						</ul>
					</li> -->
				</ul>
			</div>
		</div>

		<div style="float:right;height: 32px;position: absolute;right: 1px;top: 5px;">
			<span><img src="{{ asset('/image/552489.png') }}" style="width: 25px;height: 20px;padding-right: 5px;"></span>
			<b>Hotline:<span style="font-weight: bold;color:#00cc66;"> 0961 763 070</span></b>
		</div>
	</div>
</div>
@endsection
