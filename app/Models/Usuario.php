<?php

namespace App\Models;

use Hefestos\Core\Model;

class Usuario extends Model
{
    // tabela do banco de dados ao qual o model está relacionado
    protected string $tabela = 'usuario';

    public function autenticar(string $email, string $senha): array|false
    {
        $usuario = $this->where('email', $email)->primeiro();

        if (!$usuario) {
            return false;
        }

        $checar_senha = password_verify($senha, $usuario['senha']);

        if (!$checar_senha) {
            return false;
        }

        unset($usuario['senha']);

        return $usuario;
    }
}
