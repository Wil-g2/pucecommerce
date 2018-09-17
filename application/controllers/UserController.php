<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');

    class UserController extends MY_Controller{
        public function __construct(){

            parent::__construct();
            $this->load->model("UserModel");
        }

    public function list(){        
        $dados ['query'] = $this->UserModel->getUsers();
        $dados_cat ['query'] = $this->CategoriaModel->getCategorias();
        $this->LoadView( 'list_users',$dados, $dados_cat);
    }

    public function add(){
        $dados_cat ['query'] = $this->CategoriaModel->getCategorias();

        $this->load->library('form_validation');        
        $this->form_validation->set_rules('login', 'Login', 'trim|required|min_length[5]|max_length[20]');
        $this->form_validation->set_rules('senha', 'Senha', 'trim|required|min_length[6]|max_length[100]');
        $this->form_validation->set_rules('passwordconf', 'Confirmação', 'trim|required|min_length[6]|max_length[100]|matches[senha]');
        $this->form_validation->set_rules('email', 'E-mail', 'trim|required|min_length[15]|is_unique[users.email]');
        $this->form_validation->set_error_delimiters("<p class='alert alert-danger'>", "</p>");
        
        if ($this->form_validation->run() == FALSE) {
           $this->LoadView('createuser',null,$dados_cat);  
        } else {
            $this->UserModel->inserir();
            redirect(base_url('users'));
        }
                        
    }

    public function editar($id = null){

        if($id== null){
            redirect(base_url('users'));
        }else{            
            $dados['query'] = $this->UserModel->getUserId($id);
            $dados_cat ['query'] = $this->CategoriaModel->getCategorias();

            $this->load->library('form_validation');
            $this->form_validation->set_rules('login', 'Login', 'trim|required|min_length[5]|max_length[20]');
            $this->form_validation->set_rules('senha', 'Senha', 'trim|required|min_length[6]|max_length[100]');
            $this->form_validation->set_rules('passwordconf', 'Confirmação', 'trim|required|min_length[6]|max_length[100]|matches[senha]');            
            $this->form_validation->set_rules('email', 'E-mail', 'trim|required|min_length[15]');
            $this->form_validation->set_error_delimiters("<p class='alert alert-danger'>", "</p>");
                
            if ($this->form_validation->run() == FALSE) {
               $this->LoadView('editar',$dados,$dados_cat);
            } else {
                $this->UserModel->editar($id);
                if ($this->session->userdata('tipo')=='administrador'){
                    redirect(base_url('users'), 'location');
                }else{
                    $dados['msg'] = "Editado com sucesso."; 
                    $this->LoadView('editar',$dados,$dados_cat);
                }    
            }                                        
        }                             
    }

    public function excluir($id = null){
        if($id== null){
            redirect(base_url('users'));
        }else{            
            $this->UserModel->excluir($id);
            redirect(base_url('users'),'localtion');
        }
    }        
    
}