<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
        'descricao',
    ];

    protected $casts = [
        'valor' => 'float',
        'data' => 'datetime:Y-m-d',
    ];

    public function conta(): BelongsTo
    {
        return $this->belongsTo(Conta::class, 'id_conta');
    }

    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }
}
