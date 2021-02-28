<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    protected $table = 'biodata';

    public function user_r()
    {
        return $this->belongsTo('App\User','id');
    }
}
