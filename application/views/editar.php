<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">   
<!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Editar Usuários</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Editar Usuários</li>
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
            if (isset($msg)){?>

            <div class="alert alert-info" ><strong>Info! </strong><?php  echo $msg;?> </div>
            <?php }?>
            <form method="post" action="<?php base_url('useredit'); ?>" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Nome: (*) </label>
                    <input type="text" name="login" value="<?php echo $query->login ?>" required class="form-control"/>
                </div>
                <div class="form-group">
                    <label>Senha: (*) </label>
                    <input type="password" name="senha" value="<?php echo $query->senha ?>" required class="form-control"/>
                </div>
                <div class="form-group">
                    <label>Confirmar Senha: (*) </label>
                    <input type="password" name="passwordconf" value="<?php echo $query->senha_conf ?>"  class="form-control"/>
                </div>
                <div class="form-group">
                    <label>E-mail: </label>
                    <input type="text" name="email" value="<?php  echo $query->email ?>"  class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="Tipo">Tipo</label>
                    <select name="tipo" id="tipo" class="form-control">
                        <option value="">-- Selecione --</option>
                        <option value="usuario" <?php if($query->tipo=='usuario'){echo 'selected';} ?> >Usuário</option>
                        <option value="fornecedor" <?php if($query->tipo=='fornecedor'){echo 'selected';} ?>>Fornecedor</option>
                        <option value="administrador" <?php if($query->tipo=='administrador'){echo 'selected';} ?>>Administrador</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="hidden" name="id" value="<?php echo $query->id ?>"/><br>
                    <button type="submit" value="Aletar"  class="btn btn-success"><i class="fa fa-edit"></i> Editar</button>
                    <a href="<?php echo base_url('users'); ?>" class="btn btn-danger">Cancelar <i class="fa fa-warning"></i></a>
                </div>
            </form>
        </div>
        </div>
        </div>
    </section>        
</div>
