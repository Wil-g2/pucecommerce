<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');

    class CategoriaController extends MY_Controller{
        public function __construct(){

            parent::__construct();
            $this->load->model("CategoriaModel");
        }
    

    public function list(){
        $dados ['query'] = $this->CategoriaModel->getCategorias();
        $this->LoadView('list_categorias',$dados,$dados);  
    }

    public function add(){
        $this->load->library('form_validation');
        $dados_cat ['query'] = $this->CategoriaModel->getCategorias();

        $this->form_validation->set_rules('categoria', 'Categoria', 'trim|required|min_length[3]|max_length[20]');        
        $this->form_validation->set_error_delimiters("<p class='alert alert-danger'>", "</p>");
        
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('msg', 'Categoria não pode ser salva.');
            $this->LoadView('create_categoria', null ,$dados_cat);            
        } else {
            $this->CategoriaModel->inserir();
            $this->session->set_flashdata('msg', 'Categoria salva com sucesso.');
            redirect(base_url('categorias'));
        }
                        
    }

    public function editar($id = null){

        if($id== null){
            redirect(base_url('categorias'));
        }else{            
            $dados['query'] = $this->CategoriaModel->getCategoriaId($id);
            $dados_cat ['query'] = $this->CategoriaModel->getCategorias();

            $this->load->library('form_validation');
            $this->form_validation->set_rules('categoria', 'Categoria', 'trim|required|min_length[3]|max_length[20]');            
            $this->form_validation->set_error_delimiters("<p class='alert alert-danger'>", "</p>");
                
            if ($this->form_validation->run() == FALSE) {
                $this->LoadView('editar_categoria',$dados,$dados_cat);                          
            } else {
                $this->CategoriaModel->editar($id);
                $this->session->set_flashdata('msg', 'Categoria editada com sucesso.');
                redirect(base_url('categorias'), 'location');
            }                                        
        }                             
    }

    public function excluir($id = null){
        if($id== null){
            redirect(base_url('categorias'));
        }else{            
            $this->CategoriaModel->excluir($id);
            redirect(base_url('categorias'),'localtion');
        }
    }
}