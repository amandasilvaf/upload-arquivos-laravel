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
        $colaboradores = Colaborador::all();
        return view('colaboradores.index', compact('colaboradores'));
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
        $data = $request->all();
        // dd($data);
        $foto = $request->image;
        $extensao = $foto->extension();
       // $nomeFoto = md5($foto->getClientOriginalName() . strtotime("now") . "." . $extensao);
        $foto->move(public_path('img/colaboradores//temp/'));

        $data['foto'] = $foto;

        Colaborador::create($data);
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
