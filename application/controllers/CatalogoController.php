<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CatalogoController extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('CategoriaModel');
        $this->load->model('CatalogoModel');
        error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
    }

    public function produtos($id=null){
        //$this->output->enable_profiler(TRUE);
        $dados ['query'] = $this->CategoriaModel->getCategorias();
        $dados ['produtos'] = $this->CatalogoModel->getCatalogoId($id);
        $this->load->view('template_header', $dados);
        $this->load->view('catalogo/list_produtos',$dados);
        $this->load->view('template_footer');
    }

    public function list(){
        $dados ['query'] = $this->CategoriaModel->getCategorias();
        $dados ['produtos'] = $this->CatalogoModel->getCatalogos();
        $this->load->view('template_header', $dados);
        $this->load->view('catalogo/list_produtos',$dados);
        $this->load->view('template_footer');
        
    }

    public function add($id){
        $dados = $this->CatalogoModel->getCartId($id);
        $itens = array(
            "id" => $dados->id,
            "descricao" => $dados->descricao,
            "valor" => $dados->valor,
            "qtd" => 1
        );
        if (!$this->existeCarrinho($id)){
            $_SESSION['cart'][]=$itens;
        }        
        $this->finalizarPedido();        

    }

    public function existeCarrinho($id = null){
        //$dados = $this->session->userdata('cart');
        //print_r($_SESSION['cart']);
        if (isset($_SESSION['cart']) && count($_SESSION['cart'])>0){
          foreach ($_SESSION['cart'] as $dado) :
            if($dado['id'] == $id) {
                   return true;
               }
           endforeach;
        }
        return false;
    }

    public function finalizarPedido(){
        //$dados ['query'] = $this->CategoriaModel->getCategorias();
        //$dados ['cart'] = $_SESSION['cart'];
        //$dados ['total'] = $this->getTotal();   
        $dados ['frete'] = $this->getValorFrete();    
        ///$this->load->view('template_header', $dados);               
       // $this->load->view('catalogo/carrinho', $dados);
       // $this->load->view('template_footer');  
    }

    public function removerCarrinho($id = null){        
        if (isset($_SESSION['cart']) && count($_SESSION['cart'])>0){
            foreach ($_SESSION['cart'] as $i => $dado) :
              if($dado['id'] == $id) {
                unset($_SESSION['cart'][$i]);        
             }
             endforeach;
          }          
        $dados ['query'] = $this->CategoriaModel->getCategorias(); 
        $dados ['cart'] = $_SESSION['cart'];
        $this->finalizarPedido();        
    }

    /**
     * @return double
     */
    public function getTotal(){
        $total =.0;
        if (isset($_SESSION['cart']) && count($_SESSION['cart'])>0){
            foreach ($_SESSION['cart'] as $i => $dado) :
                $total+=($dado['valor']*$dado['qtd']);
            endforeach;
        }
        return $total;
    }

    public function subtrair($id){
        if (isset($_SESSION['cart']) && count($_SESSION['cart'])>0){
            foreach ($_SESSION['cart'] as $i => $dado) :
                if($dado['id'] == $id) {
                    if ($dado['qtd']>0){
                        $_SESSION['cart'][$i]['qtd'] -=1;
                    }        
                    if($_SESSION['cart'][$i]['qtd']<=0){
                        $this->removerCarrinho($id);
                    }           
                }
            endforeach;
        }
        $dados ['query'] = $this->CategoriaModel->getCategorias();
        $dados ['cart'] = $_SESSION['cart'];
        $this->finalizarPedido();
    }

    public function aumentar($id){
        if (isset($_SESSION['cart']) && count($_SESSION['cart'])>0){
            foreach ($_SESSION['cart'] as $i => $dado) :
                if($dado['id'] == $id) {
                    $_SESSION['cart'][$i]['qtd'] +=1;
                }
            endforeach;
        }
        $dados ['query'] = $this->CategoriaModel->getCategorias();
        $dados ['cart'] = $_SESSION['cart'];
        $this->finalizarPedido();
    }

   /**
     * @author Willian Gaudencio de Rezende
     * @name Integração API correios.
     */
    public function calcularFrete($cep_dest, $tipo){
        if ($tipo=='pac'){
            $tipo='04510';
        }else{  
            $tipo='04014';
        }    
        $cep_orig = '37048250';
        $url = "http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx?";
        $url .="nCdEmpresa=";
        $url .="&sDsSenha=";        
        $url .="&sCepOrigem=".$cep_orig;
        $url .="&sCepDestino=".$cep_dest; //$this->input->post('cep_dest');
        $url .="&nVlPeso=1";
        $url .="&nCdFormato=1";
        $url .="&nVlComprimento=20";// . $comprimento;
        $url .="&nVlAltura=20";// .$altura;
        $url .="&nVlLargura=20";// .$largura;
        $url .="&sCdMaoPropria=n";
        $url .="&nVlValorDeclarado=0";
        $url .="&sCdAvisoRecebimento=n";   
        $url .="&nCdServico=".$tipo; //$this->input->post('tipo');     
        $url .="&nVlDiametro=0";
        $url .="&StrRetorno=xml&nIndicaCalculo=3";   
        $xml = simplexml_load_file($url);
        //echo $url . "<br>";        
        return $xml;
        //return $xml;
}
//$valor = (calcular('70002900','04547000',1,0,'04510'));
//echo "Valor do frete:" . $valor->cServico->Valor ."<br>";
//echo "Prazo de Entrega:" . $valor->cServico->PrazoEntrega . " Dias" ;
    
public function getValorFrete(){
    $data = null;
    if ($this->input->post('cep_dest')!= null){
        $data = $this->calcularFrete($this->input->post('cep_dest'),$this->input->post('tipo'));
    }    
    //return $data; 
    $dados ['query'] = $this->CategoriaModel->getCategorias();
    $dados ['cart'] = $_SESSION['cart'];
    $dados ['total'] = $this->getTotal();   
    $dados ['frete'] = $data;    
    $this->load->view('template_header', $dados);               
    $this->load->view('catalogo/carrinho', $dados);
    $this->load->view('template_footer');  
}

public function encerrarCompra(){
        $this->load->model('PedidoModel');
        $this->PedidoModel->inserir($this->getTotal());
        redirect('pedidos');
}

}