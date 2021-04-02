<section class="pt-3">
      <div class="container-fluid" style="background-color: #1fc7ff">
        <div class="row align-items-center">
          <div class="col-12 col-md-5 col-lg-6 order-md-2" data-aos="fade-left">

            <!-- Image -->
            <img src="{{ asset('assets/bg2.png')}}" style="background-size: " alt="...">

          </div>
          <div class="col-12 col-md-7 col-lg-6 order-md-1 mt-5" data-aos="fade-right">

            <!-- Heading -->
            <h5 class="justify-content-center display-3 text-center text-md-left fs-4 ml-3" style="color: #f9ff47">
             <span class="text-white">BeliOnline.</span> <br><i>The Great</i> <span class="text-white">Ecommerce Platform.</span>
            </h5>

            <!-- Text -->
            <p class="lead text-center text-md-left text-white mt-5 ml-3">
              <strong>Just Add it to The Cart!</strong>
            </p>

            <!-- Buttons -->
            <div class="justify-content-center text-md-left ml-3">
              <a href="#belanja" class="justify-content-center btn btn-primary shadow rounded-pill" role="button" data-bs-toggle="button" style="margin-left: 45px;">Let's Shop</a>
            </div>

          </div>
        </div> <!-- / .row -->
      </div> <!-- / .container -->
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#1fc7ff" fill-opacity="1" d="M0,96L48,117.3C96,139,192,181,288,197.3C384,213,480,203,576,213.3C672,224,768,256,864,245.3C960,235,1056,181,1152,149.3C1248,117,1344,107,1392,101.3L1440,96L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path></svg>
<div class="container">
	@if(Auth::user())
	  @if(Auth::user()->level == 1)
      <div class="col-md-3 mb-3">
      		<a href="{{url('TambahProduk/')}}" class="btn btn-primary btn-block shadow rounded-pill" >Admin Panel</a>
      </div>
      @endif
    @endif
    <!-- search columns -->
    <div id="search" class="row ml-5 justify-content-center">
    	<div class="col-md-6">
        <div>
        <h1 class="text-center mb-5 pt-5" style="color: grey; padding-top: 200px;"><i class="fa fa-search"></i> Livesearch</h1>
        </div>
    		<div class="input-group">
    			<input wire:model="search" type="text" class="form-control shadow p-3 mb-5 bg-white rounded" placeholder="Search" aria-label="search" ariadescribedby="basic-addon1">
    		</div>

    		<div class="input-group">
    			<input wire:model="min" type="text" class="form-control shadow p-3 mb-5 bg-white rounded" placeholder="Harga Min" aria-label="harga min" ariadescribedby="basic-addon1">
    		</div>

    		<div class="input-group mb-3">
    			<input wire:model="max" type="text" class="form-control shadow p-3 mb-5 bg-white rounded" placeholder="Harga Max" aria-label="harga max" ariadescribedby="basic-addon1">
    		</div>


    	</div>
        <!-- end search columns -->
    </div>
    

    <section class="products mb-5 mt-4">
      <div id="belanja" class="container-fluid mt-5">
          <h1 class="text-center mb-5 pt-5" style="color: grey;"><i class="fa fa-shopping-cart"></i> Products</h1>
    	<div class="row mt-4">
    		@foreach($products as $product)
    		<div class="col-md-3 mb-3 mt-5">
    		<div class="shadow p-3 mb-5 bg-white rounded" >
    			<div class="text-center">
    			<img src="{{ asset('storage/photos/'.$product->gambar) }}" class="card-img-top p-3 rounded">
    			   <div class="row">
    			   	  <div class="col-md-12">
    			   	  	 <h5><strong>{{ $product->nama }}</strong></h5>
                   <span class="badge badge-success shadow rounded-pill mb-3">Available Stock: {{ $product->stock }}</span>
                   <p style="color: grey;"><strike><i>Rp. {{ number_format($product->hargasebelumdiskon) }}</i></strike></p>
    			   	  	 <p>Rp. {{ number_format($product->harga) }}</p>
    			   	  </div>
    			   </div>
    			  <div class="row mt-2">
    			  	 <div class="col-md-12">
    			  	 <a href="{{ url('Cart/'.$product->id) }}" class="btn btn-primary shadow rounded-pill" style=""><i class="fa fa-shopping-cart"></i>
    			  	 	Detail
    			  	 </a>
    			  	 </div>
    			  </div>
    			</div>

    		</div>
    		</div>
    		@endforeach
    	</div>
     </div>
    </section>
 </section>
  </div>    

