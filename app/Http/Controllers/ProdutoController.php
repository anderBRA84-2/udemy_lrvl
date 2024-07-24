<?php

namespace App\Http\Controllers;

use App\Models\{
    Product,
    Unidade,
    Iten,
    Fornecedor
};
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
       $produtos = Iten::with(['productDetail','fornecedores'])->simplePaginate(5);//com o metodo with usamas o eager loading passando o metodo do relacionamento em um array


        return view('app.produto.index', ['produtos' => $produtos, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $unidades = Unidade::all();
        $fornecedores = Fornecedor::all();

       // $produto = new Product();

       // $produto->create($request->all());()

       return view('app.produto.create',['unidades'=> $unidades, 'fornecedores' => $fornecedores]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $regras = [
            'fornecedor_id'=>'exists:fornecedors,id',
            'nome'=>'required|min:3|max:200',
            'descricao'=>'required|min:1|max:200',
            'peso'=>'required|integer',
            'unidade_id'=>'exists:unidades,id'

        ];

        $feedback = [
            'fornecedor_id.exists' => 'Fornecedor invalido',
            'required' => 'O campo :attribute deve ser preenchido',
            'name.min' => 'O nome deve ter no minimo 3 caracteres',
            'name.max' => 'O nome deve ter no maximo 200 caracteres',
            'descricao.min' => 'A Descricao deve ter no minimo 1 caractere',
            'descricao.max' => 'A Descricao deve ter no maximo 20 caracteres',
            'peso.integer'=>'Entrada Invalida',
            'unidade_id.exists' =>'unidade de medida invalida'

        ];

        $request->validate($regras, $feedback);

       Iten::create($request->all());



       return redirect()->route('produtos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Iten $produto)
    {
        //dd($produto);
        return view('app.produto.show',['produto' => $produto]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Iten $produto)
    {
        //
        $unidades= Unidade::all();
        $fornecedores = Fornecedor::all();

         return view('app.produto.edit',['produto'=>$produto, 'unidades'=>$unidades, 'fornecedores' => $fornecedores]);
         //return view('app.produto.create',['produto'=>$produto, 'unidades'=>$unidades]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Iten $produto)
    {


        $regras = [
            'fornecedor_id'=>'exists:fornecedors,id',
            'nome'=>'required|min:3|max:200',
            'descricao'=>'required|min:1|max:200',
            'peso'=>'required|integer',
            'unidade_id'=>'exists:unidades,id'

        ];

        $feedback = [
            'fornecedor_id.exists' => 'Fornecedor invalido',
            'required' => 'O campo :attribute deve ser preenchido',
            'name.min' => 'O nome deve ter no minimo 3 caracteres',
            'name.max' => 'O nome deve ter no maximo 200 caracteres',
            'descricao.min' => 'A Descricao deve ter no minimo 1 caractere',
            'descricao.max' => 'A Descricao deve ter no maximo 20 caracteres',
            'peso.integer'=>'Entrada Invalida',
            'unidade_id.exists' =>'unidade de medida invalida'

        ];

        $request->validate($regras, $feedback);
        //
        $request->all();//payload com dados atualizados

        $produto->getAttributes();//estancia di objeto no estado anterior a requisisao

        $produto->update($request->all());

        return redirect()->route('produtos.show',['produto'=>$produto->id]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Iten $produto)
    {
        //
        $produto->delete();

        return redirect()->route('produtos.index',['produto'=>$produto->id]);

                //commitr
    }
}
