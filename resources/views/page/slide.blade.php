@section('slide')
<div id="mn_slide">		
   		 	<div class="bd-example" >
		  <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
		    <ol class="carousel-indicators">
		      <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
		      <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
		      <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
		      <li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
		    </ol>
		    <div class="carousel-inner"style="height:400px;">
			<div class="carousel-item active" >
		        <img src="{{ asset('/image').'/'.$sl[0]->lienket }}" class="d-block w-100" alt="..."style="width: 908px;height: 400px;">
		        {{-- <div class="carousel-caption d-none d-md-block">
		          <h5>First slide label</h5>
		          <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
		        </div> --}}
		      </div>
		      @for($i=1;$i<=3;$i++)
		      <div class="carousel-item">
		        <img src="{{ asset('/image').'/'.$sl[$i]->lienket }}" class="d-block w-100" alt="..."style="width: 908px;height: 420px;">
		        {{-- <div class="carousel-caption d-none d-md-block" >
		          <h5>Second slide label</h5>
		          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
		        </div> --}}
		      </div>
		      @endfor
		      <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
	      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
	      <span class="sr-only">Previous</span>
	    </a>
	    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
	      <span class="carousel-control-next-icon" aria-hidden="true"></span>
	      <span class="sr-only">Next</span>
	    </a>
	  </div>
	 </div>
      </div>
  </div>
@endsection

