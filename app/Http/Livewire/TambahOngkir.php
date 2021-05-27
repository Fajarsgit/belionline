<?php

namespace App\Http\Livewire;

use App\Models\Belanja;
use App\Models\Produk;
use Livewire\Component;
use Kavist\RajaOngkir\RajaOngkir;
use Illuminate\Support\Facades\Auth;

class TambahOngkir extends Component
{	
	public $belanja;
	private $apiKey = 'fae066eb1e3cfbaf4da99158251efebc';
    public $provinsi_id, $kota_id, $jasa, $daftarProvinsi, $daftarKota, $nama_jasa;
    public $result = [];
    public function mount($id)
    {	
    	if(!Auth::user())
    	{
    		return redirect()->route('login');
    	}
    	$this->belanja = Belanja::find($id);

    	if($this->belanja->user_id != Auth::user()->id)
    	{
    		return redirect()->to('');
    	}
    }

    public function getOngkir()
    {
    	//validasi
    	if(!$this->provinsi_id || !$this->kota_id || !$this->jasa)
    	{
    		return;
			dd(kota_id);
    	}

    	//mengambil data produk
    	$produk = Produk::find($this->belanja->produk_id);

    	//mengambil biaya ongkir
    	$rajaOngkir = new RajaOngkir($this->apiKey);
    	$cost = $rajaOngkir->ongkosKirim([

    			'origin' => 55, //Kota Bekasi
    			'destination' => $this->kota_id, 
    			'weight' => $produk->berat,
    			'courier' => $this->jasa
    	])->get();
		
    	

    	//nama jasa
		$this->nama_jasa = $cost[0]['name'];



    	foreach ($cost[0]['costs'] as $row) 
    	{
    		$this->result[] = array(
    			'description' => $row['description'],
    			'biaya' => $row['cost'][0]['value'],
    			'etd' => $row['cost'][0]['etd']
    		);
    	}

    }

    public function save_ongkir($biaya_pengiriman)
    {
    	$this->belanja->total_harga += $biaya_pengiriman;
    	$this->belanja->status = 1;
    	$this->belanja->update();

    	//redirect ke halaman belanja
    	return redirect()->to('BelanjaUser');
    }

    public function render()
    {	
    	$rajaOngkir = new RajaOngkir($this->apiKey);
		$this->daftarProvinsi = $rajaOngkir->provinsi()->all();
		
		if($this->provinsi_id)
		{
			$this->daftarKota = $rajaOngkir->kota()->dariProvinsi($this->provinsi_id)->get();
		}


        return view('livewire.tambah-ongkir')->extends('layouts.app')->section('content');
    }
}
