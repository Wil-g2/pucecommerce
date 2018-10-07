<?php
/**
 * Created by VisualCode.
 * User: willian
 * Date: 9/21/18
 * Time: 10:05 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class SacController extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('SacModel');
        $this->load->model('CategoriaModel');
    }

    public function SacList(){
        $dados['sac'] = array();        
        
    }

    public function list(){
        $dados ['sac'] = $this->SacModel->getChamados();
        $this->load('administrador',$dados,'sac/list_sac');
    }


    public function add(){
        $this->form_validation->set_rules('descricao', 'Problema', 'required');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">
            <strong>Atenção!</strong>','</div>');
        if($this->form_validation->run()){
            $this->SacModel->inserir();
            $this->load('usuario',null,'sac/create_sac');
        }else{
            $this->load('usuario',null,'sac/create_sac');
        }     
    }

    public function editar($id = null){
        
        $dados ['query'] = $this->SacModel->getSacId($id); 
        if ($id != null ){            
            $this->form_validation->set_rules('resposta', 'Resposta', 'required');
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">
                <strong>Atenção!</strong>','</div>');                        
                if($this->form_validation->run()){                   
                if ($this->SacModel->editar($id)){
                    $this->session->set_flashdata('msg', 'Salvo com sucesso.');                    
                    $this->session->set_flashdata('tipo', 'info');
                    $this->load('administrador',$dados,'sac/editar_sac');
                }else{                    
                    $this->session->set_flashdata('msg', 'Erro ao salvar alteração.');
                    $this->session->set_flashdata('tipo', 'danger');
                }                 
            }else{
                $this->load('administrador',$dados,'sac/editar_sac');
            }     
        }    
    }

    public function relChamados(){
       $dados['sac'] = $this->SacModel->getSacDataTipo($this->input->post('data_ini'),$this->input->post('data_fim'),$this->input->post('tipo'));
       $this->load('administrador',$dados,'relatorios/rel_sac');
    }

    function load($tipo,$dados = null,$form){
        $dados_cat ['query'] = $this->CategoriaModel->getCategorias();
        if ($this->session->userdata('tipo')=='administrador'){
            $this->load->view('admin/header');
            $this->load->view($form,$dados);
            $this->load->view('admin/footer');
        }else{
            $this->load->view('template_header',$dados_cat);
            $this->load->view($form,$dados);
            $this->load->view('template_footer');
        }
        
    }
}