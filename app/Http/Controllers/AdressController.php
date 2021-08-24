<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Enums\TipoEndereco;
use App\Models\Adress;
use App\Models\TipoEndereco;

class AdressController extends Controller
{
    
    public function getTypes()
    {
        // $tipos = TipoEndereco::getValues();
        $tipos = TipoEndereco::all();
        return json_encode($tipos);

    }

    public function getAdresses()
    {
        $enderecos = Adress::all();
        return json_encode($enderecos);

    }

    public function getType($id)
    {
        $tipo = TipoEndereco::findOrFail($id);
        return json_encode($tipo);
    }
    
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $e = new Adress();
        $e->logradouro = $request->input('logradouro');
        $e->numero = $request->input('numero');
        $e->bairro = $request->input('bairro');
        $e->cep = $request->input('cep');
        $e->cidade = $request->input('cidade');
        $e->estado = $request->input('estado');
        $e->tipo_enderecos_id = $request->input('tipo');
        $e->user_id = $request->input('user_id');
        $e->save();

        return json_encode($e);

    }


    public function show($id)
    {
        $e = Adress::find($id);
        if(isset($e)){
            return json_encode($e);
        }
        return response('Endereço não encontrado', 404);
    }

    public function edit($id)
    {
        //
    }

   
    public function update(Request $request, $id)
    {
        $e = Adress::find($id);
        if(isset($e)){
            $e->logradouro = $request->input('logradouro');
            $e->numero = $request->input('numero');
            $e->bairro = $request->input('bairro');
            $e->cep = $request->input('cep');
            $e->cidade = $request->input('cidade');
            $e->estado = $request->input('estado');
            $e->tipo_enderecos_id = $request->input('tipo');
            $e->user_id = $request->input('user_id');
            $e->save();
            return json_encode($e);
        }
        return response('Endereço não encontrado', 404);
    }

   
    public function destroy($id)
    {
        $endereco = Adress::find($id);
        if(isset($endereco)){
            $endereco->delete();
            return response('Ok', 200);
        }
        return response('Endereço não encontrado', 404);
    }
}