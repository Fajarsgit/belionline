<div class="container" style="margin-top: 100px;">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">{{ ('Tambah Produk') }}</div>
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

				<input id="" type="file" wire:model="gambar">
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
	<div class="row mt-5">
		<div class="col">
			<div class="table-borderless">
				<table class="table text-center shadow p-3 mb-5 bg-white rounded">
					<thead>
						<tr>
							<div class="card-header text-center">{{ ('Orders Table') }}</div>
							<td>No.</td>
							<td>Tanggal Pesan</td>
							<td>Nama</td>
							<td>Nama Produk</td>
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
								<?php $produk = \App\Models\Produk::where('id', $pesanan->produk_id)->first(); ?>
								<img src="{{ asset('storage/photos/'.$produk->gambar) }}" width="150px">
								<p>{{ $produk->nama }}</p>
							</td>

							<td>
								@if($pesanan->status == 0)
								<strong>Pesanan Belum ditambahkan Ongkir</strong>
								@endif
								@if($pesanan->status == 1)
								<strong>Pesanan Sudah ditambahkan Ongkir</strong>
								@endif
								@if($pesanan->status == 2)
								<strong>Pesanan Telah dipilih Pembayarannya</strong>
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
			</div>
		</div>
	</div>
</div>

</div>
