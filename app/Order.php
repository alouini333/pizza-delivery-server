<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $casts = [
        'created_at' => 'datetime:Y-m-d h:i',
    ];

    protected $fillable = [
        'name', 'last_name', 'additional_notes', 'address', 'phone', 'city', 'post_code'
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
