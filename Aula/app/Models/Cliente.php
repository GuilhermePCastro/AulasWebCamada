<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'nome', 'endereco', 'email', 'nascimento'];
    protected $table = 'tb_cliente';

    public function vendas(){

        return $this-> hasMany(Venda::class, 'cliente_id');
    }
}
