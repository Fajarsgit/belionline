<div class="container" style="margin-top: 50px;">
    <section class="products mb-5">
      <div id="belanja" class="container-fluid">
          <h1 class="text-center mb-5" style="color: grey;"><i class="fa fa-shopping-cart"></i> Products</h1>
      <div class="row">
        <div class="col-md-3 mb-3">
        <div class="shadow p-3 mb-5 bg-white rounded" >
          <div class="text-center">
          <img src="{{ asset('storage/photos/'.$product->gambar) }}" class="card-img-top p-3 rounded">
             <div class="row">
                <div class="col-md-12">
                   <h5><strong>{{ $product->nama }}</strong></h5>
                    <span class="badge badge-success shadow rounded-pill mb-3">Available Stock: {{ $product->stock }}</span>

                   <td><input id="qty" wire:model="qty" type="number" placeholder="Select Order Quantity" class="input-number"  data-min="1" data-max="100" value="Input" required="true"></td>
                        <p>Rp. {{ number_format($product->harga) }}</p>
                </div>
             </div>
            <div class="row mt-2">
               <div class="col-md-12">
                     <button class="btn btn-primary shadow rounded-pill" wire:click="beli({{ $product->id }})" style=""><i class="fa fa-shopping-cart"></i>
                        Add to Cart
                     </button>
                     </div>
                    </div>
                  </div>
                </div>
                </div>
              </div>
             </div>
            </section>
         </section>
        </div>    
  