<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\{
    Unidade,
    ProductDetail,
    ItenDetail

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

        ItenDetail::create($request->all());
        echo "cadastro realizado com sucesso";
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //entrada para forcar commit

    }

    /**
     * Show the form for editing the specified resource.
     * @param integer $id
     * @return \Illuminate\Http\Response
     */


    public function edit( $id/*ItenDetail $produtos_detalhe*/)//o objeto do tipo produto detalhes deve ser passado como paramentro pois o controlado não foi criado junto com o modelo
    {
        //
        $produtos_detalhe = ItenDetail::with(['product'])->find($id);
        $unidades = Unidade::all();
        return view('app.productDetail.edit', ['produtos_detalhe'=>$produtos_detalhe, 'unidades'=>$unidades]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ItenDetail $produtos_detalhe)
    {
        //
        $produtos_detalhe->update($request->all());
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
