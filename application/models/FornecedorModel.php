<?php
/**
 * Created by VisualCode.
 * User: willian
 * Date: 9/22/18
 * Time: 2:46 PM
 */
defined('BASEPATH') or exit('No direct script access allowed');
class FornecedorModel extends CI_Model{

    public function __construct()
    {
        $this->load->database();
       
    }    

    public function getFornecedores(){
        $query = $this->db->get("fornecedor");
        return $query->result();
    }

    public function inserir(){
        return $this->db->insert("fornecedor", $this->getDados());                
        //$this->db->insert_id();        
    }

    public function getFornecedorId($id = null){
        if($id != null){
            $this->db->where('id_forn', $id);
            $this->db->limit(1);
            $query = $this->db->get("fornecedor");
            return $query->row();
        }
    }

    public function editar($id = null){
        $this->db->update("fornecedor", $this->getDados(), array('id_forn' => $id));
    }

    public function excluir($id = null){
        if($id != null){
            $this->db->where('idforn');
            $this->db->delete("fornecedor", array('id_forn' => $id));
        }
    }

    public function getDados(){
        $data = array(
            "razao" => $this->input->post('razao'),
            "cnpj" => $this->input->post('cnpj'),
            "contato" => $this->input->post('contato'),
            "fantasia" => $this->input->post('fantasia'),
            "rua" => $this->input->post('rua'),
            "numero" => $this->input->post('numero'),
            "bairro" => $this->input->post('bairro'),
            "estado" => $this->input->post('estado'),
            "telefone" => $this->input->post('telefone'),
            "celular" => $this->input->post('celular'),
            "email" => $this->input->post('email')
        );        
        return $data;
    }


}