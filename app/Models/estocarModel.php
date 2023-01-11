<?php 

namespace App\Models;

class EstocarModel extends BaseModel
{
    protected $table            = 'estocar';
    protected $primaryKey       = 'id';

    protected $allowedFields = [       
        'estoque_id',
        'rolo_numero',
        'quantidade',        
        'largura'
    ]; 

    protected $validationRules = [
        'rolo_numero' => [
            'label'  => 'NÚMERO DO ROLO',
            'rules'  => 'required'
        ],
        'quanidade' => [
            'label'  => 'QUANTIDADE',
            'rules'  => 'required'
        ],        
    ]; 
}