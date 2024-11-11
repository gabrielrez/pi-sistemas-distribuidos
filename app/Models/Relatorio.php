<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relatorio extends Model
{
    use HasFactory;

    protected $table = 'relatorios';

    protected $primaryKey = 'id_relatorio';

    public $timestamps = true;

    protected $fillable = [
        'id_users',
        'tipo_relatorio',
        'data_inicio',
        'data_fim',
        'conteudo'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_users');
    }
}
