<?php  defined('BASEPATH') OR exit('No direct script access allowed'); ?> 
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">   
     <!-- Content Header (Page header) -->
     <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Nova Avaliação</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Avaliar</li>
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
                    <form action="<?php echo base_url('avalaiar')?>" method="post">                                  					
                    <div class="form-group">
                        <div class="input-group mb-12">                            
                            <label for="avaliacao">Avaliação</label>
                            <textarea id="avaliacao" class="form-control" name="avaliacao" required="true" ></textarea>
                        </div>
                    </div>                                 
                    <div class="form-group">
                        <div class="input-group mb-12">       
                            <label for="comentario">Comentário</label>                     
                            <textarea id="comentario" class="form-control" name="comentario" required="true" ></textarea>                            
                        </div>
                    </div>                  
                    <button id="btnAvaliar" class="btn btn-success" style="width: 100%">
                        Avaliar  <i class="fa fa-account"></i>
                    </button>                   
					</form>
                    </form>
</div>
            </div>
         </div>
     </section>       
</div>
     </section>       
</div>
