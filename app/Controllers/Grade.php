<?php 

namespace App\Controllers;

use App\Models\GradeModel;
use App\Models\ModeloModel;

class Grade extends BaseController
{
    protected $gradeModel;
    protected $modeloModel;

    public function __construct()
    {
        $this->gradeModel = new GradeModel();
        $this->modeloModel = new ModeloModel();
    }
    
    /**
     * Abre o formulario Adicionar Tamanhos
     *
     * @return void
     */
    public function formulario($id_modelo)
    {      
        $modelos = ($this->modeloModel->find($id_modelo));

            $dados = [
            'id_modelo'     => $id_modelo,
            'modelos'       => $modelos,
            'imagem'        => '../../assets/src/images/img_modelo.png',
            'titulo'        => 'ADICIONAR TAMANHO',
            'botao'         => 'ADICIONAR',

            'url'           => '../modelo/formulario',
            'li_item'       => 'Formulário Modelo',
            'li_active'     => 'Formulário'
        ];
        return view('modelo/form_grade', $dados);
    }
    
    /**
     * Salva os Tamanhos adicionados na Grade
     *
     * @return void
     */
    public function salvar()
    {
        $post = $this->request->getPost();
        
        if ($this->gradeModel->save($post)) {
            return redirect()->to("/modelo/edit/{$post['modelo_id']}")->with('mensagem_grade',  "Tamanho '' {$post['tamanho']} '' adicionado ou editado com sucesso!...");
        } else {
            return redirect()->to('/mensagem/erro')->with('mensagem',[
                'titulo'   => 'TAMANHO', 
                'mensagem' => 'Erro ao salvar!',                
                'link'     => '../modelo' 
            ]);
        }
    }

    /**
     * Edita cada tamanho da grade de seu modelo
     *
     * @param [type] $id
     * @param [type] $id_modelo
     * @return void
     */
    public function edit($id, $id_modelo)
    {
        $grade = ($this->gradeModel->where('modelo_id', $id_modelo)->getById($id));

        $modelos = ($this->modeloModel->find($id_modelo));

            if (!empty($grade)) {
             $dados = [
            'modelos'       => $modelos,    
            'id_modelo'     => $id_modelo,    
            'grade'         => $grade,
            'imagem'        => '../../../assets/src/images/img_modelo.png',
            'titulo'        => 'EDITAR TAMANHO',
            'botao'         => 'TROCAR',

            'url'           => '../modelo/formulario',
            'li_item'       => 'Formulário Modelo',
            'li_active'     => 'Formulário'         
                ];
                return view('modelo/form_grade', $dados);
            } else {
                return redirect()->to('/mensagem/erro')->with('mensagem',[
                    'titulo'   => 'TAMANHO', 
                    'mensagem' => 'Não encontrado!',                
                    'link'     => 'modelo/form' 
                ]);
        }
    }

    
    /**
     * Exclui um tamanho da grade do modelo
     *
     * @param [type] $id
     * @param [type] $id_modelo
     * @return void
     */
    public function excluir($id, $id_modelo)
    {
        if ($this->gradeModel->where('modelo_id', $id_modelo)->delete($id)){
            return redirect()->to("/modelo/edit/{$id_modelo}")->with('mensagem_grade', "Tamanho excluído com Sucesso!... ");

        } else {
            return redirect()->to('/mensagem/erro')->with('mensagem',[
                'titulo'   => 'TAMANHO', 
                'mensagem' => 'Erro ao excluir!',                
                'link'     => 'modelo' 
            ]);
        }
    }
}





