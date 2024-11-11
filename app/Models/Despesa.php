<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Despesa extends Model
{
    // A tabela do banco de dados associada ao modelo
    protected $table = 'despesas';

    // Os atributos que podem ser atribuídos em massa
    protected $fillable = [
        'nome',
        'valor',
        'data',
        'id_usuario',
    ];

    public function resumoDespesas($idUsuario)
    {
        $despesas = $this->where('id_usuario', $idUsuario)
            ->orderBy('created_at', 'desc')
            ->get();

        $ultimasDespesas = $despesas->take(3);
        $totalDespesas = $despesas->sum('valor');

        return [$despesas, $ultimasDespesas, $totalDespesas];
    }
}