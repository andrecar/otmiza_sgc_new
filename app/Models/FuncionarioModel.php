<?php 

namespace App\Models;

class FuncionarioModel extends BaseModel
{
    protected $table            = 'funcionarios';
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
       'nome',
       'cargo_id',
       'telefone'
    ]; 

    protected $validationRules = [
        'nome' => [
            'label' => 'NOME',
            'rules'  => 'required',
        ],
        'cargo_id' => [
            'label' => 'CARGO',
            'rules'  => 'required'            
        ],
        'telefone' => [
            'label' => 'TELEFONE',
            'rules'  => 'required'            
        ]
    ];

     /**
     * Retorna todos os campos da tebela FUNCIONARIOS com os CAGO vinculados e renomeados.,
     *
     * @return void
     */
    public function getAllCargos()
    {
            $this->select("
                funcionarios.id              as  funcionarios_id,
                funcionarios.nome            as  funcionarios_nome,
                cargos.cargo                 as  funcionarios_cargo,            
                funcionarios.telefone        as  funcionarios_telefone,
            ");

            $this->join('cargos', 'cargos.id = funcionarios.cargo_id');
            return $this->findAll();
    }
}