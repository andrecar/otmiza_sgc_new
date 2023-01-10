<?php 

namespace App\Controllers;

use App\Models\UsuarioModel;
class Usuario extends BaseController
{
    protected $usuarioModel;

    public function __construct()
    {
        $this->usuarioModel = new UsuarioModel();
    }

    /**
     * Chama a view index Usuários
     *
     * @return void
     */
    public function index()
    {
        $pesquisar = $this->request->getGet('pesquisar');

        $usuarios = $this->usuarioModel
                        ->addPesquisar($pesquisar, 'nome', true)
                        ->addPesquisar($pesquisar, 'login', true)
                        ->orderBy('nome', 'asc') 
                        ->paginate(5);

        $dados = [
            'pesquisar'     => $pesquisar,
            'usuarios'      => $usuarios,
            'paginacao'     => $this->usuarioModel->pager,
            'imagem'        => 'assets/src/images/img_usuario.png',
            'titulo'        => 'USUÁRIOS',
            
            'url'           => 'home', 
            'li_item'       => 'Home',         
            'li_active'     => 'Usuários'
        ];
        return view('usuario/index', $dados);
    }

    
    /**
     * Chama a view de cadastro de usuários
     *
     * @return void
     */
    public function formulario()
    {
        $dados = [
            'titulo'        => 'NOVO USUÁRIO',
            'imagem'        => '../assets/src/images/img_usuario.png',

            'url'           => '../usuario',
            'li_item'       => 'Usuários',         
            'li_active'     => 'Formulário'
        ];    
        return view('usuario/form', $dados);
    }

     /**
      * Salva Usuário no banco de dados
      *
      * @return void
      */
    public function salvar()
    {
        $post = $this->request->getPost();

        $usuarioModel = new UsuarioModel();

        if ($usuarioModel->save($post)) {
            return redirect()->to('/mensagem/sucesso')->with('mensagem',[
                'titulo'   => 'USUÁRIO', 
                'mensagem' => 'Salvo com sucesso!',                
                'link'     => '../usuario' 
            ]);
        } else {
            return view('usuario/form', [
                'titulo'        => 'PESSOA FÍSICA', 
                'imagem'        => '../assets/src/images/img_usuario.png',

                'url'           => '../usuario', 
                'li_item'       => 'Usuários',         
                'li_active'     => 'Formulário',

                'errors'        => $usuarioModel->errors()  
            ]);
        }
    }
   
     /**
      * Edita os usuários no banco de dados
      *
      * @param [type] $id
      * @return void
      */
    public function edit($id)
    {
        $usuarioModel = new UsuarioModel();

        $usuario = $usuarioModel->find($id);

        if (!is_null($usuario)){
            $dados = [
                'usuario'       => $usuario,
                'titulo'        => 'EDITAR USUÁRIO',
                'imagem'        => '../../assets/src/images/img_usuario.png',
    
                'url'           => '../../usuario',
                'li_item'       => 'Usuários',         
                'li_active'     => 'Editar',
            ];    
        return view('usuario/form', $dados); 
        } else {
            return redirect()->to('/mensagem/erro')->with('mensagem',[
                'titulo'   => 'USUÁRIO', 
                'mensagem' => 'Não encontrado!',                
                'link'     => '../usuario' 
            ]);
       }
    }

     /**
     * Exclui o usuário do banco de dados
     *
     * @param [type] $id
     * @return void
     */
    public function excluir($id = null)
    {
        $usuarioModel = new UsuarioModel();

        if ($usuarioModel->delete($id)) {
            return redirect()->to('/mensagem/excluido')->with('mensagem',[
                'titulo'   => 'USUÁRIO', 
                'mensagem' => 'Excluído!...',                
                'link'     => '../usuario' 
            ]);
        } else {
            return redirect()->to('/mensagem/erro')->with('mensagem',[
                'titulo'   => 'USUÁRIO', 
                'mensagem' => 'Erro ao excluir!',                
                'link'     => '../usuario' 
            ]);
        }
    }

    /**
     * Abrea view VISUALIZAR USUARIO
     *
     * @param [type] $id
     * @return void
     */
    public function visualizar($id)
    {
        $usuario = $this->usuarioModel->find($id);
        
        $dados = [
            'imagem'        => '../../assets/src/images/img_usuario.png',
            'titulo'        => 'INFORMAÇÕES DA usuario',
            'usuario'      => $usuario,
            
        ];
        return view('usuario/visualizar', $dados);
    }
}
