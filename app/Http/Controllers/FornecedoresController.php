<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fornecedor;

class FornecedoresController extends Controller
{
    public function index (){

        return view('app.fornecedor.index');
    }

    public function listar (){
        return view('app.fornecedor.listar');
    }

    public function adicionar (Request $request){

        $msg = '';

        if($request->input('_token') != ''){
            //validação
            $regras = [
                'name'=>'required|min:3|max:50',
                'site'=>'required',
                'uf'=>'required|min:2|max:2',
                'email'=>'email'
            ];

            $feedback = [
                'required' => 'O campo :attribute deve ser preenchido',
                'name.min' => 'O nome deve ter no minimo 3 caracteres',
                'name.max' => 'O nome deve ter no maximo 50 caracteres',
                'uf.min' => 'A UF deve ter no minimo 2 caracteres',
                'uf.max' => 'A UF deve ter no maximo 2 caracteres',
                'email.email' => 'O email não foi preenchido corretamente'
            ];

            $request->validate($regras, $feedback);

            $fornecedor = new Fornecedor();
            $fornecedor->create($request->all());

            $msg = 'Cadastro Realizado com Sucesso';

        };



        return view('app.fornecedor.adicionar', ['msg'=> $msg]);
    }
}
