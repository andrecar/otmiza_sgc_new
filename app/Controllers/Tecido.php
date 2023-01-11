<?php

namespace App\Controllers;

use App\Models\MarcaModel;
use App\Models\TecidoModel;

class Tecido extends BaseController
{
    protected $tecidoModel;
    protected $marcaModel;

    public function __construct()
    {
        $this->tecidoModel = new TecidoModel();
        $this->marcaModel = new MarcaModel();
    }
    /**
     * Abre a view Tecidos
     *
     * @return void
     */
    public function index()
    {
        $pesquisar = $this->request->getGet('pesquisar');
        $tecidos = $this->tecidoModel
                        ->addPesquisar($pesquisar, 'descricao', true)                                              
                        ->addPesquisar($pesquisar, 'tipo', true)                                              
                        ->addPesquisar($pesquisar, 'composicao', true)                                              
                        ->addUserId($this->session->id_usuario)                        
                        ->orderBy('descricao')
                        ->getAllMarcas();
                        //->paginate();
        $dados = [
            'tecidos'       =>  $tecidos,
            'pesquisar'     =>  $pesquisar,
            'paginacao'     => $this->tecidoModel->pager,            
            'imagem'        => 'assets/src/images/img_tecido.png',
            'titulo'        => 'TECIDO',

            'url'           => 'home', 
            'li_item'       => 'Home',         
            'li_active'     => 'Tecido'
        ];
        return view('tecido/index', $dados);
    }

    /**
     * Abre a view formulário de cadastro Tecidos
     *
     * @return void
     */
    public function formulario()       
    {
        $dados = [            
            'imagem'        => '../assets/src/images/img_tecido.png',
            'titulo'        => 'NOVO TECIDO',
            'formDropDown'  => $this->marcaModel->orderBy('descricao')->formDropDown(),

            'url'           => '../tecido', 
            'li_item'       => 'Tecido',         
            'li_active'     => 'Formulário'
        ];
        return view('tecido/form', $dados);
    }

    /**
     * Salva no bando de dados na tabela tecidos
     *
     * @return void
     */
    public function salvar()
    {
        $post = $this->request->getPost();

        if ($this->tecidoModel->save($post)) {
            return redirect()->to('/mensagem/sucesso')->with('mensagem',[
                'titulo'   => 'TECIDO', 
                'mensagem' => 'Salvo com sucesso!',                
                'link'     => '../tecido' 
            ]);
        } else {
            return view('tecido/form', [
            'titulo'        => 'TECIDO', 
            'imagem'        => '../assets/src/images/img_tecido.png',

            'url'           => '../tecido', 
            'li_item'       => 'tecidos',         
            'li_active'     => 'Formulário',

            'formDropDown'  => $this->marcaModel->orderBy('id', 'asc')->formDropDown(),             
            'errors'        => $this->tecidoModel->errors()  
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
        $tecido = $this->tecidoModel->addUserId($this->session->id_usuario)->getById($id);
                        
        if (!is_null($tecido)) {
            $dados = [
                'tecido'          => $tecido,
                'formDropDown'    => $this->marcaModel->orderBy('id', 'asc')->formDropDown(),
                'titulo'          => 'EDITAR TECIDO',
                'imagem'          => '../../assets/src/images/img_tecido.png',

                'url'             => '../../tecido', 
                'li_item'         => 'Tecidos',         
                'li_active'       => 'Editar'
            ];    
        return view('tecido/form', $dados);
        } else {
            return redirect()->to('/mensagem/erro')->with('mensagem',[
                'titulo'          => 'TECIDO', 
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
        if ($this->tecidoModel->addUserId($this->session->id_usuario)->delete($id)) {
            return redirect()->to('/mensagem/excluido')->with('mensagem',[
                'titulo'   => 'TECIDO', 
                'mensagem' => 'Excluído!...',                
                'link'     => '../tecido' 
            ]);
        } else {
            return redirect()->to('/mensagem/erro')->with('mensagem',[
                'titulo'   => 'TECIDO', 
                'mensagem' => 'Erro ao excluir!',                
                'link'     => '../tecido' 
            ]);
        }
    }

    /**
     * chama o modal visualizar TECIDO.
     *
     * @param [type] $id
     * @return void
     */
    public function visualizar($id)
    {
        $tecidos = $this->tecidoModel->find($id);

        $marcaTecidos = $this->marcaModel->find($tecidos['marca_id']);

        $dados = [
            'imagem'            => '../../assets/src/images/img_tecido.png',
            'titulo'            => 'INFORMAÇÕES DO TECIDO',
            'tecidos'           => $tecidos,
            'marcaTecidos'      => $marcaTecidos,           
        ];
        return view('tecido/visualizar', $dados);
    }   
  
}