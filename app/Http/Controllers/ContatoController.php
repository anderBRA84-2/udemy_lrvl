<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContato;
use App\Models\MotivoContato;

class ContatoController extends Controller
{
    public function contato (Request $request){

      $motivo_contato = MotivoContato::all();

      /* $motivo_contato = [
        '1' => 'Dúvida',
        '2' => 'Eleogio',
        '3' => 'Reclamação'
      ];*/

        //metodo onde é possivel salvar dados individualmento
        /* $contato = new SiteContato();
        $contato->name = $request->input('name');
        $contato->telefone = $request->input('telefone');
        $contato->email = $request->input('email');
        $contato->motivo_contato = $request->input('motivo_contato');
        $contato->mensagem = $request->input('mensagem');
        $contato->save();

        //metodo para preenchimento em massa lembrando que o model deve ter o fillable dos dados a serem gravados
      /*$contato = new SiteContato();
        $contato->create($request->all()); */
        return view('site.contato', ['title'=>'Contato', 'motivo_contato' => $motivo_contato]);
    }

    public function salvar(Request $request){



        //regras de validacao sao separadas pelo pipe |
        $regras = [
          'name'=>'required|min:3|max:150',
          'telefone'=>'required|max:11|unique:site_contatos',
          'email'=>'email|unique:site_contatos', // O atributo email valida se o dado inserido é um email
          'motivo_contato_id'=>'required',
          'mensagem'=>'required|max:2000'
        ];
         //a customização da validção pode ser feita de uma forma generalizada usando somente o atributo ex 'required'=>'o campo : attribute deve ser preenchido'
        $feedback = [
            'name.required'=>'O nome precisa ser preenchido',
            'name.min'=>'O nome precisa ter no minimo 3 caracteres',
            'name.max'=>'O nome precisa ter no maximo 50 caracteres',
            'telefone.required'=>'O telefone precisa ser preenchido',
            'telefone.max'=>'Formato de Telefone invalido',
            'telefone.unique'=>'Telefone ja cadastrado',
            'email.email'=>'por favor insira um email',
            'email.unique'=>'email ja cadastrado',
            'motivo_contato_id.required'=> 'Qual é o motivo do contato ?',
            'mensagem.required'=>'Insira a sua mensagem',
            'mensagem.max'=>'A mensagem pssui mais de 2000 caracteres'
        ];

         // validacao
        $request->validate($regras,$feedback);

        SiteContato::create($request->all());

        return redirect()->route('site.index');


    }
}
