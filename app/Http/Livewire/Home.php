<?php

namespace App\Http\Livewire;

use App\Models\Produk;
use App\Models\Belanja;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Home extends Component
{	
	public $products = [];

	//attribute filtering
	public $search,$min,$max;
    public $qty;
    public function beli($id)
    {
        if(!Auth::user())
        {
            return redirect()->route('login');
        }
        // //mencari produk
        $product->id = Produk::find($id);
        // $this->validate([
        //         'qty' => 'required'

        // ]);

        
        // Belanja::create(
        //     [
        //         'user_id' => Auth::user()->id,
        //         'total_harga' => $this->qty*$produk->harga,
        //         'produk_id' => $produk->id,
        //         'status' => 0
        //     ]
        // );

        return redirect()->to('Cart');
    }

    public function render()
    {
    	//filter harga max
    	if($this->max) 
    	{
    		$harga_max = $this->max;
    	}
    	else
    	{
    		$harga_max = 500000000000;
    	}

    	//filter harga min
    	if($this->min) 
    	{
    		$harga_min = $this->min;
    	}
    	else
    	{
    		$harga_min = 0;
    	}


    	if($this->search)
    	{
    		$this->products = Produk::where('nama','like','%'.$this->search.'%')
    									->where('harga','>=',$harga_min)
    									->where('harga','<=',$harga_max)
    									->get();
    	}
    	else
    	{
    		$this->products = Produk::where('harga','>=',$harga_min)
    									->where('harga','<=',$harga_max)
    									->get();
    	}
    	

        return view('livewire.home')->extends('layouts.app')->section('content');
    }
}
