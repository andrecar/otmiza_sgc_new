<?php
namespace App\Controllers;

use App\Models\ClienteModel;
use App\Models\EstoqueModel;
use App\Models\TecidoModel;
use App\Models\RoloModel;

class Estoque extends BaseController
{
    protected $clienteModel;
    protected $estoqueModel;
    protected $tecidoModel;
    protected $roloModel;
   
       
    public function __construct()
    {
        $this->clienteModel = new ClienteModel();
        $this->estoqueModel = new EstoqueModel();
        $this->tecidoModel = new TecidoModel();
        $this->roloModel= new RoloModel();
       
       
                           
    }

    public function index()   
    {        
        $pesquisar = $this->request->getGet('pesquisar'); 

        $clientes = $this->clienteModel
                        ->addUserId($this->session->id_usuario)
                        ->orderBy('cliente_nome_razao')
                        ->getComEstoques()
                        ;
     
        //dd($clientes);

        //Agora, para cada CLIENTE, eu busco os seus respectivos estoques.  
        $resultEstoques = [];
        foreach($clientes as $cliente){
            $estoques = $this->estoqueModel->getByIdCliente($cliente['id_cliente']);
        // dd($estoques);

            $resultEstoques[] = [
                'cliente'   =>   $cliente['cliente_nome_razao'],
                'estoque'   =>   $estoques,              
            ];  
        
        }
        //dd($resultEstoques);

        
        $resultMetragem = $this->roloModel->getAll();
        dd($resultMetragem);



        $dados = [
            'estoques'      =>  $resultEstoques,
            
            'url'           => 'home', 
            'li_item'       => 'Home',         
            'li_active'     => 'Estoques'
        ];
        return view('estoque/index', $dados);
    }                
        
}
    