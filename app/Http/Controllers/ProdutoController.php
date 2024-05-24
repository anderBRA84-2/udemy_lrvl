<?php

namespace App\Http\Controllers;

use App\Models\{
    Product,
    Unidade
};
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
       $produtos = Product::simplePaginate(5);


        return view('app.produto.index', ['produtos' => $produtos, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $unidades = Unidade::all();

       // $produto = new Product();

       // $produto->create($request->all());

        return view('app.produto.create',['unidades'=> $unidades]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $regras = [
            'nome'=>'required|min:3|max:200',
            'descricao'=>'required|min:1|max:200',
            'peso'=>'required|integer',
            'unidade_id'=>'exists:unidades,id'
        ];

        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'name.min' => 'O nome deve ter no minimo 3 caracteres',
            'name.max' => 'O nome deve ter no maximo 200 caracteres',
            'descricao.min' => 'A Descricao deve ter no minimo 1 caractere',
            'descricao.max' => 'A Descricao deve ter no maximo 20 caracteres',
            'peso.integer'=>'Entrada Invalida',
            'unidade_id.exists' =>'unidade de medida invalida'

        ];

        $request->validate($regras, $feedback);

        Product::create($request->all());



       return redirect()->route('app.produtos',['msg'=> $msg]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Produto $produto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produto $produto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produto $produto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produto $produto)
    {
        //
    }
}
