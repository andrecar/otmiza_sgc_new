<?php 

namespace App\Controllers;

use App\Models\ClienteModel;

class Cliente extends BaseController
{
    protected $clienteModel;

    public function __construct()
    {
        $this->clienteModel = new ClienteModel();
    }

    /**
     * Chama a view index cliente
     *
     * @return void
     */
    public function index()
    {
        $pesquisar = $this->request->getGet('pesquisar');

        $clientes = $this->clienteModel
                        ->addPesquisar($pesquisar, 'nome_razao', true)                        
                        ->addPesquisar($pesquisar, 'cpf_cnpj', true)
                        ->addUserId($this->session->id_usuario)
                        ->orderBy('id', 'desc') 
                        ->paginate(5);

        $dados = [
            'clientes'      => $clientes,
            'pesquisar'     => $pesquisar,
            'paginacao'     => $this->clienteModel->pager,
            'imagem'        => 'assets/src/images/img_cliente2.png',
            'titulo'        => 'CLIENTES',

            'url'           => 'home', 
            'li_item'       => 'Home',         
            'li_active'     => 'Clientes' 
        ];
        return view('cliente/index', $dados);
    }

    /**
     * Chama a view de cadastro de cliente pessoa física.
     *
     * @return void
     */
    public function formulario_pf()
    {
        $dados = [
            'titulo'        => 'PESSOA FÍSICA',
            'imagem'        => '../assets/src/images/img_cliente2.png',

            'url'           => '../cliente', 
            'li_item'       => 'Cliente',         
            'li_active'     => 'Formulário'
        ];    
        return view('cliente/form_pf', $dados);
    }

     /**
      * Salva cliente pessoa física no banco de dados
      *
      * @return void
      */
      public function salvar()
      {
          $post = $this->request->getPost();
  
         if ($this->clienteModel->save($post)) {
              return redirect()->to('/mensagem/sucesso')->with('mensagem',[
                  'titulo'   => 'CLIENTE', 
                  'mensagem' => 'Salvo com sucesso!',                
                  'link'     => '../cliente' 
              ]);
          } else {
              return view('cliente/form_pf', [
              'titulo'        => 'PESSOA FÍSICA', 
              'imagem'        => '../assets/src/images/img_cliente2.png',
  
              'url'           => '../cliente', 
              'li_item'       => 'Clientes',         
              'li_active'     => 'Formulário',
  
              'errors'        => $this->clienteModel->errors()  
              ]);
          }
      } 

    /**
     * Chama a view de cadastro de cliente pessoa física.
     *
     * @return void
     */
    public function formulario_pj()
    {
        $dados = [
            'titulo'        => 'PESSOA JURÍDICA',
            'imagem'        => '../assets/src/images/img_empresa.png',

            'url'           => '../cliente', 
            'li_item'       => 'Clientes',         
            'li_active'     => 'Formulário'
        ];    
        return view('cliente/form_pj', $dados);
    }

     /**
      * Edita o formulario clientes com os campos populados.
      *
      * @param [type] $id
      * @return void
      */
    public function edit($id)
    {
        $cliente = $this->clienteModel->addUserId($this->session->id_usuario)->getById($id);

        if (!is_null($cliente)){
            $dados = [
                'cliente'       => $cliente,
                'titulo'        => 'EDITAR CLIENTE',
                'imagem'        => '../../assets/src/images/img_cliente2.png',
    
                'url'           => '../../cliente', 
                'li_item'       => 'Clientes',         
                'li_active'     => 'Editar'
            ];    
        return view('cliente/form_edit', $dados);
        } else {
            return redirect()->to('/mensagem/erro')->with('mensagem',[
                'titulo'   => 'CLIENTE PESSOA FÍSICA', 
                'mensagem' => 'Não encontrado!',                
                'link'     => '../cliente' 
            ]);
       }
    }

     /**
     * Exclui o cliente do banco de dados
     *
     * @param [type] $id
     * @return void
     */
    public function excluir($id = null)    {
       
        if ($this->clienteModel->addUserId($this->session->id_usuario)->delete($id)) {
            return redirect()->to('/mensagem/excluido')->with('mensagem',[
                'titulo'   => 'CLIENTE', 
                'mensagem' => 'Excluído!...',                
                'link'     => '../cliente' 
            ]);
        } else {
            return redirect()->to('/mensagem/erro')->with('mensagem',[
                'titulo'   => 'CLIENTE', 
                'mensagem' => 'Erro ao excluir!',                
                'link'     => '../cliente' 
            ]);
        }
    }

    public function visualizar($id)
    {
        $clientes = $this->clienteModel->find($id);
        
        $dados = [
            'imagem'        => '../../assets/src/images/img_modelo.png',
            'titulo'        => 'INFORMAÇÕES DO CLIENTE',
            'clientes'      => $clientes,
            
        ];
        return view('cliente/visualizar', $dados);
    }
}
