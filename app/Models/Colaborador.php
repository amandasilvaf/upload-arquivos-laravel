<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ColaboradorArquivo;

class Colaborador extends Model
{
    use HasFactory;

    public function arquivos()
    {
        return $this->hasMany(ColaboradorArquivo::class);
    }
}
