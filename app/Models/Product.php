<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    protected $fillable = ['nome','descricao','peso','unidade_id'];

    public function productDetail(){
        return $this->hasOne('App\Models\ProductDetail');

    }

}
