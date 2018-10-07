<?php  defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">   
      <!-- Content Header (Page header) -->
      <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Novo Produto</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Novo Produto</li>
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
    <form method="post" action="<?php base_url('produtoadd');?>"  enctype="multipart/form-data">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="nome">Nome:  (*) </label>
                <input type="text" id="nome" name="nome" class="form-control">
                <?php echo form_error("nome")  ?>
            </div>
            <div class="form-group col-md-6">
                <label for="descricao">Descrição:  (*) </label>
                <input type="text" id="descricao" name="descricao" class="form-control" value="<?php echo set_value('descricao');?>" >
                <?php echo form_error("descricao")  ?>
            </div>
        </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="peso">Peso:  (*) </label>
            <input type="number" id="peso" name="peso" class="form-control" value="<?php echo set_value('peso');?>">
            <?php echo form_error("peso")  ?>
        </div>
        <div class="form-group col-md-4">
            <label for="valor">Valor:  (*) </label>
            <input type="number" id="valor" name="valor" class="form-control" value="<?php echo set_value('valor');?>">
            <?php echo form_error("valor")  ?>
        </div>
        <div class="form-group col-md-4">
            <label for="valor_cmp">Valor Compra:  (*) </label>
            <input type="number" id="valor_cmp" name="valor_cmp" class="form-control" value="<?php echo set_value('valor_cmp');?>">
            <?php echo form_error("valor_cmp")  ?>
        </div>        
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="ativo">Ativo:  (*) </label>
            <input type="checkbox" id="ativo" name="ativo" class="form-control" >
            <?php echo form_error("ativo")  ?>
        </div>
        <div class="form-group col-md-6">
            <label for="fabricante">Fabricante:  (*) </label>
            <input type="text" id="fabricante" name="fabricante" value="<?php echo set_value('fabricante');?>">
            <?php echo form_error("ativo")  ?>
        </div>
        <div class="form-group">
            <label>Categoria: (*) </label>
            <select name="categoria" id="categoria" class="form-control">
                <option>Selecione...</option>
                <?php foreach ($query as $cat): ?>
                    <option value="<?php echo $cat->id ?>"><?php echo $cat->categoria?></option>
                <?php endforeach; ?>
            </select>
            <?php echo form_error("categoria")  ?>
        </div>
        <div class="form-group">
            <label>Foto:</label>
            <input type="file" id="foto" name="foto"/>
        </div>
    </div>
    <div class="form-group">
        <!--<label><em>Todos os campos são obrigatórios.</em></label>-->
        <input type="hidden" name="id" value=""/><br>
        <button type="submit" value="Salvar" class="btn btn-success"> <i class="fa fa-save"></i> Salvar</button>
        <a href="<?php echo base_url('produtos'); ?>" class="btn btn-danger"/>Cancelar <i class="fa fa-warning"></i> </a>
    </div>
</form>
</div>
            </div>
         </div>
     </section>       
</div>
     </section>       
</div>	

