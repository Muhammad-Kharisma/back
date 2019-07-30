<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class penjualan extends Model
{
    protected $guarded = ['id'];
	public $table = 'penjualan';

	public function konsumen() {
		return $this->belongsTo('App\Model\konsumen');
	}
	public function produks() {
		return $this->belongsTo('App\Model\produks');
	}
	public function detail_penjualan()
    {
    	return $this->hasMany('App\Model\detail_penjualan');
    }
}
