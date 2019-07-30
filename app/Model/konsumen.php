<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class konsumen extends Model
{
	public $fillable = ['nama_konsumen', 'jk', 'no_telp', 'alamat', 'user_id','email'];
	
	public $table = 'konsumen';

	public function penjualan() {
		return $this->hasMany('App\Model\penjualan');
	}
	public function detail_penjualan() {
		return $this->hasMany('App\Model\detail_penjualan');
	}
}
