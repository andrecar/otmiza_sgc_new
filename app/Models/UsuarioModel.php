<?php 

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends BaseModel
{
    protected $table            = 'usuarios';
    protected $primaryKey       = 'id';

    protected $useSoftDeletes   = true;
    protected $deletedField     = 'data_deletada';      //coloca data ao ser deletado

    protected $createdField     = 'data_cadastrada';    //coloca data ao ser cadastradp
    protected $updatedField     = 'data_atualizada';    //coloca data ao ser atualizado
    protected $useTimestamps    = true; 

    protected $allowedFields = [
        'nome',
        'login',
        'email',
        'senha',
        'rept_senha',
        'telefone',
        'permissao_id'
    ]; 

    /**
     * validação dos campos
     */

    protected $validationRules = [
        'nome' => [
            'label' => 'NOME',
            'rules'  => 'required',
        ],
        'login' => [
            'label' => 'LOGIN',
            'rules'  => 'required'            
        ],
        'email' => [
            'label' => 'E-MAIL',
            'rules'  => 'required'            
        ],
        'senha' => [
            'label' => 'SENHA',
            'rules'  => 'required'            
        ],
        'rept_senha' => [
            'label' => 'RETEPIR A SENHA',
            'rules'  => 'required|matches[senha]'            
        ],
        'telefone' => [
            'label' => 'TELEFONE',
            'rules'  => 'required'            
        ],
        'permissao_id' => [
            'label' => 'PERMISSÃO',
            'rules'  => 'required'            
        ],
    ];

}