<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meta extends Model
{
    use HasFactory;

    protected $table = 'meta_financeiras'; 
    protected $primaryKey = 'id_meta';     
    public $incrementing = true;           
    protected $keyType = 'int';            
    protected $fillable = ['descricao', 'valor_alvo', 'data_meta', 'id_users'];  

    public function index()
{
    return Meta::paginate(60);
}

}
