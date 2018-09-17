<?php defined('BASEPATH') or exit('No direct script access allowed'); ?> 
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">   
      <!-- Content Header (Page header) -->
	  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Novo Curso</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Novo Curso</li>
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
<form method="post" action="<?php base_url('cursoadd'); ?>" enctype="multipart/form-data" >
    <div class="form-group">
        <label>Curso: (*) </label>
        <input type="text" name="curso" value="<?php echo set_value('curso'); ?>"  class="form-control"/>
    </div>
    <div class="form-group">
        <label>Descrição: (*)</label>
        <input type="text" name="descricao" value="<?php echo set_value('descricao'); ?>" class="form-control"/>
    </div>
    <div class="form-group">
        <label>Duração: (*)</label>
        <input type="number" name="duracao" value="<?php echo set_value('duracao'); ?>"  class="form-control"/>
    </div>
    <div class="form-group">
        <!--<label><em>Todos os campos são obrigatórios.</em></label>-->
        <input type="hidden" name="id" value=""/><br>
        <button type="submit" value="Salvar" class="btn btn-success"> <i class="fa fa-save"></i> Salvar</button>
        <a href="<?php echo base_url('cursos'); ?>" class="btn btn-danger">Cancelar <i class="fa fa-warning"></i> </a>
	</div>
</form>
</div>
            </div>
         </div>
     </section>       
</div>
     </section>       
</div>
