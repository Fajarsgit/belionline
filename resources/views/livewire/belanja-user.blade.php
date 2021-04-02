<div class="container" style="margin-top: 100px;">
	<div class="row mt-5">
		<div class="col">
			<div class="table-borderless">
				<table class="table text-center shadow p-3 mb-5 bg-white rounded">
					<thead>
						<tr>
							<td>No.</td>
							<td>Tanggal Pesan</td>
							<td>Nama Produk</td>
							<td>Status</td>
							<td>Total Harga</td>
							<td>Aksi</td>
							<td>Hapus</td>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1 ?>
						@forelse ($belanja as $pesanan)
						<tr>
							<td>{{ $no++ }}</td>

							<td>{{ $pesanan->created_at }}</td>

							<td>
								<?php $produk = \App\Models\Produk::where('id', $pesanan->produk_id)->first(); ?>
								<img src="{{ asset('storage/photos/'.$produk->gambar) }}" width="150px">
								<p>{{ $produk->nama }}</p>
							</td>

							<td>
								@if($pesanan->status == 0)
								<span class="badge badge-warning shadow rounded-pill"><strong>Pesanan Belum ditambahkan Ongkir</strong></span>
								@endif
								@if($pesanan->status == 1)
								<span class="badge badge-primary shadow rounded-pill"><strong>Pesanan Sudah ditambahkan Ongkir</strong></span>
								@endif
								@if($pesanan->status == 2)
								<span class="badge badge-success shadow rounded-pill"><strong>Pesanan Anda Sedang Diproses</strong></span>
								@endif
							</td>

							<td><strong>Rp. {{ number_format($pesanan->total_harga) }}</strong></td>

							<td>
								@if($pesanan->status == 0)
								<a href="{{ url('TambahOngkir/'.$pesanan->id) }}" class="btn btn-warning btn-block shadow rounded-pill">Tambahkan Ongkir</a> 
								@endif
								@if($pesanan->status == 1)
								<a href="{{ url('Bayar/'.$pesanan->id) }}" class="btn btn-primary btn-block shadow rounded-pill">Pilih Pembayaran</a> 
								@endif
								@if($pesanan->status == 2)
								<a href="{{ url('Bayar/'.$pesanan->id) }}" class="btn btn-success btn-block shadow rounded-pill">Lihat Status</a> 
								@endif
							</td>

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
