<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItenDetail extends Model
{
    use HasFactory;

    protected $fillable = ['product_id','comprimento','largura','altura','peso','unidade_id'];

    protected $table = 'product_details';
    public function product (){
        return $this->belongsTo('App\Models\Iten','product_id', 'id');

    }
}
