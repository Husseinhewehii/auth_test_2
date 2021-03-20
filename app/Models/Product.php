<?php

namespace App\Models;

use App\Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    use HasTranslations;

    protected $table = 'products';
    public $translatable = ['name', 'description'];
    protected $fillable = ['language_id', 'name', 'description', 'image', 'price'];

}
