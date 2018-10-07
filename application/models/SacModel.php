<?php 
 defined('BASEPATH') OR exit('No direct script access allowed');

class SacModel extends CI_Model{
    
   public function __construct(){       
       $this->load->database();
   }
   
    public function getChamados(){
        $query= $this->db->get('sac');
        return $query->result();
    }

    public function inserir($idSac = 0){       
        $data = array(
            "id_user" =>$this->session->userdata('id_user'),
            "tipo" => $this->input->post('tipo'),
            "descricao" => $this->input->post('descricao')            
        );
        return $this->db->insert('sac',$data);
  
    }

    public function getSacId($id = null){
        if ($id != null ){
            $this->db->where('id_sac',$id);
            $this->db->limit(1);
            $query = $this->db->get('sac');
            return $query->row();
        }

    }

    public function editar($id = null){

        if($id != null){
            $data = array(                
                "tipo" => $this->input->post('tipo'),
                "descricao" => $this->input->post('descricao'),            
                "resposta" => $this->input->post('resposta'),            
                "status" => $this->input->post('status')            
            );

            return $this->db->update('sac', $data, array('id_sac'=>$id));    
        }
    }

    public function excluir($id = null){
        
        if ($id != null ){
            $this->db->where('id_sac',$id);
            $this->db->delete('sac', array('id_sac'=>$id));
        }
    }

    public function getSacDataTipo($dataIni, $dataFim, $tipo){
        if ($tipo != null ){
            $this->db->where('tipo',$tipo);
        }
        if ($dataIni != null && $dataFim != null){
            $this->db->where('data between '. $dataIni .' and '. $dataFim  );
        }

        $this->db->limit(1);
        $query = $this->db->get('sac');
        return $query->row();

    }
    
}