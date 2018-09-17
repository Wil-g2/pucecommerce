<?php 
 defined('BASEPATH') OR exit('No direct script access allowed');

class CursoModel extends CI_Model{
    
   public function __construct(){
       //parent::__construct();
       $this->load->database();
   }

    //buscar todos usuáriso
    public function getCursos(){
        $query= $this->db->get("cursos");
        return $query->result();
    }

    public function inserir(){
        $data = array(
            'curso' =>$this->input->post('curso'),
            'descricao' =>$this->input->post('descricao'),
            'duracao' =>$this->input->post('duracao')
        );

        return $this->db->insert('cursos',$data);
    }

    public function getCursoId($id =null){
        if ($id != null ){
            $this->db->where('id',$id);
            $this->db->limit(1);
            $query = $this->db->get('cursos');
            return $query->row();
        }

    }

    public function editar($id = null){

        if($id != null){
            $data = array(
                'curso' =>$this->input->post('curso'),
                'descricao' =>$this->input->post('descricao'),
                'duracao' =>$this->input->post('duracao')
            );

            $this->db->update('cursos', $data, array('id'=>$id));    
        }
    }

    public function excluir($id = null){
        
        if ($id != null ){
            $this->db->where('id',$id);
            $this->db->delete('cursos', array('id'=>$id));
        }
    }
}