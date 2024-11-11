<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meta extends Model
{
    use HasFactory;

    protected $table = 'metas';

    protected $fillable = [
        'descricao',
        'valor_alvo',
        'data_meta',
        'id_usuario',
    ];

    public function getMetasPorUsuario($idUsuario)
    {
        return $this->where('id_usuario', $idUsuario)
                    ->get();
    }
}