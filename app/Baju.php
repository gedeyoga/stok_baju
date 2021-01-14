<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Baju extends Model
{
    protected $table = 'baju';
    protected $fillable = ['nama','merk','jenis','warna'];
}
