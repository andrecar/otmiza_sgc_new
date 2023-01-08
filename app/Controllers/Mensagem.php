<?php 

namespace App\Controllers;

class Mensagem extends BaseController 
{
    /**
     * Chama a view e mensagem SUCESSO quando o registro é salvo ou editado
     *
     * @return void
     */
    public function sucesso()
    {
        $mensagem = $this->session->getFlashdata('mensagem');

        if (is_array($mensagem)) {
            echo view('_common/mensagens/sucesso', [
                'mensagem'  => $mensagem['mensagem'],
                'titulo'    => $mensagem['titulo'],
                'link'      => $mensagem['link']
            ]);
        } else {
            echo view('_common/mensagens/sucesso', [
                'mensagem'  => $mensagem,
                'titulo'    => $mensagem,
                'link'      => anchor(base_url())
            ]);
        }
    } 

    /**
     * Chama a view e mensagem EXCLUIDO quando o registro é deletado.
     *
     * @return void
     */
    public function excluido()
    {
        $mensagem = $this->session->getFlashdata('mensagem');

        if (is_array($mensagem)) {
            echo view('_common/mensagens/excluido', [
                'mensagem'  => $mensagem['mensagem'],
                'titulo'    => $mensagem['titulo'],
                'link'      => $mensagem['link']
            ]);
        } else {
            echo view('_common/mensagens/excluido', [
                'mensagem'  => $mensagem,
                'titulo'    => $mensagem,
                'link'      => anchor(base_url())
            ]);
        }
    } 

    /**
     * Chama a view e mensagem ERRO quando o registro não é salvo ou editado
     *
     * @return void
     */
    public function erro()
    {
        $mensagem = $this->session->getFlashdata('mensagem');

        if (is_array($mensagem)) {
            echo view('_common/mensagens/erro', [
                'mensagem'  => $mensagem['mensagem'],
                'titulo'    => $mensagem['titulo'],
                'link'      => $mensagem['link']
            ]);
        } else {
            echo view('_common/mensagens/erro', [
                'mensagem'  => $mensagem,
                'titulo'    => $mensagem,
                'link'      => anchor(base_url())
            ]);
        }
    } 
}