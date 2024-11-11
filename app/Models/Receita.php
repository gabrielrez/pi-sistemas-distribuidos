<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receita extends Model
{
    use HasFactory;

    protected $table = 'receitas';

    protected $primaryKey = 'id_receita';

    public $timestamps = true;

    protected $fillable = [
        'id_conta',
        'id_categoria',
        'valor',
        'data',
        'descricao'
    ];


    public function conta()
    {
        return $this->belongsTo(Conta::class, 'id_conta');
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }
}
