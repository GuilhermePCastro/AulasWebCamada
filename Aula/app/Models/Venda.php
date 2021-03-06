<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'cliente_id', 'funcionario_id', 'dt_venda', 'vl_venda'];
    protected $table = 'tb_venda';
}
