<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Caption extends Model
{
    public function image()
    {
        return $this->belongsTo('App\Image');
    }
}
