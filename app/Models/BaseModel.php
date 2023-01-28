<?php namespace App\Models;

use CodeIgniter\Model;

class BaseModel extends Model 
{
    /**
     * Vincula o id_usuario do usuario logado no campo usuario_id da tabela.
     *
     * @param [type] $data
     * @return void
     */
    protected function vinculaIdUsuario($data)
    {
        $data['data']['usuarios_id'] = session()->id_usuario;

        return $data;
    }

    #############################################
           ###### METODOS PUBLICOS #####
    #############################################

    

    /**
     *  Injeta a busca o id dentro da query
     *
     * @param string|null $id
     * @return mixed
     */
    public function getById(string $id = null)
    {
        return $this->find($id);
    }
    
    /** 
     * Retorna todos os registros
     *
     *@return array
     */
    public function getAll(): array
    {
        return $this->findAll();
    }
    
    /**
     * Injeta o campo id_usuario  na query
     *
     * @param integer|null $id_usuario
     * @return object
     */
    public function addUserId(int $id_usuario = null) : object
    {
        if (!is_null($id_usuario)) {
            $this->where("{$this->table}.usuarios_id", $id_usuario);
        }   
        return $this;
    }
    
   /**
    * Injeta a busca por like na quary.
    * Se o parâmetro "or" for true, faz a busca por orLike.
    *
    * @param string|null $pesquisar
    * @param string|null $campo
    * @param [type] $or
    * @return object
    */
    public function addPesquisar(string $pesquisar = null, string $campo = null, $or = null): object
    {
        if (!is_null($pesquisar) && !is_null($campo)) {
            if (!is_null($or)) {
                $this->orlike($campo, $pesquisar);
            } else { 
                $this->like($campo, $pesquisar);
            }    
        }
        return $this;
    }
}
