<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    Pedido,
    Iten,
    PedidoProduto,
    Cliente,
    Product
};

class PedidoProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Pedido $pedido)
    {
        //
        $produtos = Iten::all();

       // dd($cliente);
       $pedido->produtos;
        return view('app.pedido-produto.create',['pedido' => $pedido, 'produtos' => $produtos]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Pedido $pedido)
    {
        //
        $regras = [
            'produto_id' =>'exists:products,id',
        ];

        $feedback = [
            'produto_id.exists'=>'Insira um produto',
        ];

        $request->validate($regras,$feedback);

        $pedidoProduto = new PedidoProduto();
        $pedidoProduto->pedido_id = $pedido->id;//esta injetado no metodo store PEDIDO ID
        $pedidoProduto->product_id = $request->get('produto_id');/// requisiao PRODUCT ID
        $pedidoProduto->save();
        return redirect()->route('pedido-produto.create',['pedido' => $pedido->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
