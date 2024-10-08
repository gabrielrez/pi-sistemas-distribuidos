<?php

namespace App\Controllers;

use Hefestos\Core\Controller;
use App\Models\Meta;

class MetaController extends Controller
{
    protected $meta_model;

    public function __construct()
    {
        $this->meta_model = new Meta();
    }

    public function index()
    {
        $metas = $this->meta_model->where(['id_usuario' => sessao()->pegar('usuario.id')])->todos();

        return view('metas/metas', [
            'metas' => $metas
        ]);
    }

    public function create()
    {
        return view('metas/novo');
    }

    public function store()
    {
        $meta = $this->dadosPost();
        $this->meta_model->insert($meta);
        return redirecionar('/dashboard');
    }
}
