<?php 
 defined('BASEPATH') OR exit('No direct script access allowed');

class AvaliacaoModel extends CI_Model{
    
   public function __construct(){       
       $this->load->database();
   }
   
    public function getAvaliacoes(){
        $query= $this->db->get('avaliacao');
        return $query->result();
    }

    public function inserir($idPedido = 0){       
        $data = array(
            'data' =>$this->input->post('data'),
            'avaliacao'=> $this->input->post('avaliacao'),
            'comentario'=> $this->input->post('comentario')
        );
        $this->db->insert('avaliacao',$data);
    }
    
}