<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    public function pesanan_detail(){
        return $this->hasMany('App\PesananDetail','obat_id','id');
    }
}
