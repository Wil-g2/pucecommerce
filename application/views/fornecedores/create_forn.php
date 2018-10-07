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
                        <li class="breadcrumb-item active">Novo Fornecedor</li>
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
                        <form method="post" action="<?php base_url('fornadd');?>">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Razão Social: (*) </label>
                                    <input type="text" name="razao" value="<?php echo set_value('razao'); ?>" class="form-control"/>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Nome Fantasia:</label>
                                    <input type="text" id="fantasia" name="fantasia" value="<?php echo set_value('fantasia');?>" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label>Contato (*): </label>
                                    <input type="text" id="contato" name="contato" value="<?php echo set_value('contato'); ?>" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>CNPJ: (*) </label>
                                    <input type="text" id="cnpj" name="cnpj" value="<?php echo set_value('cnpj'); ?>" class="form-control">
                                </div>                                
                            </div>
                            <div class="form-row">                       
                        <div class="form-group col-md-5">
                            <label>Rua: (*)</label>
                            <input type="text" id="rua" name="rua" value="<?php echo set_value('rua'); ?>" class="form-control"/>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Número: (*)</label>
                            <input type="text" id="numero" name="numero" value="<?php echo set_value('numero'); ?>" class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Bairro: (*)</label>
                            <input type="text" id="bairro" name="bairro" value="<?php echo set_value('bairro'); ?>" class="form-control">
                        </div>                       
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Cep: (*)</label>
                            <input type="text" id="cep" name="cep" value="<?php echo set_value('cep'); ?>" class="form-control"/>
                        </div>
                        <div class="form-group col-md-2">
                            <label>Cidade: (*)</label>
                            <input type="text" id="cidade" name="cidade" value="<?php echo set_value('cidade'); ?>" class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                            <label>UF: (*)</label>
                            <select name="estado" id="estado" class="form-control">
                                <option>--Selecione um UF--</option>
                                <option value="mg" <?php if(set_value('uf')=="mg"){ echo "selected"; } ?> >MG</option>
                                <option value="rj" <?php if(set_value('uf')=="rj"){ echo "selected"; } ?> >RJ</option>
                                <option value="sp" <?php if(set_value('uf')=="sp"){ echo "selected"; } ?> >SP</option>
                            </select>
                        </div>
                    </div>
                            <div class="form-row">
                                <div class="from-group col-md-6">
                                    <label>E-mail:</label>
                                    <input type="email" name="email" value="<?php echo set_value('email'); ?>" class="form-control"/>
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Telefone:</label>
                                    <input type="tel" name="telefone" id="telefone" value="<?php echo set_value('telefone');  ?>" class="form-control" data-mask="(99) 99999-9999">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Celular: (*)</label>
                                    <input type="tel" name="celular" id="celular" value="<?php echo set_value('celular');  ?>" class="form-control" data-mask="(99) 99999-9999">
                                </div>
                            </div>
                            <div class="form-group">
                                <a href="<?php echo base_url('fornecedores'); ?>" class="btn btn-info">Lista <i class="fa fa-list"></i> </a>
                                <button type="submit" value="Salvar" class="btn btn-success"> <i class="fa fa-save"></i> Salvar</button>
                                <a href="<?php echo base_url('fornecedores'); ?>" class="btn btn-danger">Cancelar <i class="fa fa-warning"></i> </a>

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
        $('#cnpj').inputmask('99.999.999/9999-99');
    });

</script> 
<script type="text/javascript" src="<?php echo base_url()."assets/dist/js/viacep.js"?>"></script>