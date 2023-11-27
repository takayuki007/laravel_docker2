<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $fillable = ['name', 'img', 'tel', 'open_time', 'close_time', 'regular_holiday', 'location', 'access', 'area', 'os'];
}
