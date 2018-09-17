<?php
/**
 * Created by PhpStorm.
 * User: willian
 * Date: 7/14/18
 * Time: 1:47 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');
class PagamentoModel extends CI_Model {


    public function __construct(){

        //parent::__construct();
        $this->load->database();
    }


    //buscar todos usuáriso
    public function getPagamentos(){
        $this->db->select('p.*,a.nome,c.curso');
        $this->db->from('pagamento as p');
        $this->db->join('alunos as a ', 'p.aluno = a.id');
        $this->db->join('cursos as c', 'p.curso = c.id');
        $query= $this->db->get();
        return $query->result();        
    }

    public function inserir(){
        $data = array(
            'curso' =>$this->input->post('curso'),
            'aluno' =>$this->input->post('aluno'),
            'data_pagamento' =>$this->input->post('data_pagamento'),
            'data_vencimento' =>$this->input->post('data_vencimento'),
            'parcela' =>$this->input->post('parcela'),
            'valor' =>$this->input->post('valor'),
            'desconto' =>$this->input->post('desconto'),
            'data_inc' =>$this->input->post('data_inc')
        );

        return $this->db->insert('pagamento',$data);
    }

    public function getPagementoId($id =null){
        if ($id != null ){
            $this->db->where('id',$id);
            $this->db->limit(1);
            $query = $this->db->get('pagamento');
            return $query->row();
        }

    }

    public function editar($id = null){

        if($id != null){
            $data = array(
                'curso' =>$this->input->post('curso'),
                'aluno' =>$this->input->post('aluno'),
                'data_pagamento' =>$this->input->post('data_pagamento'),
                'data_vencimento' =>$this->input->post('data_vencimento'),
                'parcela' =>$this->input->post('parcela'),
                'valor' =>$this->input->post('valor'),
                'desconto' =>$this->input->post('desconto'),
                'data_inc' =>$this->input->post('data_inc')
            );

            $this->db->update('pagamento', $data, array('id'=>$id));
        }
    }


    public function excluir($id = null)
    {

        if ($id != null) {
            $this->db->where('id', $id);
            $this->db->delete('pagamento', array('id' => $id));
        }
    }

    public function getPagementoAluno($id_aluno =null){
        if ($id_aluno != null ){
            $this->db->select('p.*,a.nome,c.curso');
            $this->db->from('pagamento as p');
            $this->db->join('alunos as a ', 'p.aluno = a.id');
            $this->db->join('cursos as c', 'p.curso = c.id');
            $this->db->where('aluno',$id_aluno);
            $query= $this->db->get();
            return $query->result();
        }

    }
}