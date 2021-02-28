<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bulan extends Model
{
    protected $table = 'bulans';

    public function buys()
    {
        return $this->hasMany('App\Models\Buy','bulan_id','id');
    }
}
