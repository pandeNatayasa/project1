<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tb_barang extends Model
{
    public function tb_satuan(){
    	return $this->belongsTo('App\tb_satuan','id_satuan');
    }
    public function tb_kategori(){
    	return $this->belongsTo('App\tb_kategori','id_kategori');
    }

    public function tb_nota_barang(){
    	return $this->hashMany('App\tb_detail_nota');
    }
}
