<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{

    protected $table = 'products';
    protected $fillable = ['language_id', 'name', 'description', 'image', 'price'];

}
