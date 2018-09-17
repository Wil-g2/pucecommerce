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
            <h1>Lista de Pedidos</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Lista de Pedidos</li>
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
              <h3 class="card-title">Pedidos</h3>              
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="tabela" class="table table-bordered table-hover">
                <thead>
            <tr>
                <td>ID</td>
                <td>Data Pedido</td>
                <td>Valor</td>
                <td>Ações</td>
            </tr>
                </thead>
                  <tbody>
            <?php foreach($ped as $dado): ?>
            <tr>
                <td><?php echo $dado->idpedido; ?> </td>
                <td><?php $date = new DateTime($dado->data); echo $date->format('d/m/Y'); ?></td>
                <td><?php echo number_format($dado->total,2,',','.'); ?></td>
                <td><a href="<?php echo base_url('acompanhar'); ?>">Acompanhar</a></td>
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
