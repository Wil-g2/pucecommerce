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
            <h1>Carrinho</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Carrinho</li>
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
              <h3 class="card-title">Compra</h3>
              <?php if(!empty($cart)){ ?>
                <a id="finalizar" href="<?php echo base_url('finalizar'); ?>"  class="btn btn-success" >Finalizar <i class="fa fa-dollar"></i></a>              
              <?php }?>  
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="tabela" class="table table-bordered table-hover">
                <thead>
            <tr>
                <td>ID</td>
                <td>Descrição</td>
                <td>Valor</td>
                <td>Quantidade</td>
                <td>Ações</td>
            </tr>
                </thead>
                  <tbody>
            <?php foreach ($cart as $dado) :?>            
            <tr>
                <?php if (empty($cart)){ ?>
                    <td id="isEmpty" colspan="5" class="bg-info">Carrinho está vazio! </>               
                <?php } else{?>    
                <td><?php echo $dado['id']; ?> </td>
                <td><?php echo $dado['descricao']; ?></td>
                <td><?php echo 'R$'. number_format($dado['valor'],2,',','.'); ?></td>
                <td>
                        <a href="<?php echo base_url('subtrair').'/'.$dado['id']; ?>" class="btn btn-default"> <strong> - </strong></a>
                        <input type="text" size="5" id="qtditem" disabled name="qtditem" value="<?php echo $dado['qtd'];?>"/>
                        <a href="<?php echo base_url('aumentar').'/'.$dado['id']; ?>" class="btn btn-default"><strong> + </strong> </a>
                </td>
                <td>
                    <a href="<?php echo base_url('remover').'/'.$dado['id']; ?>" class="btn btn-warning"><i class="fa fa-trash-o"></i></a></td>
                <?php } endforeach; ?>
            </tr> 
            </tbody>
                  <?php if (!empty($cart)){ ?>
                    <tfoot>
                    <tr>
                      <th colspan="3">TOTAL:</th>
                      <th colspan="2"><?php echo 'R$'. number_format($total,2,',','.') ?></th>
                    </tr>
                    </tfoot>
                  <?php }?>
              </table>
              <div class="card-body">
              <form method="post" action="<?php base_url('calcfrete'); ?>" class="form-inline">            
                <div class="form-group mb-3">
                    <label>Cep: (*) </label>
                    <input type="text" name="cep_dest" value="<?php echo set_value('cep_dest');?>" class="form-control"/>
                </div>
               <!-- radio -->
               <div class="form-group mb-3">
                  <div class="radio">
                    <label>
                      <input type="radio" name="tipo" id="optionsRadios1" class="form-control" value="pac" <?php if (set_value('tipo')=='pac'){ echo checked; }?> >PAC  
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="tipo" id="optionsRadios2" class="form-control" value="sedex" <?php if (set_value('tipo')=='pac'){ echo checked; }?>>Sedex
                    </label>
                  </div>                 
                </div>
                <div class="form-group mb-3">              
                <button type="submit" class="btn btn-success"> <i class="fa fa-calc"></i>  Calcular</button>
                <!-- <a href="<?php echo base_url('calcfrete'); ?>" class="btn btn-danger"/>Cancelar <i class="fa fa-warning"></i> </a> -->
                 </div>   
                 <div class="form-group mb-3">
                  <?php 
                    //print_r($frete);                  
                    if ($frete->cServico->Valor!=null){                      
                      echo '  Valor R$'.$frete->cServico->Valor . "  Prazo de Entrega:" . $frete->cServico->PrazoEntrega . " Dias";
                      echo 'Total Geral:'.'R$'. number_format(($frete->cServico->Valor+$total),2,',','.');
                    }
                  ?>                  
                </div> 
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