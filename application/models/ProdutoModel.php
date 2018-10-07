<?php

/**
 * Created by PhpStorm.
 * User: willian
 * Date: 7/14/18
 * Time: 1:47 PM
 */

defined('BASEPATH') or exit('No direct script access allowed');
class ProdutoModel extends CI_Model
{


    public function __construct()
    {

        //parent::__construct();
        $this->load->database();
    }

    //buscar todos usuáriso
    public function getProdutos()
    {
        $this->db->select('p.*,c.categoria');
        $this->db->from('produtos as p');
        $this->db->join('categorias as c', 'p.categoria = c.id');
        $query = $this->db->get();
        return $query->result();
    }

    public function inserir()
    {
        $data['dadosArquivo'] = $this->upload->data();
        $data = array(
            'nome' => $this->input->post('nome'),
            'descricao' => $this->input->post('descricao'),
            'peso' => $this->input->post('peso'),
            'valor' => $this->input->post('valor'),
            'valor_cmp' => $this->input->post('valor_cmp'),
            'ativo' => $this->input->post('ativo'),
            'fabricante' => $this->input->post('fabricante'),
            'categoria' => $this->input->post('categoria'),
            'data_inc' => $this->input->post('data_inc'),
            'foto' =>$arquivoPath = 'uploads/'.$data['dadosArquivo']['file_name']
        );

        if ($this->security->xss_clean($data, TRUE) === FALSE){
            return false; 
        }else{
            return $this->db->insert('produtos', $data);
        }
    }

    public function getProdutosId($id = null)
    {
        if ($id != null) {
            $this->db->where('id', $id);
            $this->db->limit(1);
            $query = $this->db->get('produtos');
            return $query->row();
        }

    }

    public function editar($id = null)
    {

        if ($id != null) {
            $data = array(
                'nome' => $this->input->post('nome'),
                'descricao' => $this->input->post('descricao'),
                'peso' => $this->input->post('peso'),
                'valor' => $this->input->post('valor'),
                'valor_cmp' => $this->input->post('valor_cmp'),
                'ativo' => $this->input->post('ativo'),
                'fabricante' => $this->input->post('fabricante'),
                'categoria' => $this->input->post('categoria'),                
                'foto' =>$arquivoPath = 'uploads/'.$data['dadosArquivo']['file_name']
            );

            $this->db->update('produtos', $data, array('id' => $id));
        }
    }


    public function excluir($id = null)
    {

        if ($id != null) {
            $this->db->where('id', $id);
            $this->db->delete('produtos', array('id' => $id));
        }
    }

    public function getProdutosCategoria($id_categoria = null)
    {
        if ($id_categoria != null) {
            $this->db->select('p.*,c.categoria');
            $this->db->from('produtos as p');
            $this->db->join('categorias as c', 'p.categoria = c.id');
            $this->db->where('categoria', $id_categoria);
            $query = $this->db->get();
            return $query->result();
        }

    }
}