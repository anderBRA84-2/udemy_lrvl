<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = ['cliente_id'];
    use HasFactory;

    public function produtos () {
       return $this->belongsToMany('App\Models\Iten','pedido_produtos','pedido_id','product_id');

       /*
       1- Modelo do relacionamento NxN em relação ao modelo que estamos implementando
       2- a tabela auxiliar que armazena os registros do relacionamento
       3 - A FK da tabela mapeada pelo modelo na tabela de relacionamento
       4 -




       */
    }
}
