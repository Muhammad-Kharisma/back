<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    protected $guarded = ['id'];
    public $table = 'kategori';
    
    public $fillable = ['nama_kategori'];
	public $timestamps = false;

    public function produks() {
    	return $this->hasMany('App\Model\produks');
    }
    public function penjualan_detail()
    {
    	return $this->hasMany('App\Model\detail_penjualan');
    }
}
