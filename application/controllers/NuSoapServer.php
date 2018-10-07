<?php
/**
 * Created by PhpStorm.
 * User: willian
 * Date: 9/19/18
 * Time: 7:13 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class NuSoapServer extends CI_Controller
{
    
    function __construct() {
        parent::__construct();
        $this->load->library("nuSoap_lib"); //carrega a biblioteca nusoap
        ob_end_clean();
          
    }


    public function index()
    {
        $op = array();
        $this->nusoap_server = new soap_server();  //cria um novo server soap

        $this->nusoap_server->configureWSDL( "PUCecommerce", base_url() . "nuSoapServer?wsdl", base_url() . "nuSoapServer" );            
        $this->nusoap_server->soap_defencoding = 'utf-8';
        /*register precess */
        $this->nusoap_server->register('getToken', array('UserName' => 'xsd:string', 'Password' => 'xsd:string'), array('result' => 'xsd:string'), base_url().'nuSoapServer', base_url().'nuSoapServer#getUsers', 'rpc', 'encoded', 'Obter token de acesso.');


        function getToken($username, $password) {
            if ($username == 'admin' && $password=='pucminas') {
                return md5('21325656565656');
            }
        }

        /*register precess */
        $this->nusoap_server->register('getSales', array('token'=> 'xsd:string'), array('idpedido' => 'xsd:integer', 'data' => 'xsd:string', 'total' => 'xsd:double', 'user_pedido' => 'xsd:integer'), base_url().'nuSoapServer', base_url().'nuSoapServer#getSales', 'rpc', 'encoded', 'Retorna todos as vendas do dia.');
       
        function getSales($token) {
            if ($token = md5('21325656565656')){
                $dados = array(
                "idpedido" => 1,
                "data" => "10/09/2018",
                "total" => 100.00,
                "user_pedido" => 1
                );            

                return $dados;
            }    
        }

        /*register precess */
        $this->nusoap_server->register('getDelivery', array('token'=> 'xsd:string'), array('idpedido' => 'xsd:integer', 'data' => 'xsd:string', 'evento' => 'xsd:string'), base_url().'nuSoapServer', base_url().'nuSoapServer#getDelivery', 'rpc', 'encoded', 'Retorna todos eventos de entrega do dia.');
      
        function getDelivery($token) {
            if ($token = md5('21325656565656')){
                $dados = array(
                "idpedido" => 1,
                "data" => "10/09/2018",
                "evento" => "Em separação"
                );            

                return $dados;
            }    
        }

        $this->nusoap_server->register('getEvaluationProduct', array('token'=> 'xsd:string'), array('id_avaliacao' => 'xsd:integer','data' => 'xsd:string','avaliacao' => 'xsd:string' ,'comentario' => 'xsd:string','id_user' => 'xsd:integer'),base_url().'nuSoapServer',base_url().'nuSoapServer#getEvaluationProduct','rpc','encoded', 'Retorna avaliações dos produtos avaliados no dia.');

        function getEvaluationProduct($token) {                   
            if ($token = md5('21325656565656')){
                $dados = array(
                    "id_avaliacao" => 1,
                    "data" => "01/10/2018",
                    "avaliacao" => "Produto ótimo excelente qualidade",
                    "comentario" => "Teste de comentário",
                    "id_user" => 1
                );

                $dados = array(
                    "id_avaliacao" => 1,
                    "data" => "01/10/2018",
                    "avaliacao" => "Produto ótimo excelente qualidade",
                    "comentario" => "Teste de comentário",
                    "id_user" => 1
                );

                return $dados;
            }    
        }


        $this->nusoap_server->service(file_get_contents("php://input")); //shows the standard info about service
    }

}