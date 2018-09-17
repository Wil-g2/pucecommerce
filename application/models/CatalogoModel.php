<?php 
 defined('BASEPATH') OR exit('No direct script access allowed');

class CatalogoModel extends CI_Model{
    
   public function __construct(){       
       $this->load->database();
   }
   
    public function getCatalogos(){
        $query = $this->db->get("produtos");
        return $query->result();
    }

    public function getCatalogoId($id =null){
        if ($id != null ){
            $this->db->where('categoria',$id);            
            $query = $this->db->get('produtos');            
            return $query->result();
        }
    }

    public function getCartId($id =null){
        if ($id != null ){
            $this->db->where('id',$id);
            $query = $this->db->get('produtos');
            return $query->row();
        }
    }
    
}