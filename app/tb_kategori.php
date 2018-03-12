<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tb_kategori extends Model
{
    public function tb_barang(){
    	return $this->hashMany('App\tb_barang');
    }
}
