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
            <h1>Lista de Endereços</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Lista de Endereço</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <section class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Endereços</h3>
              <a href="<?php echo base_url('enderecoadd'); ?>"  class="btn btn-success"> Novo <i class="fa fa-plus"></i></a>          
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="tabela" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <td>ID</td>
                    <td>Identificação</td>
                </tr>
                </thead>
                <tbody>
                <?php if (empty($query)){ ?>
                        <td id="isEmpty" colspan="5" class="bg-info">Nenhum endereço! </>               
                <?php } else{?>
                <?php foreach($query as $dado): ?>
                <tr>                    
                    <td><?php echo $dado->idendereco; ?> </td>
                    <td><?php echo $dado->identificacao; ?></td>                   
                    <td><a href="<?php echo base_url('enderecoedit/'.$dado->idendereco); ?>" class="btn btn-info"><i class="fa fa-pencil"></i></a>
                        <button type="button" class="btn btn-warning " data-toggle="modal" data-target="#myModal"><i class="fa fa-trash"></i></button></td>
                    <?php endforeach;} ?>
                </tr>
                </tbody>
                <!--<tfoot>
                <tr>
                    <td>ID</td>
                    <td>Nome</td>
                    <td>Senha</td>
                    <td>Ações</td>
                </tr>
                </tfoot>-->
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </section>
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
                        <p>Deseja APAGAR esse Endereço?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info" data-dismiss="modal">Não</button>
                        <a href="enderecodel/<?php echo $dado->idendereco?>" class="btn btn-warning">Sim</i></a>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </section>
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
