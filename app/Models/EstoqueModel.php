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
            estoques.data_cadastrada,
            estoques.usuarios_id,
            estoques.tecido_id as id_tecido,           
            marcas.descricao as marca_descricao,
            tecidos.tipo as tecido_tipo
            ");
            $this->where('cliente_id', $id_cliente);
            $this->join('tecidos', 'tecidos.id = estoques.tecido_id');
            $this->join('marcas', 'marcas.id = tecidos.marca_id');
        return $this->findAll();    
    }

   
    /**
     * Retorna todos ESTOQUES que possuem ROLOS
     *
     * @return
     */
    public function getComRolos()
    {
        $this->select("
        estoques.id as id_estoque,       
        estoques.usuarios_id,
        estoques.tecido_id as id_tecido,           
        marcas.descricao as marca_descricao,
        tecidos.tipo as tecido_tipo
        ");
        //Lança tabela ESTOQUES na Query getComRolos
        $this->join('tecidos', 'tecidos.id = estoques.tecido_id');
            $this->join('marcas', 'marcas.id = tecidos.marca_id');
        //Agrupa todos registros do TECIDOS pelo id.
        $this->groupBy('tecido_tipo');
        return $this->findAll();

    }

}   

