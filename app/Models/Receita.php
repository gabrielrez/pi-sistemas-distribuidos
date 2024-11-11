<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Receita extends Model
{
    // A tabela do banco de dados associada ao modelo
    protected $table = 'receitas';

    // Os atributos que podem ser atribuídos em massa
    protected $fillable = [
        'nome',
        'valor',
        'data',
        'id_usuario',
    ];

    public function getResumoReceitas($idUsuario)
    {
        $receitas = $this->where('id_usuario', $idUsuario)
            ->orderBy('created_at', 'desc')
            ->get();

        $ultimasReceitas = $receitas->take(3);
        $totalReceitas = $receitas->sum('valor');

        return [$receitas, $ultimasReceitas, $totalReceitas];
    }
}