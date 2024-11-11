<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfiguracoesUsuario extends Model
{
    use HasFactory;

    protected $table = 'configuracoes_usuarios';

    protected $primaryKey = 'id_configuracao';

    protected $fillable = [
        'id_users',
        'preferencias',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_users'); 
    }
}
