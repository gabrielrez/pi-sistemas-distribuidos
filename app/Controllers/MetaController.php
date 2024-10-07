<?php

namespace App\Controllers;

use Hefestos\Core\Controller;
use App\Models\MetaModel;

class MetaController extends Controller
{
    protected $meta_model;

    public function index()
    {
        $metas = $this->meta_model->todos();

        return view('metas/metas', [
            'metas' => $metas
        ]);
         
    }

    public function create(){
        return view('metas/novo');
    }

    public function store(){
        return redirecionar('/');
    }
}