<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContato;

class ContatoController extends Controller
{
    public function contato (Request $request){

        //metodo onde é possivel salvar dados individualmento 
        $contato = new SiteContato();
        $contato->name = $request->input('name');
        $contato->telefone = $request->input('telefone');
        $contato->email = $request->input('email');
        $contato->motivo_contato = $request->input('motivo_contato');
        $contato->mensagem = $request->input('mensagem');
        $contato->save();

        //metodo para preenchimento em massa lembrando que o model deve ter o fillable dos dados a serem gravados 
      /*$contato = new SiteContato();
        $contato->create($request->all()); */
        return view('site.contato', ['title'=>'Contato']);
    }
}
