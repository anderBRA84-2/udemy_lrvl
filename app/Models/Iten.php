<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Iten extends Model
{
    //uso de modelos com nomes não padronizados as tabelas/migrations
    use HasFactory;
    protected $table = 'products';//usamos para indicar que a classe deve mapear a tabela 'products'

    protected $fillable = ['fornecedor_id','nome','descricao','peso','unidade_id'];

    public function productDetail(){
        return $this->hasOne('App\Models\ItenDetail', 'product_id','id');//passamos como parametro a fk da tabela product detail e pk da tabela produta para fazer o relacionamento sem a convencao do eloquent

    }

    public function fornecedores(){
        return $this->belongsTo('App\Models\Fornecedor', 'fornecedor_id', 'id');
    }

    public function pedidos (){

        return $this->belongsToMany('App\Models\Pedido', 'pedido_produtos', 'product_id', 'pedido_id');

    }

}
