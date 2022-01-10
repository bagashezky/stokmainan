<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mainan extends Model
{
    protected $fillable = ['mainan_name', 'mainan_stok', 'mainan_price'];
}
