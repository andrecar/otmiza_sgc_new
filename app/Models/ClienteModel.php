<?php

namespace App\Models;

class ClienteModel extends BaseModel
{
    protected $table            = 'clientes';
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
        'nome_razao',
        'responsavel',
        'nascimento',
        'cpf_cnpj',
        'rg_escricao',
        'logradouro',
        'numero',
        'bairro',
        'cidade',
        'estado',
        'cep',
        'email',
        'telefone_1',
        'telefone_2',
        'ponto_referencia',
        'tipo_cadastro'
    ];

    protected $validationRules = [
        'nome_razao' => [
            'label'  => 'NOME OU RAZÂO',
            'rules'  => 'required'
        ],
    ]; 

    /**
     * Gera um array de clientes pronto para ser populada na função formDropDown
     *
     * @param array|null $params
     * @return void
     */
    public function formDropDown(array $params = null)
    {
        $this->select('id, nome_razao');

        $clientesArray = $this->findAll();

        $optionClientes = array_column($clientesArray, 'nome_razao', 'id');

        $optionSelecione = [
            ''  =>   'Selecione...'
        ];

        $SelecioneConteudo = $optionSelecione + $optionClientes;

        return ($SelecioneConteudo);
    }


    /**
     * Retorna todos CLIENTES que possuem ESTOQUES
     *
     * @return void
     */
    public function getComEstoques()
    {
        $this->select(" 
            clientes.usuarios_id,
            clientes.id             as id_cliente,           
            clientes.nome_razao     as  cliente_nome_razao,
            estoques.id             as  id_estoque,                
        ");
        //Lança tabela ESTOQUES na Query getComEstoque
        $this->join('estoques', 'estoques.cliente_id = clientes.id');
        //Agrupa todos registros do CLIENTE pelo nome.
        $this->groupBy('cliente_nome_razao');
        return $this->findAll();

    }

}
