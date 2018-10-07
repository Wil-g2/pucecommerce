<?php
defined('BASEPATH') or exit('No direct script access allowed');

class EmailController extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        //carrega o modelo de user
        //$this->load->model("CursoModel"); 
        $this->load->model('UserModel');       
    }

    public function testMail(){
        $this->load->library('email');
        $this->email->initialize();
        //$this->load->library('MY_Email');
        $this->email->from('email@diretriz.net', 'willian');        
        $this->email->to($this->input->post('email'));        
        $this->email->subject('Email Test');
        $this->email->message('Sua senha foi resetada com sucesso!! \n nova senha:123456');
        try{ 
            if ($this->validarLogin($this->input->post('email'))){
                $this->UserModel->updateUserSenha($this->input->post('email')); //update password
                if($this->email->send()){ 
                    $dados = array("msg" => "Sua senha foi enviada para seu E-mail.", "tipo" => 'alert alert-info');
                    $this->load->view('reset_pass/reset',$dados);
                } else{                     
                    show_error($this->email->print_debugger());                            
                }             
            }else{
                $dados = array("msg" => "Forneça um E-mail Válido.", "tipo" => 'alert alert-danger');
                $this->load->view('reset_pass/reset',$dados);
            }     
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }

    public function validarLogin($email){
        return $this->UserModel->getUserEmail($email);         
    }
}