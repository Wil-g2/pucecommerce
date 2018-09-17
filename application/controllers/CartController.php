<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');

    class CartController extends CI_Controller{  
        
        public function __construct()
        {
            parent::__construct();            
        }
        
        public function add($dados){
            $itens['cart'][] = array(
                "id" => $dados->id, 
                "descricao" => $dados->descricao, 
                "valor" => $dados->valor, 
                "qtd" => $dados->qtd
            ); 
            $_SESSION['cart']= $itens;
            //$this->session->set_userdata($itens);
           // print_r($this->session->userdata('cart'));
        }

       public function remover($item){

       } 

       public function limpar($session){
           //$this->session->unset_userdate('cart');
       }

    }  