<?php 

namespace App\Controllers;

use App\Models\EmpresaModel;

class Empresa extends BaseController
{
    protected $empresaModel;

    public function __construct()
    {
        $this->empresaModel = new EmpresaModel();
    }

    /**
     * Chama a view index Empresa
     *
     * @return void
     */
    public function index()
    {
        $pesquisar = $this->request->getGet('pesquisar');

        $empresas = $this->empresaModel
                        ->addPesquisar($pesquisar, 'fantasia', true)
                        ->addPesquisar($pesquisar, 'tipo_empresa', true)
                        ->addPesquisar($pesquisar, 'razao', true)
                        ->orderBy('fantasia') 
                        ->paginate(5);

        $dados = [
            'empresas'      => $empresas,
            'pesquisar'     => $pesquisar,
            'paginacao'     => $this->empresaModel->pager,
            'imagem'        => 'assets/src/images/img_empresa.png',
            'titulo'        => 'EMPRESAS',

            'url'           => 'home', 
            'li_item'       => 'Home',         
            'li_active'     => 'Empresas'
        ];
        return view('empresa/index', $dados);
    }

    /**
     * Chama a view de cadastro de empresa
     *
     * @return void
     */
    public function formulario()
    {
        $dados = [
            'titulo'        => 'NOVA EMPRESA',
            'imagem'        => '../assets/src/images/img_empresa.png',

            'url'           => '../empresa',
            'li_item'       => 'Empresas',         
            'li_active'     => 'Formulário'
        ];    
        return view('empresa/form', $dados);
    }

     /**
      * Salva empresa no banco de dados
      *
      * @return void
      */
    public function salvar()
    {
        $post = $this->request->getPost();
        
       if ($this->empresaModel->save($post)) {
            return redirect()->to('/mensagem/sucesso')->with('mensagem',[
                'titulo'   => 'EMPRESA', 
                'mensagem' => 'Salva com sucesso!',                
                'link'     => '../empresa' 
            ]);
        } else {
            return view('empresa/form', [
            'titulo'        => 'EMPRESAS', 
            'imagem'        => '../assets/src/images/img_empresa.png',

            'url'           => '../empresa',
            'li_item'       => 'Empresas',         
            'li_active'     => 'Formulário',

            'errors'        => $this->empresaModel->errors()  
            ]);
        }
    } 
   
     /**
      * Edita as empresa no banco de dados
      *
      * @param [type] $id
      * @return void
      */
    public function edit($id)
    {
       $empresa = $this->empresaModel->getById($id);

        if (!is_null($empresa)){
            $dados = [
                'empresa'       => $empresa,
                'titulo'        => 'EDITAR EMPRESA',
                'imagem'        => '../../assets/src/images/img_empresa.png',
    
                'url'           => '../../empresa',
                'li_item'       => 'Empresas',         
                'li_active'     => 'Editar'
            ];    
        return view('empresa/form', $dados);
        } else {
            return redirect()->to('/mensagem/erro')->with('mensagem',[
                'titulo'   => 'EMPRESA', 
                'mensagem' => 'Não encontrado!',                
                'link'     => '../empresa' 
            ]);
       }
    }

     /**
     * Exclui o empresa do banco de dados
     *
     * @param [type] $id
     * @return void
     */
    public function excluir($id = null)
    {
        if ($this->empresaModel->delete($id)) {
            return redirect()->to('/mensagem/excluido')->with('mensagem',[
                'titulo'   => 'EMPRESA', 
                'mensagem' => 'Excluída!...',                
                'link'     => '../empresa' 
            ]);
        } else {
            return redirect()->to('/mensagem/erro')->with('mensagem',[
                'titulo'   => 'EMPRESA', 
                'mensagem' => 'Erro ao excluir!',                
                'link'     => '../empresa' 
            ]);
        }
    }

    public function visualizar($id)
    {
        $empresa = $this->empresaModel->find($id);
        
        $dados = [
            'imagem'        => '../../assets/src/images/img_empresa.png',
            'titulo'        => 'INFORMAÇÕES DA EMPRESA',
            'empresa'      => $empresa,
            
        ];
        return view('empresa/visualizar', $dados);
    }
}
