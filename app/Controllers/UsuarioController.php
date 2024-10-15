<?php

namespace App\Controllers;

use Hefestos\Core\Controller;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    protected $usuario_model;

    public function __construct()
    {
        $this->usuario_model = new Usuario();
    }

    public function cadastro()
    {
        $usuario = $this->dadosPost();

        $usuario_existe = $this->usuario_model->primeiroOnde(['email' => $usuario['email']], 'email');
        if ($usuario_existe) {
            return redirecionar('/cadastro')
                ->com('feedback', 'Já existe um usuário com esse email');
        }

        $usuario['senha'] = encriptar($usuario['senha']);
        $this->usuario_model->insert($usuario);

        return redirecionar('/login');
    }

    public function login()
    {
        $email ??= $this->dadosPost('email');
        $senha ??= $this->dadosPost('senha');

        $usuario_autenticado = $this->usuario_model->autenticar($email, $senha);
        if (!$usuario_autenticado) {
            return redirecionar('/login')
                ->com('feedback', 'Email ou senha incorretos.');
        }

        sessao()->guardar('usuario', $usuario_autenticado);

        return redirecionar('/dashboard');
    }

    public function logout()
    {
        sessao()->destruir();
        return redirecionar('/');
    }
}
