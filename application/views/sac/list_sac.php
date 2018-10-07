<?php
/**
 * Created by PhpStorm.
 * User: willian
 * Date: 9/12/18
 * Time: 9:45 PM
 */
defined('BASEPATH') OR exit ('não tem acesso ao arquivo');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Lista de Chamados (SAC)</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Lista de Chamados (SAC)</li>
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
              <h3 class="card-title">SAC</h3>              
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="tabela" class="table table-bordered table-hover">
                <thead>
            <tr>
                <td>Data</td>
                <td>Tipo</td>
                <td>Descrição</td>
                <td>Resposta</td>
                <td>Status</td>
                <td>Ações</td>                
            </tr>
                </thead>
                  <tbody>
            <?php foreach($sac as $dado): ?>
            <tr>                
                <td><?php $date = new DateTime($dado->data); echo $date->format('d/m/Y'); ?></td>
                <td><?php echo $dado->tipo?></td>
                <td><?php echo $dado->descricao ?></td>
                <td><?php echo$dado->resposta ?></td>
                <td><?php echo$dado->status ?></td>                
                <td><a class="btn btn-info" href="<?php echo base_url('sacedit/'.$dado->id_sac); ?>">Responder <i class="fa fa-pencil"></i> </a></td>
                <?php endforeach; ?>
            </tr>
            </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#tabela').dataTable({
            language: {
                url: '<?php echo base_url() . "assets/plugins/datatables/Portuguese-Brasil.json"; ?>'
            }
        });
    });
</script>
