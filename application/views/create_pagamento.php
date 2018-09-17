<?php  defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">   
   <!-- Main content -->
   <section class="content">
      <div class="row">
        <div class="col-12">    
    <h1>Novo Pagamento</h1>
    <?php //echo validation_errors(); ?>
    <form method="post" action="<?php base_url('useradd');?>" >
        <div class="form-group">
            <label>Alunos: (*) </label>
            <select name="aluno" id="aluno" class="form-control">
                <option>Selecione...</option>
                <?php foreach ($alunos as $aluno): ?>
                    <option value="<?php echo $aluno->id ?>"><?php echo $aluno->nome?></option>
                <?php endforeach; ?>
            </select>
            <?php echo form_error("aluno")  ?>
        </div>
        <div class="form-group col-md-6">
            <label for="data_pag">Data Vencimento: (*) </label>
            <input type="date" id="data_ven" name="data_vencimento" class="form-control">
            <?php echo form_error("data_vencimento")  ?>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="valor">Valor: (*) </label>
            <input type="text" id="valor" name="valor" class="form-control" value="<?php echo set_value('valor');?>">
            <?php echo form_error("valor")  ?>
        </div>
        <div class="form-group col-md-4">
            <label for="desconto">Desconto: (*) </label>
            <input type="text" id="desconto" name="desconto" class="form-control" value="<?php echo set_value('desconto');?>">
            <?php echo form_error("desconto")  ?>
        </div>
        <div class="form-group col-md-4">
            <label for="parcela">Parcela: (*) </label>
            <input type="number" id="parcela" name="parcela" class="form-control" value="<?php echo set_value('parcela');?>">
            <?php echo form_error("parcela")  ?>
        </div>
    </form>
</div>
</div>
     </section>       
</div>
