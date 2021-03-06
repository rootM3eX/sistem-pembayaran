<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function biodata_r()
    {
        return $this->hasOne('App\Models\Biodata','user_id','id')->withDefault(['no_hp'=>null,'alamat'=>null,'kelas'=>null]);
    }

    public function buys()
    {
        return $this->hasMany('App\Models\Buy','user_id','id');
    }

    public function bulan()
    {
        return $this->belongsTo('App\Models\Bulan','id');
    }
}
