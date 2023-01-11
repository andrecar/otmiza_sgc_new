<?php
namespace App\Controllers;

use App\Models\EstocarModel;
use App\Models\EstoqueModel;

class Estoque extends BaseController
{
    protected $estoqueModel;
    protected $estocarModel;
       
    public function __construct()
    {
        $this->estoqueModel = new EstoqueModel();
        $this->estocarModel = new EstocarModel();
                           
    }

    public function index()
    {

    }
}