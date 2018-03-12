<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tb_nota extends Model
{
    public function tb_pembeli(){
    	return $this->belongsTo('App\tb_pembeli','id_pembeli');
    }
    public function tb_kasir(){
    	return $this->belongsTo('App\tb_kasir','id_kasir');
    }
    public function tb_detail_nota(){
    	return $this->hashMany('App\tb_nota');
    }
}
