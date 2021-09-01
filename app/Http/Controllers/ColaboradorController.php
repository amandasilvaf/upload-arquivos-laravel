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
    public function index()
    {

        return view('colaboradores.index');
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
        $colaborador = new Colaborador();
        $colaborador->nome = $request->nome;
        $colaborador->cargo = $request->cargo;
        $colaborador->save();

         if($request->hasFile('images')){
             for($i = 0; $i < count($request->allFiles()['images']); $i++){
                $file = $request->allFiles()['images'][$i];

                $colaboradorArquivo = new ColaboradorArquivo();
                $colaboradorArquivo->colaboradores_id = $colaborador->id;
                $colaboradorArquivo->caminho = $file->store('colaboradores/' . $colaborador->id);
                $colaboradorArquivo->save();
                unset($colaboradorArquivo); 
             }
         }
         dd($colaborador);
        // return redirect(route('colaboradores'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $colaborador)
    {
        //dd($colaborador);
       //$colaborador = Colaborador::where('id', '=', $id)->with('arquivos');
        //dd($colaborador);
        return view('colaboradores.show', ['colaborador' => $colaborador]);
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
