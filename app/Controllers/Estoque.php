<?php
namespace App\Controllers;

use App\Models\ClienteModel;
use App\Models\EstocarModel;
use App\Models\EstoqueModel;
use App\Models\TecidoModel;

class Estoque extends BaseController
{
    protected $clienteModel;
    protected $estoqueModel;
    protected $estocarModel;
    protected $tecidoModel;
       
    public function __construct()
    {
        $this->clienteModel = new ClienteModel();
        $this->estoqueModel = new EstoqueModel();
        $this->estocarModel = new EstocarModel();
        $this->tecidoModel = new TecidoModel();
                           
    }

    public function index()   
    {        
        $pesquisar = $this->request->getGet('pesquisar'); 

        $clientes = $this->clienteModel->getComTecidos();
       
        $estoques = $this->estoqueModel
                        ->addPesquisar($pesquisar, 'cliente_id', true)    
                        ->addPesquisar($pesquisar, 'tecido_id', true)  
                        ->addUserId($this->session->id_usuario)
                        ->orderBy('cliente_id')                           
                        ->getAllClientes();
                        //->paginate(5)
                        ;
                      
        








         
        $dados = [    
            'estoques'       => $estoques,            
            'pesquisar'     => $pesquisar,            
            'paginacao'     => $this->estoqueModel->pager,            

            'imagem'        => 'assets/src/images/img_modelo.png',
            'titulo'        => 'ESTOQUES',

            'url'           => 'home', 
            'li_item'       => 'Home',         
            'li_active'     => 'Estoques'            
        ];        
        return view('estoque/index', $dados);
    }

   
}