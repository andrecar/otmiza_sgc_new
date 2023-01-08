<?php 

namespace App\Controllers;

use App\Models\ClienteModel;
use App\Models\GradeModel;
use App\Models\ModeloModel;

class Modelo extends BaseController
{
    protected $modeloModel;
    protected $clienteModel;
    protected $gradeModel;
       
    public function __construct()
    {
        $this->modeloModel = new ModeloModel();
        $this->clienteModel = new ClienteModel();
        $this->gradeModel = new GradeModel();                     
    }

    /**
     * Chama a view Modelo
     *
     * @return void
     */
    public function index()
    {        
        $pesquisar = $this->request->getGet('pesquisar'); 
       
        $modelos = $this->modeloModel
                        ->addPesquisar($pesquisar, 'descricao', true)    
                        ->addPesquisar($pesquisar, 'referencia', true)    
                        ->addPesquisar($pesquisar, 'nome_razao', true)   
                        ->addUserId($this->session->id_usuario)
                        ->orderBy('nome_razao')                        
                        ->getAllClientes()
                        //->paginate(5)
                        ; 

        $dados = [    
            'modelos'       => $modelos,            
            'pesquisar'     => $pesquisar,            
            'paginacao'     => $this->modeloModel->pager,            

            'imagem'        => 'assets/src/images/img_modelo.png',
            'titulo'        => 'MODELOS',

            'url'           => 'home', 
            'li_item'       => 'Home',         
            'li_active'     => 'Modelo'            
        ];
        return view('modelo/index', $dados);
    }

    /**
     * Chama a view de cadastramento do modelo
     *
     * @return void
     */
    public function formulario()
    {
        $dados = [            
            'imagem'        => '../assets/src/images/img_modelo.png',
            'titulo'        => 'NOVO MODELO',
            
            'url'           => '../modelo', 
            'li_item'       => 'Modelos',         
            'li_active'     => 'Formulário',
            
            'formDropDown'  => $this->clienteModel
                                    ->addUserId($this->session->id_usuario)
                                    ->formDropDown()
        ];
        return view('modelo/form', $dados);
    }

    /**
     * Salva os Modelos no banco de dados
     *
     * @return void
     */
    public function salvar()
    {
        $post = $this->request->getPost(); 
                              
        if ($this->modeloModel->save($post)) {
            if (!empty($post['id'])) {
                return redirect()->to('/mensagem/sucesso')->with('mensagem',[
                    'titulo'   => 'MODELO', 
                    'mensagem' => 'Salvo com sucesso!',                
                    'link'     => '../modelo' 
                ]);
            }
            return redirect()->to("/modelo/edit/{$this->modeloModel->insertID}")->with('mensagem',[
                'titulo'   => 'MODELO', 
                'mensagem' => 'Salvo com sucesso!',                
                'link'     => '../modelo' 
            ]);
        } else {
            return view('modelo/form', [
            'titulo'        => 'MODELO', 
            'imagem'        => '../assets/src/images/img_modelo.png',

            'url'           => '../modelo', 
            'li_item'       => 'Modelos',         
            'li_active'     => 'Formulário',
            'formDropDown'  => $this->clienteModel->formDropDown(),
            'errors'        => $this->modeloModel->errors()  
            ]);
        }
    }
    
    /**
     * Edita o formulário modelo com os campos populador
     *
     * @param [type] $id
     * @return void
     */
    public function edit($id)
    {   
        $modelo = $this->modeloModel->find($id);
         
        if (!is_null($modelo)){

            $gradeModelos = $this->gradeModel->getByIdModelo($modelo['id']);
            
            $dados = [            
                'gradeModelos'  => $gradeModelos,    
                'modelo'        => $modelo,
                'imagem'        => '../../assets/src/images/img_modelo.png',
                'titulo'        => 'EDITAR MODELO',
                
                'url'           => '../../modelo', 
                'li_item'       => 'Modelos',         
                'li_active'     => 'Formulário',                
                'formDropDown'  => $this->clienteModel->formDropDown(),
            ];    

        return view('modelo/form', $dados);
        }else {
            return redirect()->to('/mensagem/erro')->with('mensagem',[
                'titulo'   => 'MODELO', 
                'mensagem' => 'Não encontrado!',                
                'link'     => 'modelo' 
            ]);
        }
    }

    /**
     * Excluir o modelo do banco de dados
     *
     * @param [type] $id
     * @return void
     */
    public function excluir($id)
    {
        if ($this->modeloModel->delete($id)) {
            return redirect()->to('/mensagem/excluido')->with('mensagem',[
                'titulo'   => 'MODELO', 
                'mensagem' => 'Excluído!...',                
                'link'     => '../modelo' 
            ]);
        } else {
            return redirect()->to('/mensagem/erro')->with('mensagem',[
                'titulo'   => 'MODELO', 
                'mensagem' => 'Erro ao excluir!',                
                'link'     => '../modelo' 
            ]);
        }
    }

    /**
     * chama o modal visualizar modelo.
     *
     * @param [type] $id
     * @return void
     */
    public function visualizar($id)
    {
        $modelos = $this->modeloModel->find($id);

        $gradeModelos = $this->gradeModel->getByIdModelo($modelos['id']);
       
        $clienteModelos = $this->clienteModel->find($modelos['cliente_id']);

        $dados = [
            'imagem'        => '../../assets/src/images/img_modelo.png',
            'titulo'        => 'INFORMAÇÕES DO MODELO',
            'modelos'           => $modelos,
            'gradeModelos'      => $gradeModelos,
            'clienteModelos'    => $clienteModelos
        ];
        return view('modelo/visualizar', $dados);
    }   
}




