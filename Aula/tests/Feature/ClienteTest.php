<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Cliente;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ClienteTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testCreate(){

        //Para pular o teste
        //this->markTestSkipped();

        $cliente = Cliente::create([
            'nome' => 'Genailton',
            'endereco' => 'Rua do Senac',
            'email' => 'Genailton@gmail.com',
            'nascimento' => '1978-02-01'
        ]);

        $this->assertDatabaseHas('tb_cliente',['nome' => 'Genailton']);

        //Forma na gambiarra para apagar
        /*
        $id = $cliente->id;
        $cliente->destroy($cliente->id);
        $this->assertDatabaseMissing('tb_cliente',['id' => $id]);*/




    }

    public function testDelete(){

        Cliente::destroy(1);
        $this->assertDatabaseMissing('tb_cliente',['id' => 1]);

    }


}
