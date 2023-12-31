<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesteController extends Controller
{
    public function teste ($p1,$p2){
        //passagem de parametro da rota para o controller
        echo "A soma de $p1 + $p2 é ".($p1+$p2);
        
        //passagem de parametro do controller para a view
       // return view('site.teste',['p1'=>$p1,'p2'=>$p2]); //array associativo
       //return view('site.teste',compact('p1','p2'));//metodo compact
       return view('site.teste')->with('p1',$p1)->with('p2',$p2);//metodo with

    }
}
