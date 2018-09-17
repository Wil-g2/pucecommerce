<?php
/**
 * Created by PhpStorm.
 * User: willian
 * Date: 9/14/18
 * Time: 11:45 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class PessoaController extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('PessoaModel');
        $this->load->model('CategoriaModel');
    }

    public function add(){
        $dados ['query'] =  $this->CategoriaModel->getCategorias();
        $this->form_validation->set_rules('nome', 'Nome', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('sobrenome', 'Sobrenome', 'trim|required');
        $this->form_validation->set_rules('rg', 'RG', 'trim');
        $this->form_validation->set_rules('cpf', 'CPF', 'trim|required');
        $this->form_validation->set_rules('nascimento', 'Data de Nascimento', 'trim|required');
        $this->form_validation->set_rules('email', 'E-mail', 'trim|require]');
        $this->form_validation->set_rules('telefone', 'Telefone', 'trim]');
        $this->form_validation->set_rules('celular', 'Celular', 'trim|require]');

        $this->load->view('template_header', $dados);
        $this->load->view('create_pessoa');
        $this->load->view('template_footer');

        //$this->PessoaModel->inserir();
    }


}