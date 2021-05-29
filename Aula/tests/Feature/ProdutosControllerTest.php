<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Http\Controllers\ProdutosController;

class ProdutosControllerTest extends TestCase
{

    private $produto;

    public function __construct(){

        parent::__construct();
        $this->produto = new ProdutosController;

    }

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

    public function testShow(){

        $this->assertJson($this->produto->show(1));

    }

    public function testGetAll(){

        $this->assertJson($this->produto->getAll());



    }




}
