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

    /**
     * Retorna todos os ESTOQUES vinculado a um CLIENTE.
     *
     * @param [type] $id_cliente
     * @return void
     */
    public function getByIdCliente($id_cliente)
    {
        $this->select("
            estoques.id as id_estoque,
            estoques.usuarios_id,
            estoques.tecido_id as id_tecido,  
            tecidos.tipo as tipo_tecido, 
            marcas.id as id_marcas,
            marcas.descricao as marca_descricao
            ");
            $this->where('cliente_id', $id_cliente);
            $this->join('tecidos', 'tecidos.id = estoques.tecido_id');
            $this->join('marcas', 'marcas.id = tecidos.marca_id');
        return $this->findAll();    
    }

    /**
     * Retorna todos ESTOQUE que possuem rolos
     *
     * @return void
     */
    public function getComEstoqueId()
    {
        $this->select(" 
            estoques.id             as  id_estoque,                
        ");
        //Lança tabela ESTOQUES na Query getComEstoque
        $this->join('estocar', 'estocar.estoque_id = estoques.id');
        //Agrupa todos registros do TECIDO pelo ID.
        $this->groupBy('tecido_id');
        return $this->findAll();

    }
   
}   

