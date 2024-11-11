<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Usuario extends Model
{
    // A tabela do banco de dados associada ao modelo
    protected $table = 'usuarios';

    // Os atributos que podem ser atribuídos em massa
    protected $fillable = [
        'nome',
        'email',
        'senha',
    ];

    // Os atributos que devem ser ocultados para serialização
    protected $hidden = [
        'senha',
    ];

    public function autenticar($email, $senha): ?array
    {
        $usuario = $this->where('email', $email)->first();

        if (!$usuario) {
            return null;
        }

        if (!Hash::check($senha, $usuario->senha)) {
            return null;
        }

        $usuarioData = $usuario->toArray();
        unset($usuarioData['senha']);

        return $usuarioData;
    }
}