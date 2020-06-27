<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'name', 'last_name', 'additional_notes', 'address', 'phone'
    ];
    public function lines()
    {   
        return $this->hasMany('App\OrderLine');
    }

    public function user()
    {   
        return $this->belongsTo('App\User');
    }
}
