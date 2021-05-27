<div class="container" style="margin-top: 100px;">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="shadow p-3 mb-5 bg-white rounded">
				<div class="card-header text-center">{{ ('Add Product') }}</div>
				<div class="card-body">
					
				<form wire:submit.prevent="store">
						
				<label for="nama" class="col-md-12 col-form-label text-md-left">{{ ('Nama Produk') }}</label>
				
				<input id="nama" type="text" 
				class="form-control @error('nama') is-invalid @enderror"
				wire:model="nama" value="{{ old('nama') }}" required 
				autocomplete="nama" autofocus>

				@error('nama')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
				@enderror

				<label for="stock" class="col-md-12 col-form-label text-md-left">{{ ('Stock') }}</label>
				
				<input id="stock" type="number" 
				class="form-control @error('stock') is-invalid @enderror"
				wire:model="stock" value="{{ old('stock') }}" required 
				autocomplete="stock" autofocus>

				@error('stock')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
				@enderror

				<label for="hargasebelumdiskon" class="col-md-12 col-form-label text-md-left">{{ ('Harga Sebelum Discount %') }}</label>

				<input id="hargasebelumdiskon" type="number"
				class="form-control @error('hargasebelumdiskon') is-invalid @enderror"
				wire:model="hargasebelumdiskon" value="{{ old('hargasebelumdiskon') }}" required
				autocomplete="hargasebelumdiskon" autofocus>

				@error('hargasebelumdiskon')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
				@enderror

				<label for="harga" class="col-md-12 col-form-label text-md-left">{{ ('Harga Produk') }}</label>

				<input id="harga" type="number"
				class="form-control @error('harga') is-invalid @enderror"
				wire:model="harga" value="{{ old('harga') }}" required
				autocomplete="harga" autofocus>

				@error('harga')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
				@enderror

				

				<label for="berat" class="col-md-12 col-form-label text-md-left">{{ ('Berat Produk') }}</label>

				<input id="berat" type="number"
				class="form-control @error('berat') is-invalid @enderror"
				wire:model="berat" value="{{ old('berat') }}" required
				autocomplete="berat" autofocus>

				@error('berat')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
				@enderror

				<label for="gambar" class="col-md-12 col-form-label text-md-left">{{ ('Gambar Produk (*Maks 2 MB)') }}</label>

				<input id="gambar" type="file" wire:model="gambar">
				@error('gambar')
				<span class="error">{{ $message }}</span>
				@enderror

				<br><br>

				<div class="col-md-8">
						<button type="submit" class="btn btn-primary shadow rounded-pill">Tambah Produk</button>
				</div>

				
				</form>

				



				</div>
				
				
			</div>
			
		</div>
		
	</div>
	<div class="container" style="margin-top: 100px;">
    	<style>
    		nav svg{
    			height: 20px;
    		}
    	</style>
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="table-borderless table-responsive-md">
				<table class="table text-center shadow p-3 mb-5 bg-white rounded">
					<thead>
						<tr>
							<div class="text-center mb-3"><strong>{{ ('Products Table') }}</strong></div>
							<th scope="col">No.</th>
							<th scope="col">Nama Produk</th>
							<th scope="col">Total Harga</th>
							<th scope="col">Aksi</th>

						</tr>
					</thead>
					<tbody>
						<?php $no = 1 ?>
						@foreach($products as $product)
						<tr>
							<th>{{ $no++ }}</th>
							
							
							<td>
								<img src="{{ asset('storage/photos/'.$product->gambar) }}" width="150px">
								<p>{{ $product->nama }}</p>
								<span class="badge badge-success shadow rounded-pill mb-3">Available Stock: {{ $product->stock }}</span>
								<p style="color: grey;"><strike><i>Rp. {{ number_format($product->hargasebelumdiskon) }}</i></strike></p>
							</td>

							<td><strong>Rp. {{ number_format($product->harga) }}</strong></td>
								
							<td>
								<a href="#edit" class="btn btn-primary btn-block shadow rounded-pill" data-toggle="modal" data-target="#updateModal" wire:click.prevent="showUpdateForm({{ $product->id }})">Edit
								</a>
								<button class="btn btn-danger btn-block shadow rounded-pill" wire:click="delete({{ $product->id }})">Hapus
								</button>
							</td>

						</tr>
						<!-- <tr>
							<td colspan="7">Data Kosong</td>
						</tr> -->
						@endforeach
					</tbody>
				</table>
				{{ $belanja->links() }}
			</div>
		</div>
	</div>
</div>
<!-- Modal -->
<div wire:ignore.self class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{ ('Edit Product') }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form id="edit" wire:submit.prevent="update({{$product->id}})">
						
				<label for="nama" class="col-md-12 col-form-label text-md-left">{{ ('Nama Produk') }}</label>
				
				<input id="nama" type="text" 
				class="form-control @error('nama') is-invalid @enderror"
				wire:model="nama" value="{{ old('nama') }}" required 
				autocomplete="nama" autofocus>

				@error('nama')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
				@enderror

				<label for="stock" class="col-md-12 col-form-label text-md-left">{{ ('Stock') }}</label>
				
				<input id="stock" type="number" 
				class="form-control @error('stock') is-invalid @enderror"
				wire:model="stock" value="{{ old('stock') }}" required 
				autocomplete="stock" autofocus>

				@error('stock')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
				@enderror

				<label for="hargasebelumdiskon" class="col-md-12 col-form-label text-md-left">{{ ('Harga Sebelum Discount %') }}</label>

				<input id="hargasebelumdiskon" type="number"
				class="form-control @error('hargasebelumdiskon') is-invalid @enderror"
				wire:model="hargasebelumdiskon" value="{{ old('hargasebelumdiskon') }}" required
				autocomplete="hargasebelumdiskon" autofocus>

				@error('hargasebelumdiskon')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
				@enderror

				<label for="harga" class="col-md-12 col-form-label text-md-left">{{ ('Harga Produk') }}</label>

				<input id="harga" type="number"
				class="form-control @error('harga') is-invalid @enderror"
				wire:model="harga" value="{{ old('harga') }}" required
				autocomplete="harga" autofocus>

				@error('harga')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
				@enderror

				

				<label for="berat" class="col-md-12 col-form-label text-md-left">{{ ('Berat Produk') }}</label>

				<input id="berat" type="number"
				class="form-control @error('berat') is-invalid @enderror"
				wire:model="berat" value="{{ old('berat') }}" required
				autocomplete="berat" autofocus>

				@error('berat')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
				@enderror

				<label for="gambar" class="col-md-12 col-form-label text-md-left">{{ ('Gambar Produk (*Maks 2 MB)') }}</label>

				<input id="gambar" type="file" wire:model="gambar" value="{{ old('gambar') }}"  required="" autocomplete="gambar" autofocus>
				@error('gambar')
				<span class="error text-danger">{{ $message }}</span>
				@enderror

				<br><br>

				<div class="col-md-8">
						

						
				</div>

				
				</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary shadow rounded-pill" data-dismiss="modal">Close</button>
        <button wire:click="update({{$product->id}})" type="submit" class="btn btn-primary shadow rounded-pill" data-dismiss="">Save</button>
      </div>
    </div>
  </div>
</div>
    <div class="container" style="margin-top: 100px;">
    	<style>
    		nav svg{
    			height: 20px;
    		}
    	</style>
	<div class="row justify-content-center mt-5">
		<div class="col">
			<div class="table-borderless table-responsive-md">
				<table class="table shadow mb-5 bg-white rounded">
					<thead>
						<tr>
							<div class="text-center mb-3"><strong>{{ ('Orders Table') }}</strong></div>
							<td>No.</td>
							<td>Tanggal Pesan</td>
							<td>Nama</td>
							<td>Jumlah Pemesanan</td>
							<td>Nama Produk</td>
							<td>Detail Alamat Pemesan</td>
							<td>Status</td>
							<td>Total Harga</td>
							<td>Aksi</td>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1 ?>
						@forelse ($belanja as $pesanan)
						<tr>
							<td>{{ $no++ }}</td>
							
							<td>{{ $pesanan->created_at }}</td>
							<td>
								<p>{{ $pesanan->name }}</p>
							</td>
							<td>
								<p>{{ $pesanan->qty }}</p>
							</td>
							<td>
								<?php $produk = \App\Models\Produk::where('id', $pesanan->produk_id)->first(); ?>
								@if ($produk !== $pesanan->produk_id)

								<img src="{{ asset('storage/photos/'.$produk->gambar) }}" width="150px">
								<p>{{ $produk->nama }}</p>
								<span>{{ $pesanan->belanja }}</span>
								@endif
							</td>
							<td>
								<?php $produk = \App\Models\User::where('id', $pesanan->user_id)->first(); ?>
								@if ($produk !== $pesanan->user_id)
								<p>{{ $produk->address }}</p>
								<span>{{ $pesanan->belanja }}</span>
								@endif
							</td>

							<td>
								@if($pesanan->status == 0)
								<strong><span class="badge badge-warning shadow rounded-pill">Pesanan Belum ditambahkan Ongkir</span></strong>
								@endif
								@if($pesanan->status == 1)
								<strong><span class="badge badge-primary shadow rounded-pill">Pesanan Sudah ditambahkan Ongkir</span></strong>
								@endif
								@if($pesanan->status == 2)
								<strong><span class="badge badge-success shadow rounded-pill">Pesanan Telah dipilih Pembayarannya</span></strong>
								@endif
							</td>

							<td><strong>Rp. {{ number_format($pesanan->total_harga) }}</strong></td>

							<td>
								<button class="btn btn-danger btn-block shadow rounded-pill" wire:click="destroy({{ $pesanan->id }})">Hapus
								</button>
							</td>
						</tr>
						@empty
						<tr>
							<td colspan="7">Data Kosong</td>
						</tr>
						@endforelse
					</tbody>
				</table>
				{{ $belanja->links() }}
			</div>
		</div>
	</div>
</div>

</div>
