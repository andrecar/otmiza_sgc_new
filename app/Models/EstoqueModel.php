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
}   

