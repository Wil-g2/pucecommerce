<?php
defined('BASEPATH') or exit('não tem acesso ao arquivo');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Acompanhamento</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Acompanhamento</li>
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
              <h3 class="card-title">Acompanhamento</h3>              
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="tabela" class="table table-bordered table-hover">
                <thead>
            <tr>
                <td>#ID</td>
                <td>Data</td>
                <td>Evento</td>                
            </tr>
                </thead>
                  <tbody>
            <?php foreach ($acompanhamento as $dado) :?>            
            <tr>
                <?php if (empty($acompanhamento)){ ?>
                    <td id="isEmpty" colspan="5" class="bg-info">Nenhum Acontecimento! </>               
                <?php } else{?>    
                <td><?php echo $dado->id_pedido; ?> </td>
                <td><?php echo $date = new DateTime($dado->data); echo $date->format('d/m/Y'); ?></td>
                <td><?php echo $dado->evento; ?></td>    
                <?php } endforeach; ?>
            </tr> 
            </tbody>                 
              </table>            
              </form>                
              </div>  
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          </div>
        </div>
    </section>
</div>          
<script>
    $(document).ready(function() {
        $('#tabela').dataTable({
            language: {
                url: '<?php echo base_url() . "assets/plugins/datatables/Portuguese-Brasil.json"; ?>'
            },
            retrieve: true,
        });
    });
</script>