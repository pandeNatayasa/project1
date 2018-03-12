<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tb_detail_nota extends Model
{
    public function tb_barang(){
    	return $this->belongsTo('App\tb_barang','id_barang');
    }
    public function tb_nota(){
    	return $this->belongsTo('App\tb_nota','id_nota');
    }
}
