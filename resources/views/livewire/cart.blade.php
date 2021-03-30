<div class="container" style="margin-top: 100px;">
    <section class="products mb-5">
        <div class="row mt-4">
            
            <div class="col-md-3 mb-3">
            <div class="shadow p-3 mb-5 bg-white rounded" >
                <div class="text-center">
                <img src="{{ asset('storage/photos/'.$product->gambar) }}" width="223px" height="200px" class="shadow p-3 mb-5 bg-white rounded">
                   <div class="row mt-2">
                      <div class="col-md-12">
                         <h5><strong>{{ $product->nama }}</strong></h5>
                   <td><input id="qty" wire:model="qty" type="number" placeholder="Select Order Quantity" class="input-number"  data-min="1" data-max="100" value="Input" required></td>
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
    </section>
</div>
  