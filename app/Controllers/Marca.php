<?php
namespace App\Controllers;

use App\Models\MarcaModel;

class Marca extends BaseController
{
    protected $marcaModel;

    public function __construct()
    {
        $this->marcaModel = new MarcaModel();
    }

    /**
     * Abre index Marcas de Tecidos
     *
     * @return void
     */
    public function index()
    {
        $pesquisar = $this->request->getGet('pesquisar');
        $marcas = $this->marcaModel
                        ->addPesquisar($pesquisar, 'descricao', true)  
                        ->addUserId($this->session->id_usuario)                        
                        ->orderBy('descricao', 'asc')   
                        ->paginate(5);
        $dados = [
            'marcas'        =>  $marcas,
            'pesquisar'     =>  $pesquisar,
            'paginacao'     => $this->marcaModel->pager,

            'imagem'        => 'assets/src/images/img_tecido.png',
            'titulo'        => 'MARCAS DE TECIDOS',

            'url'           => 'home', 
            'li_item'       => 'Home',         
            'li_active'     => 'Marcas/tecidos'
        ];
        return view('marca/index', $dados);
    }

    /**
     * Abre a view formulário Adicionar ou Editar "MARCA".
     *
     * @return void
     */
    public function formulario()       
    {
        $dados = [            
            'imagem'        => '../assets/src/images/img_tecido.png',
            'titulo'        => 'MARCA',            
        ];
        return view('marca/form', $dados);
    }

    /**
     * Salva no bando de dados na tabela "MARCA".
     *
     * @return void
     */
    public function salvar()
    {
        $post = $this->request->getPost();

        if ($this->marcaModel->save($post)) {
            return redirect()->to('/mensagem/sucesso')->with('mensagem',[
                'titulo'   => 'MARCA', 
                'mensagem' => 'Salva com sucesso!',                
                'link'     => '../marca' 
            ]);
        } else {
            return view('marca/form', [
            'titulo'        => 'MARCA', 
            'imagem'        => '../assets/src/images/img_tecido.png',
           
            'errors'        => $this->marcaModel->errors()  
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
        $marca = $this->marcaModel->addUserId($this->session->id_usuario)->getById($id);
                        
        if (!is_null($marca)) {
            $dados = [
                'marca'          => $marca,               
                'titulo'          => 'EDITAR MARCA',
                'imagem'          => '../../assets/src/images/img_tecido.png'
            ];    
        return view('marca/form', $dados);
        } else {
            return redirect()->to('/mensagem/erro')->with('mensagem',[
                'titulo'          => 'MARCA', 
                'mensagem'        => 'Não encontrado!',                
                'link'            => '../tecido' 
            ]);
        }
    }
    
    /**
     * Excluir m registro da tebela 'TECIDO' do banco de dados
     *
     * @param [type] $id
     * @return void
     */
    public function excluir($id)
    {
        if ($this->marcaModel->addUserId($this->session->id_usuario)->delete($id)) {
            return redirect()->to('/mensagem/excluido')->with('mensagem',[
                'titulo'   => 'MARCA', 
                'mensagem' => 'Excluída com sucesso!...',                
                'link'     => '../marca' 
            ]);
        } else {
            return redirect()->to('/mensagem/erro')->with('mensagem',[
                'titulo'   => 'MARCA', 
                'mensagem' => 'Erro ao excluir!',                
                'link'     => '../marca' 
            ]);
        }
    }
}