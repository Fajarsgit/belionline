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
	public $nama,$stock,$hargasebelumdiskon,$harga,$berat,$gambar,$nama_gambar;
	use WithFileUploads;
	use WithPagination;
	
	public $products = [];
	public $updateStateId = 0;
	public function show($id)
    {
        if(!Auth::user())
        {
            return redirect()->route('login');
        }
        // //mencari produk
        $products = Produk::find($id);
       
        $this->validate([
                'qty' => 'required'

        ]);

        
        Belanja::create(
            [
                'user_id' => Auth::user()->id,
                'total_harga' => $this->qty*$produk->harga,
                'produk_id' => $produk->id,
                'status' => 0
            ]
        );

        return view('livewire.tambah-produk');
    }
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
	public function delete($id)
	{
		$this->products = Produk::find($id);
		$this->products->delete();
	}
	

	public function showUpdateForm($id)
	{
		$this->products = Produk::find($id);
		$this->nama = $this->products->nama;
		$this->stock = $this->products->stock;
		$this->hargasebelumdiskon = $this->products->hargasebelumdiskon;
		$this->harga = $this->products->harga;
		$this->berat = $this->products->berat;
		$this->nama_gambar = $this->products->gambar;
		$this->updateStateId = $id;
	}

	public function update($id)
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
		$this->nama_gambar = md5($this->gambar . microtime()).'.'.$this->gambar->extension();
		Storage::disk('public')->putFileAs('photos', $this->gambar,$this->nama_gambar);

		$this->products = Produk::find($id);
		$this->products->nama = $this->nama;
		$this->products->stock = $this->stock;
		$this->products->hargasebelumdiskon = $this->hargasebelumdiskon;
		$this->products->harga = $this->harga;
		$this->products->berat = $this->berat;
		$this->products->gambar = $this->nama_gambar;
		
		$this->products->save();
		$this->emit('updatedData');
		$this->updateStateId = 0;
	}

    public function render()
    {
			$this->products = Produk::all();
			$this->belanja = Belanja::where('user_id',Auth::user()->id)->paginate(5);
			
			if(!$this->belanja)
			{
				return redirect()->to('');
			}
        return view('livewire.tambah-produk', ['belanja' => $this->belanja ])->extends('layouts.app')->section('content');
    }
}
