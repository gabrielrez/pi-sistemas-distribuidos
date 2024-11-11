<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orcamento extends Model
{
    use HasFactory;

    protected $table = 'orcamentos';

    protected $primaryKey = 'id_orcamento';

    public $timestamps = true;

    protected $fillable = [
        'id_users',
        'id_categoria',
        'valor_planejado',
        'data_inicio',
        'data_fim'
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'id_users');
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }
}
