<?php 

namespace App\Models;

class EstocarModel extends BaseModel
{
    protected $table            = 'estocar';
    protected $primaryKey       = 'id';

    protected $allowedFields = [       
        'estoque_id',
        'rolo_numero',
        'quantidade',              
        'largura'
    ]; 

    protected $validationRules = [
        'rolo_numero' => [
            'label'  => 'NÚMERO DO ROLO',
            'rules'  => 'required'
        ],
        'quanidade' => [
            'label'  => 'QUANTIDADE',
            'rules'  => 'required'
        ],        
    ]; 

    /**
     * Retorna todos os ESTOQUES vinculado a um CLIENTE.
     *
     * @param [type] $id_cliente
     * @return void
     */
    public function getByIdEstoque($id_estoque)
    {
        $this->select("
            estocar.estoque_id as id_estoque,
            estocar.id as id_estocar,
            rolo_numero,
            quantidade,    
            largura           
        ");
            $this->where('estoque_id', $id_estoque);
            $this->join('estoques', 'estoques.id = estocar.estoque_id');
        return $this->findAll();    
    }
}