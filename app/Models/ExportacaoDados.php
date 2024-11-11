<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExportacaoDados extends Model
{
    use HasFactory;

    protected $table = 'exportacao_dados';

    protected $primaryKey = 'id_exportacao';

    protected $fillable = [
        'id_users',
        'formato',
        'conteudo',
        'data_exportacao'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_users');
    }
}
