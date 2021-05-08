<?php

namespace Database\Seeders;
use App\Models\Funcionario;
use Illuminate\Database\Seeder;

class SeederTabelaFuncionario extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $funcionarios = [['nome' => 'João',
                          'endereco' => 'Rua Legal',
                          'email' => 'aa@aaaasd.com',
                          'telefone' => 12347854],
                        ['nome' => 'Ruan',
                          'endereco' => 'Rua maneira',
                          'email' => 'Ruabn@aaaasd.com',
                          'telefone' => 12388854],
                        ['nome' => 'Maria',
                          'endereco' => 'Rua chave',
                          'email' => 'Maria@aaaasd.com',
                          'telefone' => 22347854]];

        foreach($funcionarios as $funcionario){
            Funcionario::create(['nome' => $funcionario['nome'],
                                 'endereco' => $funcionario['endereco'],
                                 'email' => $funcionario['email'],
                                 'telefone' => $funcionario['telefone']]);
        }
    }
}
