<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buy extends Model
{
    protected $table = 'buys';

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id','id');
    }

    public function bulan()
    {
        return $this->belongsTo('App\Models\Bulan', 'bulan_id','id');
    }
}
