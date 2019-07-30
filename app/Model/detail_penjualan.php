<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class detail_penjualan extends Model
{
	protected $guarded = ['id'];
	public $table = 'detail_penjualan';

    public function penjualan() {
		return $this->belongsTo('App\Model\penjualan');
	}
	public function produks() {
		return $this->belongsTo(produks::class);
	}
	public function kategori() {
		return $this->belongsTo(kategori::class);
	}
	public function konsumen() {
		return $this->belongsTo(konsumen::class);
	}
}
