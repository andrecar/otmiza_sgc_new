<?php 

namespace App\Models;

class RoloModel extends BaseModel
{
    protected $table            = 'rolos';
    protected $primaryKey       = 'id';

    protected $allowedFields = [       
        'estoque_id',
        'codigo',
        'quantidade',              
        'largura'
    ]; 

    protected $validationRules = [
        'codigo' => [
            'label'  => 'NÚMERO DO ROLO',
            'rules'  => 'required'
        ],
        'quanidade' => [
            'label'  => 'QUANTIDADE',
            'rules'  => 'required'
        ],        
    ]; 

     /**
     * Retorna todos os ROLOS vinculado a um ESTOQUE.
     *
     * @param [type] $id_cliente
     * @return void
     */
    public function getByIdEstoque($id_Estoque)
    {
        $this->select("
            estoque_id as id_estoque,
            codigo,
            quantidade,
            largura
            ");
            $this->where('estoque_id', $id_Estoque);
            $this->join('estoques', 'estoques.id = rolos.estoque_id');
        return $this->findAll();    
    }

}