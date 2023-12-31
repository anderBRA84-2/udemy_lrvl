<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedoresController extends Controller
{
    public function index (){
        $fornecedores = [
            0 => ['nome' => 'fornecedor 1', 'status' => 'N','cnpj'=>'00.000.000/000-00','ddd'=>'21','telefone'=>'0000-0000'],
            1 => ['nome' => 'fornecedor 2', 'status' => 'S','cnpj'=>'','ddd'=>'21','telefone'=>'0000-0000'],
            2 => ['nome' => 'fornecedor 3', 'status' => 'N','cnpj'=>'00.000.000/000-00','ddd'=>'21','telefone'=>'0000-0000'],
            3 => ['nome' => 'fornecedor 4', 'status' => 'S','cnpj'=>'00.000.000/000-00','ddd'=>'21','telefone'=>'0000-0000'],
            4 => ['nome' => 'fornecedor 5', 'status' => 'N','cnpj'=>'00.000.000/000-00','ddd'=>'21','telefone'=>'0000-0000']
        ];
        return view('app.fornecedor.index',compact('fornecedores'));
    }
}
