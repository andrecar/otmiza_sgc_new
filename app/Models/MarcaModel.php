<?php

namespace App\Models;

class MarcaModel extends BaseModel
{
    protected $table            = 'marcas';   
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
        'descricao'
    ];

    protected $validationRules = [
        'descricao' => [
            'label'  => 'descricao',
            'rules'  => 'required'
        ],
    ]; 

    /**
     * Gera uma array da tabela MARCA pronta para popular em um form_dropdown.
     *se for passado o parâmetro 'opcoaNova', insere a opção 'NOVA MARCA...'.
     * 
     * @param array|null $params
     * @return void
     */
    public function formDropDown(array $params = null)
    {
        $this->select('id, descricao');

        $marcaArray = $this->findAll();

        $optionMarca = array_column($marcaArray, 'descricao', 'id');

        // $ptionSelecione, variável para criar um campo 'SELECT'.
        
        $optionSelecione = [
            ''  =>   'SELECIONE...',        
        ];
        
        $selecioneConteudo = $optionSelecione + $optionMarca;      
       
        return $selecioneConteudo;
    }
}


