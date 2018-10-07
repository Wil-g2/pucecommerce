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

    public function AcompanhamentoList($id){
        $dados['acompanhamento'] = $this->AcompanharModel->getAcompanhamentoPedidoId($id);
        $dados_cat ['query'] = $this->CategoriaModel->getCategorias();
        $this->load->view('template_header',$dados_cat);
        $this->load->view('pedido/list_acompanhamento',$dados);
        $this->load->view('template_footer');
    }

    public function getEventos(){
        $this->load->library("nuSoap_lib"); //carrega a biblioteca nusoap
        $this->soap_client = new nusoap_client('http://nusoap.herokuapp.com/nuSoapServer?wsdl');  //cria um novo soap client 
        $parameters = array('username' => 'admin', 'password','123');        
        $token = $this->soap_client->call('getToken', $parameters);
        //$parameter = array('token' => $token, 'pedido', $pedido);
        //$this->AcompanharModel->inserir($result);        
        //$result = $this->soap_client->call('getEvent', $parameter);    
        echo $token;
    }
}