<?php 

namespace App\Models;

class EstocarModel extends BaseModel
{
    protected $table            = 'rolos';
    protected $primaryKey       = 'id';

    protected $allowedFields = [       
        'estoque_id',
        'codigo',
        'quantidade',              
        'largura'
    ]; 

    protected $validationRules = [
        'codigo' => [
            'label'  => 'NÚMERO DO ROLO',
            'rules'  => 'required'
        ],
        'quanidade' => [
            'label'  => 'QUANTIDADE',
            'rules'  => 'required'
        ],        
    ]; 
}