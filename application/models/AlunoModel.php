<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: willian
 * Date: 7/1/18
 * Time: 2:58 PM
 */

class AlunoModel extends CI_Model
{

    public function __construct(){

    //parent::__construct();
    $this->load->database();
    }


    //buscar todos usuáriso
    public function getUsers(){
        $query= $this->db->get("alunos");
        return $query->result();
    }

    public function inserir(){
        $data = array(
            'nome' =>$this->input->post('nome'),
            'cep' =>$this->input->post('cep'),
            'rua' =>$this->input->post('rua'),
            'numero' =>$this->input->post('numero'),
            'bairro' =>$this->input->post('bairro'),
            'cidade' =>$this->input->post('cidade'),
            'uf' =>$this->input->post('uf'),
            'data_nascimento' =>$this->input->post('data_nascimento'),
            'identidade' =>$this->input->post('identidade'),
            'cpf' =>$this->input->post('cpf'),
            'responsavel' =>$this->input->post('responsavel'),
            'email' =>$this->input->post('email'),
            'telefone' =>$this->input->post('telefone'),
            'celular' =>$this->input->post('celular'),
            'data_pagamento' =>$this->input->post('data_pagamento')
        );

        return $this->db->insert('alunos',$data);
    }

    public function getUserId($id =null){
        if ($id != null ){
            $this->db->where('id',$id);
            $this->db->limit(1);
            $query = $this->db->get('alunos');
            return $query->row();
        }

    }

    public function editar($id = null){

        if($id != null){
            $data = array(
                'nome' =>$this->input->post('nome'),
                'cep' =>$this->input->post('cep'),
                'rua' =>$this->input->post('rua'),
                'numero' =>$this->input->post('numero'),
                'bairro' =>$this->input->post('bairro'),
                'cidade' =>$this->input->post('cidade'),
                'uf' =>$this->input->post('uf'),
                'data_nascimento' =>$this->input->post('data_nascimento'),
                'identidade' =>$this->input->post('identidade'),
                'cpf' =>$this->input->post('cpf'),
                'responsavel' =>$this->input->post('responsavel'),
                'email' =>$this->input->post('email'),
                'telefone' =>$this->input->post('telefone'),
                'celular' =>$this->input->post('celular'),
                'data_pagamento' =>$this->input->post('data_pagamento')
            );

            $this->db->update('alunos', $data, array('id'=>$id));
        }
    }


    public function excluir($id = null)
    {
        if ($id != null) {
            $this->db->where('id', $id);
            if (!$this->db->delete('alunos', array('id' => $id))){
                $error = $this->db->error();
            }
        }
    }
}