<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $table = 'languages';
    protected $fillable = ['title', 'image', 'slogan'];

    public function products(){
        return $this->hasMany(Product::class);
    }
}
