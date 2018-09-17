<?php 
 defined('BASEPATH') OR exit('No direct script access allowed');

class CategoriaModel extends CI_Model{
    
   public function __construct(){       
       $this->load->database();
   }
   
    //buscar todas categorias
    public function getCategorias(){
        $query= $this->db->get("categorias");
        return $query->result();
    }

    public function inserir(){
        $data = array(
            'categoria' =>$this->input->post('categoria')            
        );

        return $this->db->insert('categorias',$data);
    }

    public function getCategoriaId($id =null){
        if ($id != null ){
            $this->db->where('id',$id);
            $this->db->limit(1);
            $query = $this->db->get('categorias');
            return $query->row();
        }

    }

    public function editar($id = null){

        if($id != null){
            $data = array(
                'categoria' =>$this->input->post('categoria')               
            );

            $this->db->update('categorias', $data, array('id'=>$id));    
        }
    }

    public function excluir($id = null){
        
        if ($id != null ){
            $this->db->where('id',$id);
            $this->db->delete('categorias', array('id'=>$id));
        }
    }
    
}