<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = ['nama','lapangan','jammulai','jamselesai','tgl'];

    protected $hidden = ['created_at','updated_at'];
}
