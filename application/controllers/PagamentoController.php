<?php
/**
 * Created by PhpStorm.
 * User: willian
 * Date: 7/8/18
 * Time: 9:42 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class PagamentoController extends MY_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("PagamentoModel");
        $this->load->model("CursoModel");
        $this->load->model("AlunoModel");
    }


    public function add(){

        $dados ['alunos'] = $this->AlunoModel->getUsers();
        $dados ['cursos'] = $this->CursoModel->getCursos();
        $dados_cat ['query'] = $this->CategoriaModel->getCategorias();

        $this->load->library('form_validation');
        $this->form_validation->set_rules('curso', 'Curso', 'trim|required');
        $this->form_validation->set_rules('aluno', 'Aluno', 'trim|required');
        $this->form_validation->set_rules('data_pagamento', 'Data Pagamento', 'trim|required');
        $this->form_validation->set_rules('data_vencimento', 'Data Vencimetno', 'trim|required');
        $this->form_validation->set_rules('valor', 'Valor', 'trim|required');
        $this->form_validation->set_error_delimiters("<p class='alert alert-danger'>", "</p>");

        if ($this->form_validation->run() == FALSE){
            $this->load->view('template_header', $dados_cat);
            $this->load->view('create_pagamento',$dados);
            $this->load->view('template_footer');
        }else{
            $this->PagamentoModel->inserir();
            redirect(base_url('pagamentos'));
        }


    }

    public function list(){
        $dados ['query'] = $this->PagamentoModel->getPagamentos();
        $dados_cat ['query'] = $this->CategoriaModel->getCategorias();

        $this->load->view('template_header', $dados_cat);
        $this->load->view('list_pagamentos', $dados);
        $this->load->view('template_footer');
    }

    public function editar($id = null){
        if($id== null){
            redirect(base_url('pagamentos'));
        }else{
            $dados['query'] = $this->PagamentoModel->getPagementoId($id);
            $dados ['alunos'] = $this->AlunoModel->getUsers();
            $dados ['cursos'] = $this->CursoModel->getCursos();
            $dados_cat ['query'] = $this->CategoriaModel->getCategorias();

            $this->output->enable_profiler(TRUE);            

            $this->load->library('form_validation');
            $this->form_validation->set_rules('curso', 'Curso', 'trim|required');
            $this->form_validation->set_rules('aluno', 'Aluno', 'trim|required');
            $this->form_validation->set_rules('data_pagamento', 'Data Pagamento', 'trim|required');
            $this->form_validation->set_rules('data_vencimento', 'Data Vencimetno', 'trim|required');
            $this->form_validation->set_rules('valor', 'Valor', 'trim|required');
            $this->form_validation->set_error_delimiters("<p class='alert alert-danger'>", "</p>");

            if ($this->form_validation->run() == FALSE){
                $this->load->view('template_header', $dados_cat);
                $this->load->view('editar_pagamento',$dados);
                $this->load->view('template_footer');
            }else{
                $this->PagamentoModel->editar($id);
                redirect(base_url('pagamentos'));
            }
        }
    }

    public function excluir($id = null){
        if($id== null){
            redirect(base_url('pagamentos'));
        }else{
            $this->PagamentoModel->excluir($id);
            redirect(base_url('pagamentos'),'localtion');
        }
    }
}