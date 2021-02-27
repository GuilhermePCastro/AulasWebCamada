<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'nome', 'endereco', 'email', 'telefone'];

    /*-------------------------------------------------
    É possivel mudar a chave primária:
    protected $primaryKey = 'nome_da_pk'

    Se não quiser ser auto_increment
    public $increment = false

    Para definir tipo
    protected $keyType = 'string'

    Para tirar os campos timestamps(Inclusão e Alterção)
    public $timestamps = false;
    -------------------------------------------------*/
    protected $table = 'tb_funcionario';
}
