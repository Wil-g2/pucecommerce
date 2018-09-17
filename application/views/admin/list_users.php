<?php
defined('BASEPATH') OR exit ('não tem acesso ao arquivo');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Lista de Usuários</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Lista de Usuários</li>
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
              <h3 class="card-title">Usuários</h3>
              <a href="<?php echo base_url('usersadd'); ?>"  class="btn btn-success"> Novo <i class="fa fa-plus"></i></a>
              <br><br>
              <div class="form-group">
              <input type="text" id="search" onkeyup="search()" placeholder="Pesquisar" class="form-control"/>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="table" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <td>ID</td>
                    <td>Nome</td>
                    <td>Senha</td>
                    <td>Ações</td>
                </tr>
                </thead>
                <tbody>
                <?php foreach($query as $dado): ?>
                <tr>
                    <td><?php echo $dado->id; ?> </td>
                    <td><?php echo $dado->login; ?></td>
                    <td><?php echo $dado->senha; ?></td>
                    <td><a href="useredit/<?php echo $dado->id?>" class="btn btn-info"><i class="fa fa-pencil"></i></a>
                        <button type="button" class="btn btn-warning " data-toggle="modal" data-target="#myModal"><i class="fa fa-trash"></i></button></td><!--<a href="userdel/<?//php echo $dado->id?>" class="btn btn-warning"><i class="fa fa-trash"></i></a></td>-->
                <tr>
                    <?php endforeach; ?>
                </tr>
                </tbody>
                <!--<tfoot>
                <tr>
                  <th>Rendering engine</th>
                  <th>Browser</th>
                  <th>Platform(s)</th>
                  <th>Engine version</th>                 
                </tr>
                </tfoot>-->
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->