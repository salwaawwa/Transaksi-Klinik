<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PesananDetail extends Model
{
    public function obat(){
        return $this->belongsTo('App\Obat','obat_id','id');
    }
    
    public function pesanan(){
        return $this->belongsTo('App\Pesanan','pesanan_id','id');
    }
}
