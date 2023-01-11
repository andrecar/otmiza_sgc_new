<?php

namespace App\Models;

class TecidoModel extends BaseModel
{
    protected $table            = 'tecidos';   
    protected $primaryKey       = 'id';
    
    protected $useSoftDeletes   = true;
    protected $deletedField     = 'data_deletada';      //coloca data ao ser deletado
    protected $createdField     = 'data_cadastrada';    //coloca data ao ser cadastrado
    protected $updatedField     = 'data_atualizada';    //coloca data ao ser atualizado
    protected $useTimestamps    = true;

    protected $beforeInsert     = ['vinculaIdUsuario'];
   // protected $beforeUpdate     = ['#'];

    protected $allowedFields = [ 
        'usuarios_id',
        'marca_id',
        'tipo',
        'und',
        'composicao'
    ];

    protected $validationRules = [
        'marca_id' => [
            'label'  => 'MARCA',
            'rules'  => 'required'
        ],
        'tipo' => [
            'label'  => 'TIPO',
            'rules'  => 'required'
        ],
        'composicao' => [
            'label'  => 'COMPOSICAO',
            'rules'  => 'required'
        ],
    ]; 

    /**
     * Retorna todos os campos da tebela TECIDOOS com as MARCAS vinculados e renomeados.,
     *
     * @return void
     */
    public function getAllMarcas() 
    {
            $this->select("
                tecidos.id              as  tecidos_id,
                tecidos.tipo            as  tecidos_tipo,
                tecidos.und             as  tecidos_und,
                tecidos.composicao      as  tecidos_composicao,            
                marcas.descricao        as  tecidos_marca_descricao,
                marcas.id               as  tecidos_marca_id,
            ");

            $this->join('marcas', 'marcas.id = tecidos.marca_id');
            return $this->findAll();
    }
}


