<?php

defined('BASEPATH') or exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    public function __construct()
    {

        parent::__construct();
        $this->load->model("CategoriaModel");
        $logado = $this->session->userdata('logado');
        if ($logado != 1) {
            redirect(base_url('login'));
        }
    }

    public function LoadView($view = 'list_users',$dados = null , $dados_cat = null){
        if ($this->session->userdata('tipo')=='administrador'){
            $this->load->view('admin/header');               
            $this->load->view($view, $dados);
            $this->load->view('admin/footer');                   
        }else{
            $this->load->view('template_header',$dados_cat);               
            $this->load->view($view, $dados);
            $this->load->view('template_footer');               
        }
    }    
}