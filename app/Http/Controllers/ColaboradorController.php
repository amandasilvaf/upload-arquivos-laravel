<?php

namespace App\Http\Controllers;

use App\Models\Colaborador;
use App\Models\ColaboradorArquivo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ColaboradorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $colaboradores = Colaborador::all();
        return view('colaboradores.list', compact('colaboradores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('colaboradores.new');
    }

    public function store(Request $request)
    {
    //     $colaborador = $request->all();
    //    // dd($colaborador);
    //     $foto = $request->image;
    //     //dd($foto);
    //     $nomeFoto = uniqid(date('HisYmd'));
    //     $extensao = $foto->extension();
    //     $nomeArquivo = "{$nomeFoto}.{$extensao}";
    //     $colaborador['foto'] = $foto->storeAs('colaboradores', $nomeArquivo);

    //     Colaborador::create($colaborador);
    //     return redirect()->route('colaboradores');

           $colaborador = new Colaborador();
           $colaborador->nome = $request->nome;
           $colaborador->cargo = $request->cargo;
           $foto = $request->file('image');
           $imageName = time().'.'.$foto->extension();
           $foto->move(public_path('colaboradores'), $imageName);
           $colaborador->foto = $imageName;
           $colaborador->save();
           return redirect()->route('colaboradores');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
