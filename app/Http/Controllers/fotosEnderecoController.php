<?php

namespace App\Http\Controllers;

use App\Models\FotosEndereco;
use App\Models\Adress;
use Illuminate\Http\Request;

class fotosEnderecoController extends Controller
{

   public function store(Request $request)
   {
       $idAdress = $request->input('idEnd');
       $adress = Adress::find($idAdress);
       
       for($i=0; $i < count($request->allFiles()['images']); $i++){
            $foto = $request->allFiles()['images'][$i];

            $fotosEndereco = new FotosEndereco();
            $fotosEndereco->adress_id = $adress->id;
            $fotosEndereco->path = $foto->store('fotosEndereco/' . $adress->id);
            $fotosEndereco->save();
            unset($fotosEndereco);
       } 
   }
    
}
