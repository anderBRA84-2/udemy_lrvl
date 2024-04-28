<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    User,

};


class LoginController extends Controller
{
    //
    public function index () {

        return view('site.login', ['title' => 'LOGIN']);

    }

    public function autenticar (Request $request){
        
        //regras
        $regras = [
            'usuario'=>'email',
            'senha'=>'required',

        ];
        // mensagen de feedback de validacao
        $feedback = [
            'usuario.email' => 'O campo usuario é obrigatório',
            'senha.required' => 'O campo senha é obrigatório',

        ];
        
        //caso nao passe na validacao 
        $request->validate($regras, $feedback);

        //validando a esistencia de usuario no banco de dados
        //as variaveis sao criadas conforme o nome do campo no banco de dados 
        $email = $request->get('usuario');
        $password = $request->get('senha');

        //iniciar o model user
        $user = new User();

        $usuario = $user->where('email', $email)->where('password', $password)->get()->first();

        if(isset($usuario->name)){
            echo "usuario existe";
        } else{
            echo "usuario nao existe";
        };
        

    }
}
