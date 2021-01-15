<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StokBaju extends Model
{
    protected $table = "stok_baju";
    protected $fillable = ['baju_id' , 'small','medium','large','extralarge'];

    public function baju(){
        return $this->belongsTo(Baju::class , 'baju_id' , 'id');
    }
}
