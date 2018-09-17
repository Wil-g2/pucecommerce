<?php  defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Novo Endereço</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Novo Endereço</li>
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
                    if (isset($msg)){ ?>
                    <div class="alert alert-info" role="alert"><strong>Info! </strong><?php  print_r($msg);?> </div>                       
                <?php }
                    //$this->output->enable_profiler(TRUE);                    
                ?>
                <form method="post" action="<?php echo base_url('enderecoadd');?>" id="form">
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label>Identeficação: </label>
                            <input type="text" id="identificacao" name="identificacao" value="<?php echo set_value('identificacao'); ?>" class="form-control"/>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Rua: (*)</label>
                            <input type="text" id="rua" name="rua" value="<?php echo set_value('rua'); ?>" class="form-control"/>
                        </div>
                        <div class="form-group col-md-2">
                            <label>Número: (*)</label>
                            <input type="text" id="numero" name="numero" value="<?php echo set_value('numero'); ?>" class="form-control">
                        </div>
                        <div class="form-group col-md-2">
                            <label>Bairro: (*)</label>
                            <input type="text" id="bairro" name="bairro" value="<?php echo set_value('bairro'); ?>" class="form-control">
                        </div>
                        <div class="form-group col-md-2">
                            <label>Complemento:</label>
                            <input type="text" id="complemento" name="complemento" value="<?php echo set_value('complemento'); ?>" class="form-control">
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
                    <div class="form-group">                        
                        <input type="hidden" name="id" value=""/><br>
                        <a href="<?php echo base_url('users'); ?>" class="btn btn-info">Lista <i class="fa fa-list"></i> </a>
                        <button type="submit" value="Salvar" class="btn btn-success"> <i class="fa fa-save"></i> Salvar</button>
                        <a href="<?php echo base_url('users'); ?>" class="btn btn-danger">Cancelar <i class="fa fa-warning"></i> </a>
                        <button type="reset" id="reset" name="reset" class="btn btn-default" onclick="resetForm('form')">Novo <i class="fa fa-newspaper-o"></i></button>
                    </div>
                </form>
                </div>
            </div>
         </div>
     </section>       
</div>
<script type="text/javascript" src="<?php echo base_url()."assets/dist/js/viacep.js"?>"></script>
<script type="text/javascript" src="<?php echo base_url()."assets/dist/js/util.js"?>"></script>