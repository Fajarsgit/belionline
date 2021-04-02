<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Belanja;
use App\Models\Produk;
use Livewire\WithPagination;

class BelanjaUser extends Component
{	
	use WithPagination;
	
	public function mount()
	{
		//autentifikasi
		if(!Auth::user())
		{
			return redirect()->route('login');
		}

	}

	public function destroy($pesanan_id)
	{
		$pesanan = Belanja::find($pesanan_id);
		$pesanan->delete();
	}

    public function render()
    {	
    	if(Auth::user())
		{
			$this->belanja = Belanja::where('user_id',Auth::user()->id)->paginate(5);
		}
        return view('livewire.belanja-user', ['belanja' => $this->belanja ])->extends('layouts.app')->section('content');
    }
}
