<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    protected $guarded = ['kd_barang'];
    public $table = 'barang';
}
