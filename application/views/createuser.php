<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">   
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Novo Usuários</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Novo Usuários</li>
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
            <form method="post" action="<?php base_url('useradd'); ?>" >
                <div class="form-group">
                    <label>Nome: (*) </label>
                    <input type="text" name="login" value="<?php echo set_value('login') ?>"  class="form-control"/>
                </div>
                <div class="form-group">
                    <label>Senha: (*) </label>
                    <input type="password" name="senha" value="<?php echo set_value('senha') ?>"  class="form-control"/>
                </div>
                <div class="form-group">
                    <label>Confirmar Senha: (*) </label>
                    <input type="password" name="passwordconf" value="<?php echo set_value('passwordconf') ?>"  class="form-control"/>
                </div>
                <div class="form-group">
                    <label>E-mail: </label>
                    <input type="text" name="email" value="<?php echo set_value('email') ?>"  class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="Tipo">Tipo</label>            
                    <select name="tipo" id="tipo" class="form-control">
                        <option value="">-- Selecione --</option>
                        <option value="usuario">Usuário</option>                        
                        <option value="administrador">Administrador</option>
                    </select>                        
                </div>
                <div class="form-group">
                    <!--<label><em>Todos os campos são obrigatórios.</em></label>-->
                    <input type="hidden" name="id" value=""/><br>
                    <button type="submit" value="Salvar" class="btn btn-success"> <i class="fa fa-save"></i> Salvar</button>
                    <a href="<?php echo base_url('users'); ?>" class="btn btn-danger">Cancelar <i class="fa fa-warning"></i> </a>
                </div>
            </form>
            </div>
            </div>
         </div>
     </section>       
</div>
