<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: willian
 * Date: 7/1/18
 * Time: 4:59 PM
 */?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">   
     <!-- Content Header (Page header) -->
     <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Editar Aluno</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Editar Aluno</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
   <!-- Main content -->
   <section class="content">
      <div class="row">
        <div class="col-12">
            <div class="card">
            <div class="card-header">            
            <?php echo validation_errors(); ?>
            <form method="post" action="<?php base_url('alunoedit');?>">
                <div class="row">
                    <div class="col">
                        <label>Nome: (*) </label>
                        <input type="text" name="nome" value="<?php echo $query->nome?>" class="form-control"/>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Rua: (*) </label>
                        <input type="text" id="rua" name="rua" value="<?php echo $query->rua?>" class="form-control"/>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Número: (*) </label>
                        <input type="text" id="numero" name="numero" value="<?php echo $query->numero?>" class="form-control">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Bairro: (*) </label>
                        <input type="text" id="bairro" name="bairro" value="<?php echo $query->bairro?>" class="form-control">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Cep: (*) </label>
                        <input type="text" id="cep" name="cep" value="<?php echo $query->cep?>" class="form-control"/>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Cidade: (*) </label>
                        <input type="text" id="cidade" name="cidade" value="<?php echo $query->cidade?>" class="form-control">
                    </div>
                    <div class="form-group col-md-4">
                        <label>UF: (*) </label>
                        <select id="uf" name="uf" required class="form-control">
                            <option>--Selecione um UF--</option>
                            <option value="mg" <?php if($query->uf == 'mg'){ echo 'selected';} ?>>MG</option>
                            <option value="rj" <?php if($query->uf == 'rj'){ echo 'selected';} ?>>RJ</option>
                            <option value="sp" <?php if($query->uf == 'sp'){ echo 'selected';} ?>>SP</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Data Nascimento: (*) </label>
                    <?php
                    date_default_timezone_set('America/Sao_Paulo');
                    $data_nascimento = New DateTime($query->data_nascimento);
                    $data_pagamento = New DateTime($query->data_pagamento);
                        ?>
                        <input type="date" name="data_nascimento" id="data_nascimento" value="<?php echo $data_nascimento->format('Y-m-d'); ?>" class="form-control"/>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Identidade:</label>
                        <input type="text" name="identidade" value="<?php echo $query->identidade ?>" class="form-control">
                    </div>
                    <div class="form-group col-md-4">
                        <label>CPF: (*) </label>
                        <input type="text" name="cpf" value="<?php echo $query->cpf?>" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label>Responsável:</label>
                        <input type="text" name="responsavel" value="<?php echo $query->responsavel ?>" class="form-control"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label>E-mail:</label>
                        <input type="email" name="email" value="<?php echo $query->email ?>" class="form-control"/>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Data Pagamento: (*) </label>
                        <input type="date" name="data_pagamento" value="<?php echo $data_nascimento->format('Y-m-d'); ?>" class="form-control"/>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Telefone:</label>
                        <input type="tel" name="telefone" value="<?php echo $query->telefone ?>" class="form-control" data-mask="(99) 99999-9999">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Celular:</label>
                        <input type="tel" name="celular" value="<?php echo $query->celular ?>" class="form-control" data-mask="(99) 99999-9999">
                    </div>
                </div>
                <div class="form-group">
                    <input type="hidden" name="id" value="<?php echo $query->id ?>"/><br>
                    <button type="submit" value="Editar" class="btn btn-success"> <i class="fa fa-save"></i> Editar</button>
                    <a href="<?php echo base_url('alunos'); ?>" class="btn btn-danger">Cancelar <i class="fa fa-warning"></i> </a>
                </div>
            </form>
            </div>
            </div>
         </div>
     </section>       
</div>
     </section>       
</div>	     
<script type="text/javascript" src="<?php echo base_url()."assets/dist/js/viacep.js"?>"></script>