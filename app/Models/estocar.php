<?php 

namespace App\Models;

class EstocarModel extends BaseModel
{
    protected $table            = 'estocar';
    protected $primaryKey       = 'id';

    protected $allowedFields = [       
        'estoque_id',
        'quantidade',
        'unidade',
        'largura'
    ]; 

    protected $validationRules = [
        'tamanho' => [
            'label'  => 'TAMANHO',
            'rules'  => 'required'
        ],
    ]; 
}