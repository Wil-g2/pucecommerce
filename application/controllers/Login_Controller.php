<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login_Controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("UserModel"); //carrega model user
    }
    
    public function Logar()  
    {
        $this->output->enable_profiler(true);    
        $dado = $this->UserModel->Logar();
        if (!empty($dado)){
        if ($dado['0']->login != null) {
            $this->session->set_userdata("logado", 1);
            $this->session->set_userdata("tipo", $dado['0']->tipo);
            $this->session->set_userdata("user", $dado['0']->login);
            $this->session->set_userdata("id_user", $dado['0']->id);

            if ($this->session->userdata('tipo')=='administrador'){
                redirect(base_url('admin'), 'refresh');    
            }else{
                redirect(base_url('catalogo'), 'refresh');
            } 
            
        } 
        }else {
            //redirect(base_url('login'), 'refresh');            
            $msg['dados'] = '<p class="alert alert-danger"> E-mail ou senha incorretos! </p>';
            $this->load->view('login',$msg);
        }
    }

    public function logout()
    {
        $this->session->unset_userdata("logado");
        $this->session->unset_userdata("tipo");
        $this->session->unset_userdata("user");
        redirect(base_url());

    }

    public function Login()
    {
        $this->load->view('login');
    }

    public function ResetPass(){
        $this->load->view('reset_pass/reset');
    }

    public function newAccount(){        
        $this->load->view('user/create_user');
    }

    public function createAccount(){                       
        $this->form_validation->set_rules('login', 'Login', 'trim|required|min_length[5]|max_length[20]|is_unique[users.login]');
        $this->form_validation->set_rules('email', 'E-mail', 'trim|required|min_length[15]|is_unique[users.email]');
        $data = array(
            "login" => $this->input->post('login'),            
            'senha' => sha1(123456),
            'senha_conf' => sha1(123456),
            "tipo" => "usuario",
            "email" => $this->input->post('email'),
        );

        if ($this->form_validation->run() == FALSE) {
           $this->form_validation->set_error_delimiters('<p class="alert alert-danger">', '</p>');
           $this->LoadView('user/create_user');
        } else {
            $this->UserModel->inserir($data);
            $dados = array("msg" => "Conta Criada com sucesso sua senha foi enviada para seu e-mail.", "tipo" => 'alert alert-info');
            $this->load->library('email');
            $this->email->initialize();
            $this->email->from('email@diretriz.net', 'willian');
            $this->email->to($this->input->post('email'));
            $this->email->subject('Email Test');
            $this->email->message('Sua conta foi criada com sucesso!! \n senha:123456');
            try{
                $this->email->send();
            }catch(Exception $e){
                show_error($this->email->print_debugger());
            } 
            $this->load->view('user/create_user',$dados);
        }
    }

    public function LoadView($view = 'login',$dados = null , $dados_cat = null){
            $this->load->view($view, $dados);
    }
}