<?php
/**
 * Created by PhpStorm.
 * User: willian
 * Date: 9/14/18
 * Time: 11:45 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class FornecedorController extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('FornecedorModel');
    }

    public function list(){
        $dados ['query'] = $this->FornecedorModel->getFornecedores();
        $this->load->view('admin/header');
        $this->load->view('fornecedores/list_forn', $dados);
        $this->load->view('admin/footer');
    }

    public function add(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('razao', 'Razão Social', 'trim|required');
        $this->form_validation->set_rules('cnpj', 'CNPJ', 'trim|required');
        $this->form_validation->set_rules('contato', 'Contato Empresa', 'trim');
        $this->form_validation->set_rules('fantasia', 'Nome Fantasia', 'trim|required');
        $this->form_validation->set_rules('rua', 'Rua', 'trim|required');
        $this->form_validation->set_rules('numero', 'Número', 'trim|required');
        $this->form_validation->set_rules('bairro', 'Bairro', 'trim|required');
        $this->form_validation->set_rules('cidade', 'Cidade', 'trim|required');
        $this->form_validation->set_rules('estado', 'Estado', 'trim|required');
        $this->form_validation->set_rules('email', 'E-mail', 'trim|required');
        $this->form_validation->set_rules('telefone', 'Telefone', 'trim');
        $this->form_validation->set_rules('celular', 'Celular', 'trim|required');
        $this->form_validation->set_error_delimiters("<p class='alert alert-danger'>", "</p>");

           if ($this->form_validation->run() == FALSE) {
                $this->load->view('admin/header');
                $this->load->view('fornecedores/create_forn');
                $this->load->view('admin/footer');
            } else {                
                $this->FornecedorModel->inserir();
                $this->session->flashdata('msg', 'Fornecedor Cadastrado com sucesso.');                
                $this->load->view('admin/header');
                redirect(base_url('fornecedores'),'localtion');
                $this->load->view('admin/footer');  

            }
    }

    public function editar($id = null){

        if($id == null){
            redirect(base_url('fornecedores'));
        }else{
            $dados['query'] = $this->FornecedorModel->getFornecedorId($id);
            $this->load->library('form_validation');
            $this->form_validation->set_rules('razao', 'Razão Social', 'trim|required');
            $this->form_validation->set_rules('cnpj', 'CNPJ', 'trim|required');
            $this->form_validation->set_rules('contato', 'Contato Empresa', 'trim');
            $this->form_validation->set_rules('fantasia', 'Nome Fantasia', 'trim|required');
            $this->form_validation->set_rules('rua', 'Rua', 'trim|required');
            $this->form_validation->set_rules('numero', 'Número', 'trim|required');
            $this->form_validation->set_rules('bairro', 'Bairro', 'trim|required');
            $this->form_validation->set_rules('cidade', 'Cidade', 'trim|required');
            $this->form_validation->set_rules('estado', 'Estado', 'trim|required');
            $this->form_validation->set_rules('email', 'E-mail', 'trim|required');
            $this->form_validation->set_rules('telefone', 'Telefone', 'trim');
            $this->form_validation->set_rules('celular', 'Celular', 'trim|required');
            $this->form_validation->set_error_delimiters("<p class='alert alert-danger'>", "</p>");

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('admin/header');
                $this->load->view('fornecedores/editar_forn', $dados);
                $this->load->view('admin/footer');
            } else {
                $this->PessoaModel->editar($id);
                $this->load->view('admin/header');
                $this->load->view('fornecedores/editar_forn', $dados);
                $this->load->view('admin/footer');
            }
        }
    }

    public function excluir($id = null){
        if($id== null){
            redirect(base_url('fornecedores'));
        }else{
            $this->FornecedorModel->excluir($id);
            redirect(base_url('fornecedores'),'localtion');
        }
    }

}