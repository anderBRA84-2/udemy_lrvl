<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Middleware\{
    LogAcessoMiddleware
};

class SobreNosController extends Controller
{
     /**
     * Class constructor.
     */
    public function __construct()
    {
        $this->Middleware(LogAcessoMiddleware::class);
    }

    public function sobrenos (){
        return view('site.sobrenos', ['title'=>'Sobre Nós']);
    }
}
