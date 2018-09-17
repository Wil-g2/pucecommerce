<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">   
      <!-- Content Header (Page header) -->
	  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Editar Curso</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Editar Curso</li>
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
		
			<form method="post" action="<?php base_url('cursoedit'); ?>">
				<div class="form-group">
					<label>Curso: (*) </label>
					<input type="text" name="curso" value="<?php echo $query->curso ?>"  class="form-control"/>
				</div>
				<div class="form-group">
					<label>Descrição: (*) </label>
					<input type="text" name="descricao" value="<?php echo $query->descricao ?>"  class="form-control"/>
				</div>
				<div class="form-group">
					<label>Duração: (*) </label>
					<input type="number" name="duracao" value="<?php echo $query->duracao ?>"  class="form-control"/>
				</div>
				<div class="form-group">		
					<input type="hidden" name="id" value="<?php echo $query->id ?>"/><br>		
					<button type="submit" value="Aletar"  class="btn btn-success"><i class="fa fa-edit"></i> Editar</button>
					<a href="<?php echo base_url('cursos'); ?>" class="btn btn-danger">Cancelar <i class="fa fa-warning"></i></a>
				</div>
			</form>
			</div>
            </div>
         </div>
     </section>       
</div>


