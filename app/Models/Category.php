<?php

namespace codeDelivery\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
    	'name'
    ];


    public function products()
    {
    	return $this->hasMany(Product::class);
    }

    //retorna uma lista do nome de todas as categorias para o slect do _form
    public function lists()
    {
        return $this->pluck('name', 'id');
    }
}

