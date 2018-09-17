<?php 
 defined('BASEPATH') OR exit('No direct script access allowed');

class AcompanharModel extends CI_Model{
    
   public function __construct(){       
       $this->load->database();
   }
   
    public function getAcompanhamentos(){
        $query= $this->db->get('acompanhamento');
        return $query->result();
    }

    public function inserir($idPedido = 0){       
        $data = array(
            'id_pedido' =>$idPedido,
            'evento'=> "teste"
        );

        $this->db->insert('acompanhamento',$data);
  
    }

    public function getAcompanhamentoId($id = null){
        if ($id != null ){
            $this->db->where('id',$id);
            $this->db->limit(1);
            $query = $this->db->get('acompanhamento');
            return $query->row();
        }

    }

    public function getAcompanhamentoPedidoId($id = null){
        if ($id != null ){
            $this->db->where('id_pedido',$id);
            $query = $this->db->get('acompanhamento');
            return $query->result();
        }
    }

    public function editar($id = null){

        if($id != null){
            $data = array(
                'id_pedido' =>$idPedido,
                'evento'=> "teste"
            );

            $this->db->update('acompanhamento', $data, array('id'=>$id));    
        }
    }

    public function excluir($id = null){
        
        if ($id != null ){
            $this->db->where('id',$id);
            $this->db->delete('acompanhamento', array('id'=>$id));
        }
    }
    
}