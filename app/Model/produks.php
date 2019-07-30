<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class produks extends Model
{
	// protected $guarded = ['id'];
	// public $table = 'produks';

	public $fillable = ['nama_produks', 'jumlah', 'hargabeli', 'hargajual', 'kategori_id','gambar','deskripsi'];
	public $timestamps = false;

	public function kategori() {
		return $this->belongsTo('App\Model\kategori');
	}
	public function penjualan() {
		return $this->hasMany('App\Model\penjualan');
	}
	public function detail_penjualan() {
		return $this->hasMany('App\Model\detail_penjualan');
	}
	public function getGambar()
    {
        # code...
        if (!$this->gambar) {
            # code...
            return asset('css_admin/img/default.png');
        }
        return asset('css_admin/img/'.$this->gambar);
    }
}
