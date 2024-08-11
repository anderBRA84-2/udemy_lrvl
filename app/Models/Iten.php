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

        /*
            1 - Modelo do relacionamento NxN em relação o Modelo que estamos implementando
            2 - É a tabela auxiliar que armazena os registros de relacionamento
            3 - Representa o nome da FK da tabela mapeada pelo model na tabela de relacionamento
            4 - Representa o nome da FK da tabela mapeada pelo model utilizado no relacionamento que estamos implementando
        */
    }

}
