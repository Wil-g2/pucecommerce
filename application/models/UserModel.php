<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class UserModel extends CI_Model
{

    public function __construct()
    {
       //parent::__construct();
        $this->load->database();
    }
   
    //buscar todos usuáriso
    public function getUsers()
    {
        $query = $this->db->get("users");
        return $query->result();
    }

    public function inserir($create = null)
    {
        if ($create == null) {
            $data = array(
                'login' => $this->input->post('login'),
                'senha' => sha1($this->input->post('senha')),
                'senha_conf' => sha1($this->input->post('passwordconf')),            
                'tipo' => $this->input->post('tipo'),
                'email' => $this->input->post('email')
            );
            return $this->db->insert('users', $data);
        }else{
            return $this->db->insert('users', $create);
        }        
    }

    public function getUserId($id = null)
    {
        if ($id != null) {
            $this->db->where('id', $id);
            $this->db->limit(1);
            $query = $this->db->get('users');
            return $query->row();
        }

    }

    public function editar($id = null)
    {
        if ($id != null) {

            if ((strlen($this->input->post('senha')) < 25) and (strlen($this->input->post('passwordconf')) < 25)) {
                $senha = sha1($this->input->post('senha'));
                $senha_conf = sha1($this->input->post('passwordconf'));
            } else {
                $senha = $this->input->post('senha');
                $senha_conf = $this->input->post('passwordconf');
            }

            $data = array(
                'login' => $this->input->post('login'),
                'senha' => $senha,
                'senha_conf' => $senha_conf,
                'tipo' => $this->input->post('tipo'),
                'email' => $this->input->post('email')
            );


            $this->db->update('users', $data, array('id' => $id));
        }
    }


    public function excluir($id = null)
    {

        if ($id != null) {
            $this->db->where('id', $id);
            $this->db->delete('users', array('id' => $id));
        }
    }

    public function Logar()
    {
        //$this->output->enable_profiler(true);
        $senha = sha1($this->input->post('senha'));
        $login = strtolower($this->input->post('login'));
        $this->db->where('login', $login);
        $this->db->where('senha', $senha);
        return $this->db->get('users')->result();
    }

    public function getUserEmail($email = null){
        if ($email != null) {
            $this->db->where('email', $email);
            $this->db->limit(1);
            $query = $this->db->get('users');
            return $query->row();
        }

    }
    
    public function updateUserSenha($email = null){
        if ($email != null) {
            $this->db->where('email', $email);
            $dados  = array(
                "senha" => sha1(123456),
                "senha_conf" => sha1(123456)
            );
            return $this->db->update('users', $dados, array('email' => $email));
        }    

    }
}