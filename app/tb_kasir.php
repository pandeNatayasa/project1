<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tb_kasir extends Model
{
    public function tb_nota(){
    	return $this->hashMany('App\tb_nota');
    }
}
