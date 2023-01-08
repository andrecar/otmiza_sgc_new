<?php
namespace App\Controllers;

use App\Models\CargoModel;

class Cargo extends BaseController
{
    protected $cargoModel;

    public function __construct()
    {
       $this->cargoModel = new CargoModel();
    }

    /**
     * Abre index cargos de CARGO
     *
     * @return void
     */
    public function index()
    {
        $pesquisar = $this->request->getGet('pesquisar');
        $cargos = $this->cargoModel
                        ->addPesquisar($pesquisar, 'descricao', true)  
                        ->addUserId($this->session->id_usuario)                        
                        ->orderBy('descricao', 'asc')   
                        ->paginate(5);
        $dados = [
            'cargos'        =>  $cargos,
            'pesquisar'     =>  $pesquisar,
            'paginacao'     => $this->cargoModel->pager,

            'imagem'        => 'assets/src/images/img_funcionario.png',
            'titulo'        => 'CARGOS',

            'url'           => 'home', 
            'li_item'       => 'Home',         
            'li_active'     => 'Cargos'
        ];
        return view('cargo/index', $dados);
    }

    /**
     * Abre a view formulário Adicionar ou Editar CARGO".
     *
     * @return void
     */
    public function formulario()       
    {
        $dados = [            
            'imagem'        => '../assets/src/images/img_funcionario.png',
            'titulo'        => 'ADICIONAR CARGO',            
        ];
        return view('cargo/form', $dados);
    }

    /**
     * Salva no bando de dados na tabela "ARGO.
     *
     * @return void
     */
    public function salvar()
    {
        $post = $this->request->getPost();

        if ($this->cargoModel->save($post)) {
            return redirect()->to('/mensagem/sucesso')->with('mensagem',[
                'titulo'   => 'CARGO', 
                'mensagem' => 'Salvo com sucesso!',                
                'link'     => '../cargo' 
            ]);
        } else {
            return view('cargo/form', [
            'titulo'        => 'CARGO', 
            'imagem'        => '../assets/src/images/img_funcionario.png',
           
            'errors'        => $this->cargoModel->errors()  
            ]);
        }
    } 

    /**
     * Edita o formulario EDITAR CARGO com os campos populados.
     *
     * @param [type] $id
     * @return void
     */
    public function edit($id)
    {
        $cargo = $this->cargoModel->addUserId($this->session->id_usuario)->getById($id);
                        
        if (!is_null($cargo)) {
            $dados = [
                'cargo'          => $cargo,               
                'titulo'          => 'EDITAR CARGO',
                'imagem'          => '../../assets/src/images/img_funcionario.png'
            ];    
        return view('cargo/form', $dados);
        } else {
            return redirect()->to('/mensagem/erro')->with('mensagem',[
                'titulo'          => 'cargo', 
                'mensagem'        => 'Não encontrado!',                
                'link'            => '../cargo' 
            ]);
        }
    }
    
    /**
     * Excluir m registro da tebela 'CARGO' do banco de dados
     *
     * @param [type] $id
     * @return void
     */
    public function excluir($id)
    {
        if ($this->cargoModel->addUserId($this->session->id_usuario)->delete($id)) {
            return redirect()->to('/mensagem/excluido')->with('mensagem',[
                'titulo'   => 'CARGO', 
                'mensagem' => 'Excluído com sucesso!...',                
                'link'     => '../cargo' 
            ]);
        } else {
            return redirect()->to('/mensagem/erro')->with('mensagem',[
                'titulo'   => 'CARGO', 
                'mensagem' => 'Erro ao excluir!',                
                'link'     => '../cargo' 
            ]);
        }
    }
}