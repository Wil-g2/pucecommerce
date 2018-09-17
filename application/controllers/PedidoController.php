<?php
/**
 * Created by PhpStorm.
 * User: willian
 * Date: 9/12/18
 * Time: 9:46 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class PedidoController extends CI_Controller
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

}