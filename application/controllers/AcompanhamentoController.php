<?php
/**
 * Created by VisualCode.
 * User: willian
 * Date: 9/14/18
 * Time: 3:46 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class AcompanhamentoController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('AcompanharModel');
        $this->load->model('CategoriaModel');
    }

    public function AcompanhamentoList(){
        $dados['acompanhamento'] = array();//$this->AcompanharModel->getAcompanhamentoPedidoId(1);
        $dados_cat ['query'] = $this->CategoriaModel->getCategorias();
        $this->load->view('template_header',$dados_cat);
        $this->load->view('pedido/list_acompanhamento',$dados);
        $this->load->view('template_footer');
    }

}