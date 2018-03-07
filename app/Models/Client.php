<?php

namespace codeDelivery\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
    	'user_id',
    	'phone',
    	'address',
    	'city',
    	'state',
    	'zipcode'
    ];


    public function user()
    {
    	//return $this->hasOne(User::class, 'id', 'user_id');
        return $this->belongsTo(User::class);
    }
}

