<?php 
 defined('BASEPATH') OR exit('No direct script access allowed');

class PedidoModel extends CI_Model{
    
   public function __construct(){       
       $this->load->database();
   }
   
    public function getPedidos(){
        $query= $this->db->get('pedido');
        return $query->result();
    }

    public function inserir($total = 0){       
        $data = array(
            //'data' => date('d-m-Y'),
            'total' =>$total,
            'user_pedido'=>$this->session->userdata('id_user')
        );

        if ($this->db->insert('pedido',$data)){
            if($this->inserirItens($this->db->insert_id())){
                unset($_SESSION['cart']);
            }
        }
    }

    public function inserirItens($id = null){
       //$this->load->model('ProdutoModel');
       $dados = $_SESSION['cart'];
       foreach ($dados as $dado):
           //$produtos = $this->ProdutoModel->getProdutosId($dados['id']);
           $data = array(
               "produto" => $dado['id'],
               "pedido" => $id,
               "quantidade"=>$dado['qtd'],
               "total" => ($dado['qtd']*$dado['valor'])
           );
           $this->itensAdd($data);
       endforeach;
       return true;
    }

    public function itensAdd($dados){
       try {
           return $this->db->insert( 'itenspedido', $dados );
       }catch (Exception $e){
           echo "Erro ao inserir itens do pedido:". $e->getMessage();
        }
    }

    public function getPedidoId($id = null){
        if ($id != null ){
            $this->db->where('idpedido',$id);
            $this->db->limit(1);
            $query = $this->db->get('pedido');
            return $query->row();
        }

    }

    public function getPedidoIdUser($id = null){
        if ($id != null ){
            $this->db->where('user_pedido',$id);
            $query = $this->db->get('pedido');
            return $query->result();
        }
    }

    public function editar($id = null){

        if($id != null){
            $data = array(
                'data' => new date(),
                'total' =>$total,
                'user_pedido'=>$this->session->userdata('id_user')
            );

            $this->db->update('pedido', $data, array('idpedido'=>$id));    
        }
    }

    public function excluir($id = null){
        
        if ($id != null ){
            $this->db->where('idpedido',$id);
            $this->db->delete('pedido', array('idpedido'=>$id));
        }
    }

    public function getPedidoPeriodo(){
        if ($this->input->post('usuario')!=null){
            $this->db->where('id_user',$this->input->post('usuario'));
        }        
        $dateIni = $this->input->post('date_ini'); 
        $dateFim = $this->input->post('date_fim'); 
        if ($dateIni!=$dateFim){
            $this->db->where('data >=', date('Y-m-d',strtotime($dateIni)));
            $this->db->where('data <=', date('Y-m-d',strtotime($dateFim)));
        }else{
            $this->db->where('data = ', date('Y-m-d',strtotime($dateIni)));
        }
        return $this->db->get('pedido')->result();
    }    
}