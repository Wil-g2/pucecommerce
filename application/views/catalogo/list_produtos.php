<?php

/**
 * Created by PhpStorm.
 * User: willian
 * Date: 7/1/18
 * Time: 3:10 PM
 */
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Lista de Produtos</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Lista de Produtos</li>
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
                        <h3 class="card-title">Produtos </h3>
                        <div class="form-group">
                            <input type="text" id="search" onkeyup="search()" placeholder="Pesquisar" class="form-control"/>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <!--  <table id="tabela" class="table table-bordered table-hover">
                <thead>
            <tr>                                
            </tr>
            <tr>
            <?php foreach ($produtos as $prod): ?>
            <td>                 
                <?php echo $prod->id; ?> <br>
                <?php echo $prod->descricao;  ?> <br>
                <img src="https://cdnv2.moovin.com.br/biopoint/imagens/produtos/original/100-pure-whey-protein-900g-probiotica-c5d50b3c7007022be1dae90a398fa6bc.jpg" alt="..." class="img-thumbnail"><br> 
                <?php echo $prod->valor; ?> <br>                
                <a href="<?php echo base_url('addcart')?>" class="btn btn-primary" >Adiconar</a>
            </td>              
            <?php endforeach?>         
            </tr>
            </tbody>
                <!--<tfoot>
                <tr>
                  <th>Rendering engine</th>
                  <th>Browser</th>
                  <th>Platform(s)</th>
                  <th>Engine version</th>                 
                </tr>
                </tfoot>
              </table>-->
                        <div class="card-columns">
                            <?php foreach ($produtos as $prod): ?>
                            <div class="card">
                                <div class="card-body">
                                    <img src="https://cdnv2.moovin.com.br/biopoint/imagens/produtos/original/100-pure-whey-protein-900g-probiotica-c5d50b3c7007022be1dae90a398fa6bc.jpg" class="card-img-top"></img>
                                    <?php echo $prod->id.' - '.$prod->descricao;  ?>
                                    <?php echo 'R$ '.number_format($prod->valor,2,',','.') ?> <br>
                                    <a href="<?php echo base_url('addcart').'/'.$prod->id?>" class="btn btn-primary btn-block" >Adiconar
                                    <i class="fa fa-shopping-cart"></i>
                                    </a>
                                </div>
                            </div>
                            <?php endforeach?>
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
                    $(document).ready(function () {
                        $("#tabela").dataTable();
                    });
                </script>