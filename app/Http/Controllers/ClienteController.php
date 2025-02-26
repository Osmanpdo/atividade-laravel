<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Cliente::all();
        return view('cliente.show_clientes', ['clientes' => $clientes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cliente.create_form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cliente = new Cliente();
        $cliente->nome = $request->input('nome');
        $cliente->dt_nasc = $request->input('dt_nasc');
        $cliente->whatsapp = $request->input('whatsapp');
        $cliente->cpf = $request->input('cpf');
        $cliente->foto = $request->input('foto');
        
        $cliente->save();
        
        return redirect('clientes/create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cliente = Cliente::find($id);

        if (!$cliente) {
            abort(404, 'Cliente não encontrado');
        }

        return view('cliente.show_cliente', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cliente = Cliente::find($id);

        if (!$cliente) {
            abort(404, 'Cliente não encontrado');
        }

        return view('cliente.edit_cliente', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cliente = Cliente::findOrFail($id);

        $cliente->nome = $request->input('nome');
        $cliente->dt_nasc = $request->input('dt_nasc');
        $cliente->whatsapp = $request->input('whatsapp');
        $cliente->cpf = $request->input('cpf');
        $cliente->foto = $request->input('foto');

        $cliente->save();

        return redirect('clientes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cliente = new Cliente();
        $cliente->destroy($id);

        return redirect('clientes');
    }
}
