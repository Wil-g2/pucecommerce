<?php
/**
 * Created by PhpStorm.
 * User: willian
 * Date: 7/8/18
 * Time: 9:42 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class ProdutoController extends MY_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("ProdutoModel");
        $this->load->model("CategoriaModel");
    }

    public function add(){
        //$this->output->enable_profiler(FALSE);
        //$dados ['categorias'] = $this->CatergoriaModel->getCategorias();
        $dados_cat ['query'] = $this->CategoriaModel->getCategorias();

        $this->load->library('form_validation');
        $this->form_validation->set_rules('nome', 'Nome', 'trim|required');
        $this->form_validation->set_rules('descricao', 'Descrição', 'trim|required');
        $this->form_validation->set_rules('peso', 'Peso', 'trim|required');
        $this->form_validation->set_rules('valor', 'Valor', 'trim|required');
        $this->form_validation->set_rules('ativo', 'Ativo', 'trim|required');
        $this->form_validation->set_rules('fabricante', 'Fabricante', 'trim|required');
        $this->form_validation->set_rules('categoria', 'Categoria', 'trim|required');
        $this->form_validation->set_error_delimiters("<p class='alert alert-danger'>", "</p>");

        if ($this->form_validation->run() == FALSE){
            $this->LoadView('create_produto',$dados_cat,$dados_cat);
            /*$this->load->view('template_header', $dados_cat);
            $this->load->view('create_produto',$dados_cat);
            $this->load->view('template_footer');*/
        }else{
            $this->ProdutoModel->inserir();
            redirect(base_url('produtos'));
        }


    }

    public function list(){
        //$this->output->enable_profiler(TRUE);
        $dados ['query'] = $this->ProdutoModel->getProdutos();
        $dados_cat ['query'] = $this->CategoriaModel->getCategorias();
        $this->LoadView('list_produtos',$dados,$dados_cat);

        /*$this->load->view('template_header', $dados_cat);
        $this->load->view('list_produtos', $dados);
        $this->load->view('template_footer');*/
    }

    public function editar($id = null){
        if($id== null){
            redirect(base_url('produtos'));
        }else{
            $dados['prod'] = $this->ProdutoModel->getProdutosId($id);
            $dados['query'] = $this->CategoriaModel->getCategorias();

            $this->output->enable_profiler(TRUE);

            $this->load->library('form_validation');
            $this->form_validation->set_rules('nome', 'Nome', 'trim|required');
            $this->form_validation->set_rules('descricao', 'Descrição', 'trim|required');
            $this->form_validation->set_rules('peso', 'Peso', 'trim|required');
            $this->form_validation->set_rules('valor', 'Valor', 'trim|required');
            $this->form_validation->set_rules('ativo', 'Ativo', 'trim|required');
            $this->form_validation->set_rules('fabricante', 'Fabricante', 'trim|required');
            $this->form_validation->set_rules('categoria', 'Categoria', 'trim|required');
            $this->form_validation->set_error_delimiters("<p class='alert alert-danger'>", "</p>");

            if ($this->form_validation->run() == FALSE){
                $this->LoadView('editar_produto',$dados,$dados);
                /*$this->load->view('template_header', $dados);
                $this->load->view('editar_produto',$dados);
                $this->load->view('template_footer');*/
            }else{
                $this->ProdutoModel->editar($id);
                redirect(base_url('produtos'));
            }
        }
    }

    public function excluir($id = null){
        if($id== null){
            redirect(base_url('produtos'));
        }else{
            $this->ProdutoModel->excluir($id);
            redirect(base_url('produtos'),'localtion');
        }
    }
}