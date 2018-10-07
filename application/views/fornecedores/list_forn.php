<?php
/**
 * Created by PhpStorm.
 * User: willian
 * Date: 7/14/18
 * Time: 1:41 PM
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
            <h1>Lista de Fornecedores</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Lista de Fornecedores</li>
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
              <h3 class="card-title">Fornecedores</h3>              
              <a href="<?php echo base_url('fornadd'); ?>"  class="btn btn-success"> Novo <i class="fa fa-plus"></i></a>              
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              
            <?php  echo validation_errors();
                if ($this->session->flashdata('msg')!=null){ ?>                 
                <p class='alert alert-info'><?php echo $this->session->flashdata('msg');?></p>
            <?php } ?>
              <table id="tabela" class="table table-bordered table-hover">
                <thead>
            <tr>
                <td>ID</td>
                <td>Razão Social</td>
                <td>Nome Fantasia</td>
                <td>CNPJ</td>
                <td>Contato</td>
                <td>E-mail</td>
                <td>Açoes</td>
            </tr>
                </thead>
                  <tbody>
            <?php foreach($query as $dado): ?>
            <tr>
                <td><?php echo $dado->id_forn; ?> </td>
                <td><?php echo $dado->razao; ?></td>
                <td><?php echo $dado->fantasia; ?></td>                
                <td><?php echo $dado->cnpj; ?></td>
                <td><?php echo $dado->contato; ?></td>
                <td><?php echo $dado->email; ?></td>                
                <td><a href="fornedit/<?php echo $dado->id_forn?>" class="btn btn-info"><i class="fa fa-pencil"></i></a>
                <button type="button" class="btn btn-warning " data-toggle="modal" data-target="#myModal"><i class="fa fa-trash"></i></button></td>
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
        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Alerta</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>Deseja APAGAR esse Fornecedor?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info" data-dismiss="modal">Não</button>
                        <a href="forndel/<?php echo $dado->id?>" class="btn btn-warning">Sim</i></a>
                    </div>
                </div>        

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
