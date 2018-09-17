<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: willian
 * Date: 7/1/18
 * Time: 2:56 PM
 */

class AlunoController extends MY_Controller{

    public function __construct(){

        parent::__construct();
        //carrega o modelo de user
        $this->load->model("AlunoModel");        

    }

    public function index(){
        /*$users = new UserModel;
        $data['data'] = $users->getUsers();
        print_r($data);*/
        //phpinfo();

    }

    public function list(){
        $dados ['query'] = $this->AlunoModel->getUsers();        
        $dados_cat ['query'] = $this->CategoriaModel->getCategorias();
        
        $this->load->view('template_header',$dados_cat);
        $this->load->view('list_alunos', $dados);
        $this->load->view('template_footer');
    }

    public function add(){
        $dados_cat ['query'] = $this->CategoriaModel->getCategorias();

        $this->load->library('form_validation');
        $this->form_validation->set_rules('nome', 'Nome', 'trim|required|min_length[5]|max_length[150]');
        $this->form_validation->set_rules('cep', 'Cep', 'trim|required|min_length[8]|max_length[8]');
        $this->form_validation->set_rules('rua' ,'Rua', 'trim|required');
        $this->form_validation->set_rules('numero', 'Número', 'trim|required');
        $this->form_validation->set_rules('bairro', 'Bairro', 'trim|required');
        $this->form_validation->set_rules('cidade', 'Cidade', 'trim|required');
        $this->form_validation->set_rules('uf', 'UF', 'trim|required');
        $this->form_validation->set_rules('data_nascimento','Data Nascimento', 'trim|required');
        $this->form_validation->set_rules('cpf','CPF', 'trim|required');
        $this->form_validation->set_rules('data_pagamento','Data Pagamento', 'trim|required');
        $this->form_validation->set_error_delimiters("<p class='alert alert-danger'>", "</p>");


        if ($this->form_validation->run() == FALSE) {

            $this->load->view('template_header', $dados_cat);
            $this->load->view('create_alunos');
            $this->load->view('template_footer');
        } else {
            $this->AlunoModel->inserir();
            redirect(base_url('alunos'));
        }

    }

    public function editar($id = null){

        if($id== null){
            redirect(base_url('alunos'));
        }else{
            $dados['query'] = $this->AlunoModel->getUserId($id);
            $dados_cat ['query'] = $this->CategoriaModel->getCategorias();

            $this->load->library('form_validation');
            $this->form_validation->set_rules('nome', 'Nome', 'trim|required|min_length[5]|max_length[150]');
            $this->form_validation->set_rules('cep', 'Cep', 'trim|required|min_length[8]|max_length[8]');
            $this->form_validation->set_rules('rua' ,'Rua', 'trim|required');
            $this->form_validation->set_rules('numero', 'Número', 'trim|required');
            $this->form_validation->set_rules('bairro', 'Bairro', 'trim|required|max_length[50]');
            $this->form_validation->set_rules('uf', 'UF', 'trim|required');
            $this->form_validation->set_rules('data_nascimento','Data Nascimento', 'trim|required');
            $this->form_validation->set_rules('cpf','CPF', 'trim|required');
            $this->form_validation->set_rules('data_pagamento','Data Pagamento', 'trim|required');
            $this->form_validation->set_error_delimiters("<p class='alert alert-danger'>", "</p>");

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('template_header', $dados_cat);
                $this->load->view('editar_aluno', $dados);
                $this->load->view('template_footer');
            } else {
                $this->AlunoModel->editar($id);
                redirect(base_url('alunos'), 'location');
            }
        }
    }

    public function excluir($id = null){
        if($id== null){
            redirect(base_url('alunos'));
        }else{
            try {
                $this->AlunoModel->excluir( $id );
            }catch (Exception $e){
                return 'teste';
            }
            redirect(base_url('alunos'),'localtion');
        }
    }

    public function aluno_pagamento($id = null){
        if($id != null){
            $this->load->model('PagamentoModel');
            $dados['query'] = $this->PagamentoModel->getPagementoAluno($id);
            $dados_cat ['query'] = $this->CategoriaModel->getCategorias();

            //$this->output->enable_profiler(TRUE);
            $this->load->view('template_header',$dados_cat);
            $this->load->view('list_pagamentos', $dados);
            $this->load->view('template_footer');
        }else{
            redirect('alunos');
        }
    }
}