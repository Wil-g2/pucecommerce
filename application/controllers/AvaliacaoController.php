<?php
/**
 * Created by VisualCode.
 * User: willian
 * Date: 9/30/18
 * Time: 3:46 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class AvaliacaoController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('AvaliacaoModel');
        $this->load->model('CategoriaModel');
    }

    public function AvaliacaoList(){
        $dados['avaliacoes'] = $this->AvaliacaoModel->getAvaliacoes();
        $dados_cat ['query'] = $this->CategoriaModel->getCategorias();
        $this->load->view('template_header',$dados_cat);
        $this->load->view('pedido/',$dados);
        $this->load->view('template_footer');
    }

    public function add(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('data', 'Data', 'trim|required');
        $this->form_validation->set_rules('avaliacao', 'Avaliação', 'trim|required|min_length[10]|max_length[255]');
        $this->form_validation->set_rules('comentario', 'Comentário', 'trim|required|min_length[10]|max_length[255]');
        $this->form_validation->set_error_delimiters("<p class='alert alert-danger'>", "</p>");
        
        if ($this->form_validation->run() == FALSE) {
            $dados_cat ['query'] = $this->CategoriaModel->getCategorias();
            $this->load->view('template_header', $dados_cat);               
            $this->load->view('avaliacao/create_avaliacao');
            $this->load->view('template_footer');               
        } else {
            $this->CursoModel->inserir();
            redirect(base_url('avaliacoes'));
        }
    }

}