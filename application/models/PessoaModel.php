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
    public function inserir(){
        $this->db->insert('pessoa', $this->getDados());
    }

    public function getDados(){
        $data = array(
            "nome" => $this->input->post('nome'),
            "sobrenome" => $this->input->post('sobrenome'),
            "rg" => $this->input->post('rg'),
            "cpf" => $this->input->post('cpf'),
            "data_nascimento" => $this->input->post('data_nascimento'),
            "telefone" => $this->input->post('telefone'),
            "celular" => $this->input->post('celular'),
        );
        return $data;
    }

}