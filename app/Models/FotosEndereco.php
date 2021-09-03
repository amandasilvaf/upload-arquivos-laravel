<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FotosEndereco extends Model
{
    
    protected $table = 'fotos_endereco';

    use HasFactory;

    public function adresses(){
        return $this->belongsTo(Adress::class);
    }
}

