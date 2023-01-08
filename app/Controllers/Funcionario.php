<?php 

namespace App\Controllers;

use App\Models\CargoModel;
use App\Models\FuncionarioModel;

class Funcionario extends BaseController
{
    protected $funcionarioModel;
    protected $cargoModel;

    public function __construct()
    {
        $this->funcionarioModel = new FuncionarioModel();
        $this->cargoModel = new CargoModel();
    }

    /**
     * Chama view funcionários index.
     *
     * @return void
     */
    public function index()
    {
        $pesquisar = $this->request->getGet('pesquisar');

        $funcinarios = $this->funcionarioModel
                            ->addPesquisar('nome')
                            ->addUserId($this->session->id_usuario)
                            ->orderBy('funcionarios_id', 'desc')                            
                            ->getAllCargos();

        $dados = [
            'funcionarios'  =>  $funcinarios,
            'pesquisar'     =>  $pesquisar,    

            'imagem'        => 'assets/src/images/img_funcionario.png',
            'titulo'        => 'FUNCIONARIOS',

            'url'           => 'home', 
            'li_item'       => 'Home',         
            'li_active'     => 'Funcionários'
        ];
        return view('funcionario/index', $dados);
    }

    /**
     * Chama a views formulário 'FUNCIONÁRIO'.
     *
     * @return void
     */
    public function formulario()
    {
        $dados = [
            'imagem'        => '../assets/src/images/img_funcionario.png',
            'titulo'        => 'FUNCIONARIOS',

            'formDropDown'  => $this->cargoModel->orderBy('id', 'asc')->formDropDown([
            'opcaoNova'     => true
            ]),

            'url'           => '../funcionario', 
            'li_item'       => 'Funcionários',         
            'li_active'     => 'Formulário',

        ];


        return view('funcionario/form', $dados);
    }

       /**
     * Salva no bando de dados na tabela funcionarios
     *
     * @return void
     */
    public function salvar()
    {
        $post = $this->request->getPost();

        if ($this->funcionarioModel->save($post)) {
            return redirect()->to('/mensagem/sucesso')->with('mensagem',[
                'titulo'   => 'FUNCIONARIO', 
                'mensagem' => 'Salvo com sucesso!',                
                'link'     => '../funcionario' 
            ]);
        } else {
            return view('funcionario/form', [
            'titulo'        => 'FUNCIONARIO', 
            'imagem'        => '../assets/src/images/img_funcionario.png',

            'url'           => '../funcionario', 
            'li_item'       => 'Funcionarios',         
            'li_active'     => 'Formulário',

            'formDropDown'  => $this->cargoModel->orderBy('id', 'asc')->formDropDown([
                'opcaoNova'     => true
            ]),
            'errors'        => $this->funcionarioModel->errors()  
            ]);
        }
    } 

  /**
     * Edita o formulario tecido com os campos populados.
     *
     * @param [type] $id
     * @return void
     */
    public function edit($id)
    {
        $funcionario = $this->funcionarioModel->addUserId($this->session->id_usuario)->getById($id);
        if (!is_null($funcionario)) {
            $dados = [
                'funcionario'     => $funcionario,
                'formDropDown'    => $this->cargoModel->orderBy('id', 'asc')->formDropDown([
                'opcaoNova'     => true,
                ]),
                'titulo'          => 'EDITAR FUNCIONARIO',
                'imagem'          => '../../assets/src/images/img_funcionario.png',

                'url'             => '../../funcionario', 
                'li_item'         => 'Funcionarios',         
                'li_active'       => 'Editar'
            ];    
        return view('funcionario/form', $dados);
        } else {
            return redirect()->to('/mensagem/erro')->with('mensagem',[
                'titulo'          => 'funcionario', 
                'mensagem'        => 'Não encontrado!',                
                'link'            => '../funcionario' 
            ]);
        }
    }
        
  
    /**
     * Exclui um registro da tabela 'FUNCIONARIO' do banco de dados
     *
     * @param [type] $id
     * @return void
     */
    public function excluir($id)
    {
        if ($this->funcionarioModel->addUserId($this->session->id_usuario)->delete($id)) {
            return redirect()->to('/mensagem/excluido')->with('mensagem',[
                'titulo'   => 'FUNCIONÁRIO', 
                'mensagem' => 'Excluído!...',                
                'link'     => '../Funcionario' 
            ]);
        } else {
            return redirect()->to('/mensagem/erro')->with('mensagem',[
                'titulo'   => 'FUNCIONÁRIO', 
                'mensagem' => 'Erro ao excluir!',                
                'link'     => '../Funcionario' 
            ]);
        }
    }

}

