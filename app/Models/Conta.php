<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conta extends Model
{
    use HasFactory;

    protected $table = 'contas';

    protected $primaryKey = 'id_conta';

    protected $fillable = [
        'id_users',
        'saldo_inicial',
        'saldo_atual',
        'tipo_conta',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_users');
    }
}
