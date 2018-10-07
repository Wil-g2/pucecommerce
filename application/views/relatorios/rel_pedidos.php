<?php
/**
 * Created by PhpStorm.
 * User: willian
 * Date: 9/18/18
 * Time: 17:26 PM
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
                    <h1>Relatório de Pedidos</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Relatório de Pedidos</li>
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
                        <h3 class="card-title">Pesquisar</h3>
                        <form action="buscar_pedidos" method="post">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="date_ini">Data Inicial</label>
                                <input type="date" name="date_ini" id="date_ini"  class="form-control"/>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="date_ini">Data Final</label>
                                <input type="date" name="date_fim" id="date_fim"  class="form-control"/>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="usuario">Usuário</label>
                                <input type="text" name="usuario" id="usuario"  class="form-control"/>                            
                            </div>  
                        </div>  
                        <div class="form-row">    
                            <div class="form-group col-md-3">    
                                <button type="submit" name="pesquisar" id="pesquisar" class="btn btn-success">Pesquisar<i class="fa fa-search"></i></button>
                            </div>
                        </div>    
                        </form>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="tabela" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <td>ID</td>
                                <td>Data Pedido</td>
                                <td>Valor</td>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (empty($ped)){ ?>
                                <td id="isEmpty" colspan="3" class="bg-info">Nenhum pedido Encontrado! </>
                            <?php } else{?>
                            <?php foreach($ped as $dado): ?>
                            <tr>
                                <td><?php echo $dado->idpedido; ?> </td>
                                <td><?php $date = new DateTime($dado->data); echo $date->format('d/m/Y'); ?></td>
                                <td><?php echo number_format($dado->total,2,',','.'); ?></td>
                                <?php endforeach; ?>
                            </tr>
                            <?php } ?>
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
                    }, dom: 'Bfrtip',
                    buttons: [
                        {
                            extend: 'print',
                            text: 'Imprimir <i class="fa fa-print"></i>',
                            className: 'btn btn-default',
                        },
                    ],
                    "searching": false
                });
            });
        </script>
