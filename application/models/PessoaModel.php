<?php
/**
 * Created by PhpStorm.
 * User: willian
 * Date: 9/14/18
 * Time: 11:46 PM
 */
defined('BASEPATH') or exit('No direct script access allowed');
class PessoaModel extends CI_Model{

    public function __construct()
    {
        $this->load->database();
    }

    public function getPessoas(){
        $query = $this->db->get('pessoa');
        return $this->$query->result();
    }

    public function inserir(){
        $this->db->insert('pessoa', $this->getDados());                
        return $this->db->insert_id();        
    }

    public function getPessoaId($id = null){
        if($id != null){
            $this->db->where('user', $id);
            $this->db->limit(1);
            $query = $this->db->get('pessoa');
            return $query->row();
        }
    }

    public function editar($id = null){
        $this->db->update('pessoa', $this->getDados(), array('idpessoa' => $id));
    }

    public function excluir($id = null){
        if($id != null){
            $this->db->where('idpessoa');
            $this->db->delete('pessoa', array('idpessoa' => $id));
        }
    }

    public function getDados(){
        $data = array(
            "nome" => $this->input->post('nome'),
            "sobrenome" => $this->input->post('sobrenome'),
            "rg" => $this->input->post('rg'),
            "cpf" => $this->input->post('cpf'),
            "nascimento" => $this->input->post('data_nascimento'),
            "telefone" => $this->input->post('telefone'),
            "celular" => $this->input->post('celular'),
            "email" => $this->input->post('email'),
            "user" => $this->session->userdata('id_user')
        );        
        return $data;
    }


}