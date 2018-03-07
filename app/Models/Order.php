<?php

namespace codeDelivery\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
    	'client_id',
    	'user_delivery_man_id',
    	'total',
    	'status',
    ];


    public function items()
    {
    	return $this->hasMany(OrderItem::class);
    }

    public function deliveryMan()
    {
    	return $this->belongsTo(User::class);
    }

    public function products()
    {
    	return $this->hasMany(Product::class);
    }
}

