<?php
/**
 * Created by PhpStorm.
 * User: willian
 * Date: 9/1/18
 * Time: 12:06 AM
 */
 defined('BASEPATH') OR exit('No direct script access allowed');

class EnderecoModel extends CI_Model{

    public function __construct(){
        //parent::__construct();
        $this->load->database();
    }

    //buscar todos usuáriso
    public function getEnderecos(){
        $query= $this->db->get("enderecos");
        return $query->result();
    }

    public function inserir(){

        $this->output->enable_profiler(TRUE);
        return $this->db->insert('enderecos',$this->getDadosForm());
    }

    public function getEnderecoId($id =null){
        if ($id != null ){
            $this->db->where('id',$id);
            $this->db->limit(1);
            $query = $this->db->get('enderecos');
            return $query->row();
        }

    }

    public function editar($id = null){

        if($id != null){
            $this->db->update('enderecos', $this->getDadosForm(), array('id'=>$id));
        }
    }

    public function excluir($id = null){

        if ($id != null ){
            $this->db->where('id',$id);
            $this->db->delete('enderecos', array('id'=>$id));
        }
    }

    public function getDadosForm(){
        $data = array(
            'rua' =>$this->input->post('rua'),
            'cep' =>$this->input->post('cep'),
            'cidade' =>$this->input->post('cidade'),
            'bairro' =>$this->input->post('bairro'),
            'numero' =>$this->input->post('numero'),
            'estado' =>$this->input->post('estado'),
            'complemento' =>$this->input->post('complemento'),
            'user_enderecos' =>$this->session->userdata('id_user'),
            'identificacao' => $this->input->post('identificacao')
        );
        return $data;
    }
}