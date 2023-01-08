<?php 

namespace app\models;

class grademodel extends basemodel
{
    protected $table            = 'grade';
    protected $primarykey       = 'id';

    protected $allowedfields = [       
        'tamanho',
        'modelo_id'
    ]; 

    protected $validationrules = [
        'tamanho' => [
            'label'  => 'tamanho',
            'rules'  => 'required'
        ],
    ]; 

    /**
     * Restorna todos as grades daquele modelo
     *
     * @param [type] $id_modelo
     * @return void
     */
    public function getByIdModelo($id_modelo)
    {
        return $this->where('modelo_id', $id_modelo)->findAll();
    }

    /**
     * Retorna o id do modelo
     *
     * @param [type] $id_grade
     * @return void
     */

     /*
    public function getModeloByIdGrade($id_grade)
    {
        $rq = $this->find($id_grade);

        return !is_null($rq)? $rq['modelo_id'] : null;
    }
    */

    public function getGradeIdModelo($id_modelo)
    {
        $this->select("
           
            grade.modelo_id     as  id_modelo,
            grade.tamanho       as grade_tamanho
                 
            ");   
        $this->where('modelo_id', $id_modelo); 
        $this->join('modelos', 'modelos.id = grade.modelo_id'); 
        return $this->findAll();
    }
}