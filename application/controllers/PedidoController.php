<?php
/**
 * Created by PhpStorm.
 * User: willian
 * Date: 9/12/18
 * Time: 9:46 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class PedidoController extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('PedidoModel');
        $this->load->model('CategoriaModel');
    }

    public function pedidosList(){
        $dados['ped'] = $this->PedidoModel->getPedidoIdUser($this->session->userdata('id_user'));
        $dados_cat ['query'] = $this->CategoriaModel->getCategorias();
        $this->load->view('template_header',$dados_cat);
        $this->load->view('pedido/list_pedido',$dados);
        $this->load->view('template_footer');
    }

    public function relPedidos(){    
        $this->load->library('form_validation');
        $this->form_validation->set_rules('date_ini', 'Curso', 'trim|required');        
        $this->form_validation->set_error_delimiters("<p class='alert alert-danger'>", "</p>");
        
        if ($this->form_validation->run() == FALSE) {                        
            $this->loadRelPedidos();
        } else {
            $dados['ped']  = $this->PedidoModel->getPedidoPeriodo();
            $this->loadRelPedidos($dados);
        }
    }

    public function loadRelPedidos($dados = null){
        $this->load->view('admin/header');
        $this->load->view('relatorios/rel_pedidos',$dados);
        $this->load->view('admin/footer');
    }
}