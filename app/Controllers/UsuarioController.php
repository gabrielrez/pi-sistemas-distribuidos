<?php

namespace App\Controllers;

use Hefestos\Core\Controller;
use app\Models\Usuario;

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

        if (empty($usuario['nome']) || empty($usuario['email']) || empty($usuario['senha'])) {
            return redirecionar('/cadastro')
                ->com('feedback', 'Preencha todos os campos.');
        }

        $usuario_existe = $this->usuario_model->primeiroOnde(['email' => $usuario['email']], 'email');

        if (!$usuario_existe) {
            $usuario['senha'] = password_hash($usuario['senha'], PASSWORD_DEFAULT);
            $this->usuario_model->insert($usuario);

            return redirecionar('/login');
        }

        return redirecionar('/cadastro')
            ->com('feedback', 'Já existe um usuário com esse email');
    }

    public function login()
    {
        $usuario = $this->dadosPost();

        if (empty($usuario['email']) || empty($usuario['senha'])) {
            return redirecionar('/login')
                ->com('feedback', 'Preencha todos os campos.');
        }

        $usuario_existe = $this->usuario_model->primeiroOnde(['email' => $usuario['email']]);

        if ($usuario_existe && password_verify($usuario['senha'], $usuario_existe['senha'])) {
            sessao()->guardar('id', $usuario_existe['id']);
            sessao()->guardar('nome', $usuario_existe['nome']);
            sessao()->guardar('email', $usuario_existe['email']);

            return redirecionar('/');
        }

        return redirecionar('/login')
            ->com('feedback', 'Email ou/e senha incorretos');
    }

    public function logout()
    {
        session_destroy();
        return redirecionar('/login');
    }
}
