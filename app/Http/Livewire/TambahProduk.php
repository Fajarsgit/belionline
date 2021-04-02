<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use App\Models\Produk;
use App\Models\Belanja;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Livewire\Component;

class TambahProduk extends Component
{   
	public $nama,$stock,$hargasebelumdiskon,$harga,$berat,$gambar;
	use WithFileUploads;
	use WithPagination;
	
	public $produk = [];
	public function mount()
	{
		if (Auth::user()) 
		{
			if (Auth::user()->level !== 1)
			{
				return redirect()->to('');
			}
		}
	}

	public function store()
	{
		//validasi
		$this->validate(
			[
				'nama' => 'required',
				'stock' => 'required',
				'hargasebelumdiskon' => 'required',
				'harga' => 'required',
				'berat' => 'required',
				'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
			]
		);

		//pemrosesan data file gambar
		$nama_gambar = md5($this->gambar . microtime()).'.'.$this->gambar->extension();
		Storage::disk('public')->putFileAs('photos', $this->gambar,$nama_gambar);


		//memasukan data ke database
		Produk::create(
				[
					'nama' => $this->nama,
					'stock' => $this->stock,
					'hargasebelumdiskon' => $this->hargasebelumdiskon,
					'harga' => $this->harga,
					'berat' => $this->berat,
					'gambar' => $nama_gambar



				]
		    );

			//redirect
			return redirect()->to('');
	}

	public function destroy($pesanan_id)
	{
		$pesanan = Belanja::find($pesanan_id);
		$pesanan->delete();
	}

	public function show($id)
	{
		$p->id = Produk::find($id);
	}

	public function update($id)
	{
		$pesanan = Belanja::find($id);
	}

    public function render()
    {
    	if(Auth::user())
		{
			$this->belanja = Belanja::where('user_id',Auth::user()->id)->paginate(5);
		}
        return view('livewire.tambah-produk', ['belanja' => $this->belanja ])->extends('layouts.app')->section('content');
    }
}
