<?php
/**
 * Created by PhpStorm.
 * User: willian
 * Date: 9/14/18
 * Time: 11:33 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Nova Pessoa</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Nova Pessoa</li>
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
                        <?php echo validation_errors();
                            if ($this->session->flashdata('msg')!=null){ ?>                 
                        <p class='alert alert-info'><?php echo $this->session->flashdata('msg');?></p>
                        <?php } ?>
                        <form method="post" action="<?php base_url('pessoaadd');?>">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Nome: (*) </label>
                                    <input type="text" name="nome" value="<?php echo $query->nome; ?>" class="form-control"/>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Sobrenome: (*) </label>
                                    <input type="text" id="sobrenome" name="sobrenome" value="<?php echo $query->sobrenome;?>" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-row">

                                <div class="form-group col-md-2">
                                    <label>RG: </label>
                                    <input type="text" id="rg" name="rg" value="<?php echo $query->rg; ?>" class="form-control">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>CPF: (*) </label>
                                    <input type="text" id="cpf" name="cpf" value="<?php echo $query->cpf; ?>" class="form-control">
                                </div>


                                <div class="form-group col-md-6">
                                    <label>Data Nascimento: (*) </label>
                                    <?php
                                    date_default_timezone_set('America/Sao_Paulo');
                                    $data_nascimento = New DateTime($query->nascimento);
                                    ?>
                                    <input type="date" name="nascimento" id="data_nascimento" value="<?php echo $data_nascimento->format('Y-m-d'); ?>" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="from-group col-md-6">
                                    <label>E-mail:</label>
                                    <input type="email" name="email" value="<?php echo $query->email; ?>" class="form-control"/>
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Telefone:</label>
                                    <input type="tel" name="telefone" id="telefone" value="<?php echo $query->telefone; ?>" class="form-control" data-mask="(99) 99999-9999">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Celular: (*)</label>
                                    <input type="tel" name="celular" id="celular" value="<?php echo $query->celular; ?>" class="form-control" data-mask="(99) 99999-9999">
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success"> <i class="fa fa-save"></i> Editar</button>
                                <a href="<?php echo base_url('useredit').'/'.$this->session->userdata('id_user'); ?>" class="btn btn-danger">Cancelar <i class="fa fa-warning"></i> </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </section>
</div>
</section>
</div>
<script src="<?php echo base_url() . "assets/plugins/input-mask/jquery.inputmask.js" ?>"></script>
<script> 
    $(document).ready(function(){  
        $('#celular').inputmask('(999) 99999-9999');
        $('#telefone').inputmask('(999) 99999-9999');
        $('#cpf').inputmask('999.999.999-99');
    });

</script> 