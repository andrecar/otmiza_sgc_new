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




        $clientes = $this->clienteModel
                        ->addUserId($this->session->id_usuario)
                        ->orderBy('cliente_nome_razao')
                        ->getComEstoques()
                        ;

        //$estoques = $this->estoqueModel->getComEstoqueId();
      
        //Agora, para cada CLIENTE, eu busco os seus respectivos estoques.  
        $resultClientes = [];
        foreach($clientes as $cliente){
            $estoques = $this->estoqueModel->getByIdCliente($cliente['id_cliente']);

           
           // foreach($estoques as $estoque){
             //   $estocar = $this->estocarModel->getByIdEstoque($estoque['id_estoque']);

       
            $resultClientes[] = [
                'cliente'  =>   $cliente['cliente_nome_razao'],
                'estoque'  =>   $estoques,
               // 'estocar'  =>   $estocar
           
            ];

          //  }          
        }                

        echo '<pre>';
        print_r($resultClientes);
       
       


         
        $dados = [    
                       
            'pesquisar'     => $pesquisar,            
            'paginacao'     => $this->estoqueModel->pager,            

            'imagem'        => 'assets/src/images/img_modelo.png',
            'titulo'        => 'ESTOQUES',

            'url'           => 'home', 
            'li_item'       => 'Home',         
            'li_active'     => 'Estoques'            
        ];        
       // return view('estoque/index', $dados);
    }

   
}