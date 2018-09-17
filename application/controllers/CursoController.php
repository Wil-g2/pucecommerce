<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');

    class CursoController extends MY_Controller{       
        public function __construct(){

            parent::__construct();
            //carrega o modelo de user
            $this->load->model("CursoModel");        
        }
    
    public function index(){
        /*$users = new UserModel; 
        $data['data'] = $users->getUsers();
        print_r($data);*/
        //phpinfo();

    }

    public function list(){
        $dados ['query'] = $this->CursoModel->getCursos();
        $dados_cat ['query'] = $this->CategoriaModel->getCategorias();
        $this->load->view('template_header',$dados_cat);               
        $this->load->view('list_cursos', $dados);
        $this->load->view('template_footer');               
    }

    public function add(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('curso', 'Curso', 'trim|required|min_length[3]|max_length[20]');
        $this->form_validation->set_rules('descricao', 'Descrição', 'trim|required|min_length[10]|max_length[255]');
        $this->form_validation->set_rules('duracao', 'Duração', 'trim|required|min_length[1]|max_length[2]');
        $this->form_validation->set_error_delimiters("<p class='alert alert-danger'>", "</p>");
        
        if ($this->form_validation->run() == FALSE) {
            $dados_cat ['query'] = $this->CategoriaModel->getCategorias();
            $this->load->view('template_header', $dados_cat);               
            $this->load->view('create_curso');
            $this->load->view('template_footer');               
        } else {
            $this->CursoModel->inserir();
            redirect(base_url('cursos'));
        }
                        
    }

    public function editar($id = null){

        if($id== null){
            redirect(base_url('cursos'));
        }else{            
            $dados['query'] = $this->CursoModel->getCursoId($id);
            $dados_cat ['query'] = $this->CategoriaModel->getCategorias();

            $this->load->library('form_validation');
            $this->form_validation->set_rules('curso', 'Curso', 'trim|required|min_length[3]|max_length[20]');
            $this->form_validation->set_rules('descricao', 'Descrição', 'trim|required|min_length[10]|max_length[255]');
            $this->form_validation->set_rules('duracao', 'Duração', 'trim|required|min_length[1]|max_length[2]');
            $this->form_validation->set_error_delimiters("<p class='alert alert-danger'>", "</p>");
                
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('template_header', $dados_cat);               
                $this->load->view('editar_curso', $dados);
                $this->load->view('template_footer');               
            } else {
                $this->CursoModel->editar($id);
                redirect(base_url('cursos'), 'location');
            }                                        
        }                             
    }

    public function excluir($id = null){
        if($id== null){
            redirect(base_url('cursos'));
        }else{            
            $this->CursoModel->excluir($id);
            redirect(base_url('cursos'),'localtion');
        }
    }
}