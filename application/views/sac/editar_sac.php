<?php  defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
     <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Editar Chamado</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Editar Chamado</li>
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
                if($this->session->flashdata('msg')!= null) { ?> 
                <p class='alert alert-<?php echo $this->session->flashdata('tipo'); ?>'><?php echo $this->session->flashdata('msg'); ?> </p> <?php }?>            

                <form method="post" action="<?php base_url('sacadd');?>">
                    <div class="form-row">
                    <div class="form-group col-md-12">
                            <label>Tipo: (*)</label>
                            <select name="tipo" id="tipo" class="form-control" >
                                <option>--Selecione --</option>
                                <option value="duvida" <?php if($query->tipo=="duvida"){ echo "selected"; } ?> >Dúvida</option>
                                <option value="problema" <?php if($query->tipo=="problema"){ echo "selected"; } ?> >Problema</option>
                                <option value="reclamacao" <?php if($query->tipo=="reclamacao"){ echo "selected"; } ?> >Reclamação</option>
                            </select>
                        </div>
                     </div>   
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>Descrição: (*)</label>
                                <textarea id="descricao" rows="3" name="descricao" class="form-control"><?php echo $query->descricao; ?></textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>Status: (*)</label>
                                <select name="status" id="status" class="form-control">
                                <option>--Selecione --</option>
                                <option value="aberto" <?php if($query->status=="aberto"){ echo "selected"; } ?> >Aberto</option>
                                <option value="andamento" <?php if($query->status=="andamento"){ echo "selected"; } ?> >Andamento</option>
                                <option value="finalizado" <?php if($query->status=="finalizado"){ echo "selected"; } ?> >Finalizado</option>
                            </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>Resposta:</label>
                                <textarea id="resposta" name="resposta" rows="3"  class="form-control"> <?php echo $query->resposta; ?></textarea>
                            </div>
                        </div>
                    <div class="form-group">
                        <a href="<?php echo base_url('chamados'); ?>" class="btn btn-info">Lista <i class="fa fa-list"></i> </a>
                        <button type="submit" value="Salvar" class="btn btn-success"> <i class="fa fa-save"></i> Salvar</button>
                        <a href="<?php echo base_url('chamados'); ?>" class="btn btn-danger">Cancelar <i class="fa fa-warning"></i> </a>
                    </div>
                </form>
                </div>
            </div>
         </div>
     </section>       
</div>