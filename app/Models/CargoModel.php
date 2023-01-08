<?php 

namespace App\Models;

class CargoModel extends BaseModel
{
    protected $table            = 'cargos';   
    protected $primaryKey       = 'id';

    protected $useSoftDeletes   = true;
    protected $deletedField     = 'data_deletada';      //coloca data ao ser deletado
    protected $createdField     = 'data_cadastrada';    //coloca data ao ser cadastrado
    protected $updatedField     = 'data_atualizada';    //coloca data ao ser atualizado
    protected $useTimestamps    = true;


    protected $beforeInsert     = ['vinculaIdUsuario'];
   // protected $beforeUpdate     = ['#'];

    protected $allowedFields = [         
        'descricao',
               
    ];

    protected $validationRules = [
        'descricao' => [
            'label'  => 'DESCRIÇÃO',
            'rules'  => 'required'
        ]
    ]; 

    /**
     * Gera uma array da tabela CARGO pronta para popular em um form_dropdown.
     *se for passado o parâmetro 'opcoaNova', insere a opção 'NOVO CARGO...'.
     * 
     * @param array|null $params
     * @return void
     */
    public function formDropDown(array $params = null)
    {
        $this->select('id, descricao');

        $clientesArray = $this->findAll();

        $optionClientes = array_column($clientesArray, 'descricao', 'id');

        $optionSelecione = [
            ''  =>   'Selecione...'
        ];

        $SelecioneConteudo = $optionSelecione + $optionClientes;

        
    
        
        /** $selecioneConteudo, variável que recebe $optionSelecione + $optionCargo, para criar um
        *   SELECT com um option 'NOVO CARGO'.
        
        * Option para abrir um formulário para cadastrar um NOVO CARGO.        
            
        $novoCargo = [];
        if (!is_null($params) && isset($params['opcaoNova'])) {
            if ((bool) $params['opcaoNova'] === true) {
                $novoCargo = [
                    '----------------------' => [
                        'n' => 'NOVO CARGO...'
                    ]
                ];
            }
        }        
        return $selecioneConteudo + $novoCargo;
    }
    */       
        return ($SelecioneConteudo);
    }
}
