<?php
/**
 * Created by PhpStorm.
 * User: willian
 * Date: 9/1/18
 * Time: 12:15 AM
 */

    defined('BASEPATH') OR exit('No direct script access allowed');

    class EnderecoController extends MY_Controller{
        public function __construct(){

            parent::__construct();
            //carrega o modelo de user
            $this->load->model("EnderecoModel");
            $this->load->model("CategoriaModel");

        }

        public function index(){

        }

        public function list(){
            $dados ['query'] = $this->EnderecoModel->getEnderecos();
            $dados_cat ['query'] = $this->CategoriaModel->getCategorias();
            $this->load->view('template_header',$dados_cat);
            $this->load->view('list_endereco', $dados);
            $this->load->view('template_footer');
        }

        public function listId(){
            $dados ['query'] = $this->EnderecoModel->getEnderecoIdUser($this->session->userdata('id_user'));
            $dados_cat ['query'] = $this->CategoriaModel->getCategorias();
            $this->load->view('template_header',$dados_cat);
            $this->load->view('list_endereco', $dados);
            $this->load->view('template_footer');
        }

        public function add(){
            $this->load->library('form_validation');
            $dados_cat ['query'] = $this->CategoriaModel->getCategorias();   
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">
            <strong>Atenção!</strong>','</div>');

            $this->form_validation->set_rules('rua', 'Rua', 'trim|required|min_length[3]');
            $this->form_validation->set_rules('bairro', 'Bairro', 'trim|required');
            $this->form_validation->set_rules('cidade', 'Cidade', 'trim|required');
            $this->form_validation->set_rules('numero', 'Número', 'trim|required');
            $this->form_validation->set_rules('cep', 'CEP', 'trim|required');            
            $this->form_validation->set_rules('uf', 'UF', 'trim|required');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('template_header', $dados_cat);
                $this->load->view('create_endereco');
                $this->load->view('template_footer');
            } else {                
                if ($this->EnderecoModel->inserir()){                                  
                    $this->session->set_flashdata('msg', 'Endereço salvo com sucesso.');                    
                    $this->load->view('template_header', $dados_cat);
                    $this->load->view('create_endereco');
                    $this->load->view('template_footer');                    
                }                
            }

        }

        public function editar($id = null){

            if($id== null){
                redirect(base_url('enderecos'));
            }else{
                $dados['end'] = $this->EnderecoModel->getEnderecoId($id);
                $dados_cat ['query'] = $this->CategoriaModel->getCategorias();

                $this->load->library('form_validation');
                $this->form_validation->set_rules('rua', 'Rua', 'trim|required|min_length[3]');
                $this->form_validation->set_rules('bairro', 'Bairro', 'trim|required');
                $this->form_validation->set_rules('cidade', 'Cidade', 'trim|required');
                $this->form_validation->set_rules('numero', 'Número', 'trim|required');
                $this->form_validation->set_rules('cep', 'CEP', 'trim|required');
                $this->form_validation->set_rules('uf', 'UF', 'trim|required');
                $this->form_validation->set_error_delimiters("<p class='alert alert-danger'>", "</p>");

                if ($this->form_validation->run() == FALSE) {
                    $this->load->view('template_header', $dados_cat);
                    $this->load->view('editar_endereco', $dados);
                    $this->load->view('template_footer');                  
                } else {
                    $this->EnderecoModel->editar($id);
                    $this->session->set_flashdata('msg', 'Endereço editado com sucesso.');
                    redirect(base_url('enderecos'), 'location');
                }
            }
        }

        public function excluir($id = null){
            if($id== null){
                redirect(base_url('enderecos'));
            }else{
                $this->EnderecoModel->excluir($id);
                redirect(base_url('enderecos'),'localtion');
            }
        }
    }