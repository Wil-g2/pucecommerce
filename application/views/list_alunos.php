<?php
/**
 * Created by PhpStorm.
 * User: willian
 * Date: 7/1/18
 * Time: 3:10 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');
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
                        <a href="<?php echo base_url('alunoadd'); ?>"  class="btn btn-success"> Novo <i class="fa fa-plus"></i></a>                        
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="tabela" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <td>ID</td>
                                <td>Nome</td>
                                <td>CPF</td>
                                <td>Telefone</td>
                                <td>Celular</td>
                                <td>E-mail</td>
                                <td>Ações/Pagamentos</td>
                            </tr>
                            <?php foreach($query as $dado): ?>
                            <tr>
                                <td><?php echo $dado->id; ?> </td>
                                <td><?php echo $dado->nome; ?></td>
                                <td><?php echo $dado->cpf; ?></td>
                                <td><?php echo $dado->telefone; ?></td>
                                <td><?php echo $dado->celular; ?></td>
                                <td><?php echo $dado->email ?></td>
                                <td><a href="alunoedit/<?php echo $dado->id?>" class="btn btn-info"><i class="fa fa-pencil"></i></a>
                                    <button type="button" class="btn btn-warning " data-toggle="modal" data-target="#myModal"><i class="fa fa-trash"></i></button>
                                    <a href="alunopag/<?php echo $dado->id?>" class="btn btn-default"><i class="fa fa-money"></i></a></td>
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
                                <p>Deseja APAGAR esse usuário?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-info" data-dismiss="modal">Não</button>
                                <a href="alunodel/<?php echo $dado->id?>" class="btn btn-warning">Sim</i></a>
                            </div>
                        </div>

                    </div>
                </div>
                <script>
                    $(document).ready(function() {
                        $('#tabela').dataTable({
                            language: {
                            url: '<?php echo base_url() . "assets/plugins/datatables/Portuguese-Brasil.json"; ?>'
                            });
                    });
                </script>
