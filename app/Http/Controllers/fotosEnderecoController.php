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
           
            $imageName = time().'.'.$foto->extension();
            $foto->move(public_path('storage/fotosEndereco'), $imageName);
        
            $fotosEndereco->path = $imageName;

            $fotosEndereco->save();
            unset($fotosEndereco);
       } 

       return redirect('/usuarios/' . $idAdress);
   }

//    public function show($idAdress)
//    {
//         $fotos = FotosEndereco::where('adress_id', '=', $idAdress);
//         return view('adresses.all', ['fotosEndereco' => $fotos]); 
//    }

    public function getFotos($idAdress){
        $fotos = FotosEndereco::where('adress_id', '=', $idAdress)->get();
        //dd($fotos);

        // foreach ($fotos as $f) {
        //    var_dump($f->path);
        // }
        return json_encode($fotos);
    }
    
}
