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

    public function list(){
        $dados ['query'] = $this->PessoalModel->getCursos();
        $dados_cat ['query'] = $this->CategoriaModel->getCategorias();
        $this->load->view('template_header',$dados_cat);
        $this->load->view('pessoas', $dados);
        $this->load->view('template_footer');
    }

    public function add(){
        //if ($this>PessoaModel->getPessoaId()) 
        $dados ['query'] =  $this->CategoriaModel->getCategorias();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nome', 'Nome', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('sobrenome', 'Sobrenome', 'trim|required');
        $this->form_validation->set_rules('rg', 'RG', 'trim');
        $this->form_validation->set_rules('cpf', 'CPF', 'trim|required');
        $this->form_validation->set_rules('nascimento', 'Data de Nascimento', 'trim|required');
        $this->form_validation->set_rules('email', 'E-mail', 'trim|required');
        $this->form_validation->set_rules('telefone', 'Telefone', 'trim');
        $this->form_validation->set_rules('celular', 'Celular', 'trim|required');
        $this->form_validation->set_error_delimiters("<p class='alert alert-danger'>", "</p>");

           if ($this->form_validation->run() == FALSE) {
                $this->load->view('template_header', $dados);
                $this->load->view('create_pessoa', $dados);
                $this->load->view('template_footer');
            } else {
                $id = $this->PessoaModel->inserir();                               
                $this->session->flashdata('msg', 'Alteração realizada com sucesso.');                
                redirect(base_url('pessoaedit/'.$id));
            }
    }

    public function editar($id = null){

        if($id == null){
            redirect(base_url('pessoas'));
        }else{
            $dados['query'] = $this->PessoaModel->getPessoaId($id);
            $dados_cat ['query'] = $this->CategoriaModel->getCategorias();
            $this->load->library('form_validation');
            $this->form_validation->set_rules('nome', 'Nome', 'trim|required|min_length[3]');
            $this->form_validation->set_rules('sobrenome', 'Sobrenome', 'trim|required');
            $this->form_validation->set_rules('rg', 'RG', 'trim');
            $this->form_validation->set_rules('cpf', 'CPF', 'trim|required');
            $this->form_validation->set_rules('nascimento', 'Data de Nascimento', 'trim|required');
            $this->form_validation->set_rules('email', 'E-mail', 'trim|required');
            $this->form_validation->set_rules('telefone', 'Telefone', 'trim');
            $this->form_validation->set_rules('celular', 'Celular', 'trim|required');
            $this->form_validation->set_error_delimiters("<p class='alert alert-danger'>", "</p>");
            if($dados!=null){
                if ($this->form_validation->run() == FALSE) {
                    $this->load->view('template_header', $dados_cat);
                    $this->load->view('editar_pessoa', $dados);
                    $this->load->view('template_footer');
                } else {
                    $this->session->flashdata('msg', 'Alteração realizada com sucesso.');                 
                    $this->PessoaModel->editar($id);
                    $this->load->view('template_header', $dados_cat);
                    $this->load->view('editar_pessoa', $dados);
                    $this->load->view('template_footer');                                        
                }
            }    
            else{ 
                redirect(base_url('pessoaadd'));
            }  
            
        }
    }

    public function excluir($id = null){
        if($id== null){
            redirect(base_url('pessoas'));
        }else{
            $this->PessoaModel->excluir($id);
            redirect(base_url('pessoaadd'),'localtion');
        }
    }

}