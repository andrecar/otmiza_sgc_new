<?php

namespace App\Models;

use CodeIgniter\Model;

class EmpresaModel extends BaseModel
{
    protected $table = 'empresas';
    protected $primaryKey = 'id';

    protected $useSoftDeletes   = true;
    protected $deletedField     = 'data_deletada';      //coloca data ao ser deletado

    protected $createdField     = 'data_cadastrada';    //coloca data ao ser cadastradp
    protected $updatedField     = 'data_atualizada';    //coloca data ao ser atualizado
    protected $useTimestamps    = true; 

    protected $beforeInsert     = ['vinculaIdUsuario'];
    // protected $beforeUpdate     = ['#'];

    protected $allowedFields = [
        'usuarios_id',
        'tipo_empresa',
        'razao',
        'fantasia',
        'responsavel',
        'cnpj',
        'escricao',
        'endereco',
        'numero',
        'bairro',
        'cidade',
        'estado',
        'cep',
        'fundacao',
        'telefone_1',
        'telefone_2'
    ];

    protected $validationRules = [
        'tipo_empresa' => [
            'label'  => 'TIPO DE EMPRESA',
            'rules'  => 'required'
        ],
        'razao' => [
            'label'  => 'RAZÃO SOCIAL',
            'rules'  => 'required'
        ],
        'fantasia' => [
            'label'  => 'NOME FANTASIA',
            'rules'  => 'required'
        ],
        'responsavel' => [
            'label'  => 'RESPONSÁVEL',
            'rules'  => 'required'
        ],
        
        'cnpj' => [
            'label'  => 'CNPJ',
            'rules'  => 'required'
        ],
        'escricao' => [
            'label'  => 'ESCRIÇÃO',
            'rules'  => 'required'
        ],
        'endereco' => [
            'label'  => 'ENDEREÇO',
            'rules'  => 'required'
        ],
        'numero' => [
            'label'  => 'Nº',
            'rules'  => 'required'
        ],
        'bairro' => [
            'label'  => 'BAIRRO',
            'rules'  => 'required'
        ],
        'cidade' => [
            'label'  => 'CIDADE',
            'rules'  => 'required'
        ],
        'estado' => [
            'label'  => 'EST.',
            'rules'  => 'required'
        ],
        'cep' => [
            'label'  => 'CEP',
            'rules'  => 'required'
        ],
    ];        

}

