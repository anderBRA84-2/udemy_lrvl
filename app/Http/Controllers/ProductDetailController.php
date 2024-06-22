<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\{
    Unidade,
    ProductDetail

};

class ProductDetailController extends Controller
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
    public function create()
    {
        //
        $unidades = Unidade::all();

        return view('app.productDetail.create',['unidades'=> $unidades]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        ProductDetail::create($request->all());
        echo "cadastro realizado com sucesso";
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
    public function edit(ProductDetail $produtoDetalhe)//o objeto do tipo produto detalhes deve ser passado como paramentro pois o controlado não foi criado junto com o modelo
    {
        //
        $unidades = Unidade::all();
        return view('app.productDetail.edit', ['produto_detalhe'=>$produtoDetalhe, 'unidades'=>$unidades]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductDetail $produtoDetalhe)
    {
        //
        $produtoDetalhe->update($request->all());
        echo "Registro Atualizado com sucesso";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
