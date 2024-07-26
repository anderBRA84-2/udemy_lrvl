<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    Cliente,
};


class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $clientes = Cliente::simplePaginate(10);
        return view('app.cliente.index',['clientes' => $clientes, 'request' => $request->all() ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

       return view('app.cliente.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //


        $regras = [
            'name'=>'required|min:3|max:200'

        ];

        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'name.min' => 'O nome deve ter no minimo 3 caracteres'
        ];

          $request->validate($regras, $feedback);


           $clientes = new Cliente();
           $clientes->create($request->all());

           return redirect()->route('clientes.index');
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
