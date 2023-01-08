<?php

namespace App\Models;

class ModeloModel extends BaseModel
{
    protected $table            = 'Modelos';   
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
        'cliente_id',
        'referencia',
        'descricao'
    ];

    protected $validationRules = [
        'referencia' => [
            'label'  => 'REFERÊNCIA',
            'rules'  => 'required'
        ],
        'descricao' => [
            'label'  => 'DESCRIÇAO',
            'rules'  => 'required'
        ],
        'cliente_id' => [
            'label'  => 'CLIENTE',
            'rules'  => 'required'
        ],
    ]; 
    
    /**
     * Retorna todos os campos da tebela MODELOS com os CLIENTES vinculados e renomeados.
     *
     * @return void
     */
    public function getAllClientes() 
    {
       $this->select("
            modelos.id                  as  modelo_id,
            modelos.cliente_id          as  modelo_cliente_id,
            modelos.referencia          as  modelo_referencia,
            modelos.descricao           as  modelo_descricao,
            clientes.id                 as  cliente_id,
            clientes.nome_razao         as  cliente_nome,
        ");                 
        $this->join('clientes', 'clientes.id = modelos.cliente_id');        
        return $this->findAll();
    }


   
}

