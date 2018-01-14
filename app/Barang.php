<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    public $table = 'barangs';
    
    protected $fillable = ['id_barang','nama_barang','harga_barang','jumlah_barang'];
    //
}
