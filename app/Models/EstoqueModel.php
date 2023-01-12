<?php 

namespace App\Models;

class EstoqueModel extends BaseModel
{
    protected $table            = 'estoques';   
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
        'tecido_id'        
    ];

    protected $validationRules = [
        'cliente_id' => [
            'label'  => 'CLIENTE',
            'rules'  => 'required'
        ],
        'tecido_id' => [
            'label'  => 'TECIDO',
            'rules'  => 'required'
        ]
    ];


    public function getAllClientes() 
    {
       $this->select("
            estoques.id                 as  estoque_id,     
            clientes.nome_razao         as  estoque_cliente_nome,
        ");                 
        $this->join('clientes', 'clientes.id = estoques.cliente_id');                 
        return $this->findAll();
    }

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

