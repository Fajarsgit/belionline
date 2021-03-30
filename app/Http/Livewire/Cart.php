<?php

namespace App\Http\Livewire;

use App\Models\Belanja;
use Livewire\Component;
use App\Models\Produk;
use Illuminate\Support\Facades\Auth;

class Cart extends Component
{	
	public $products = [];

	//attribute filtering
	public $search,$min,$max;
    public $qty;
    public $product;
    public function mount($id)
    {
    	$productDetail = Produk::find($id);

    	if($productDetail)
    	{
    		$this->product = $productDetail;
    	}
    }

     public function beli($id)
    {
        if(!Auth::user())
        {
            return redirect()->route('login');
        }
        // //mencari produk
        // $product->id = Produk::find($id);
        $this->validate([
                'qty' => 'required'

        ]);

        
        Belanja::create(
            [
                'user_id' => Auth::user()->id,
                'total_harga' => $this->qty*$this->product->harga,
                'produk_id' => $this->product->id,
                'status' => 0
            ]
        );

        return redirect()->to('BelanjaUser');
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
    	

        return view('livewire.cart')->extends('layouts.app')->section('content');
    }
}
