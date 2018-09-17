<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">   
   <!-- Main content -->
   <section class="content">
      <div class="row">
        <div class="col-12">    
          <h1>Editar Pagamento</h1>
          <?php echo validation_errors(); ?>
          <form method="post" action="<?php base_url('useradd'); ?>" >
            <div class="form-group">
                <label>Alunos: (*) </label>
                <select name="aluno" id="aluno" class="form-control">
                    <option>Selecione...</option>
                    <?php foreach ($alunos as $aluno) : ?>
                        <option value="<?php echo $aluno->id; ?>" <?php if ($query->aluno == $aluno->id) {
                                                                        echo 'selected';
                                                                    } ?>><?php echo $aluno->nome ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label>Cursos: (*) </label>
                <select name="curso" id="curso" class="form-control">
                    <option>Selecione...</option>
                    <?php foreach ($cursos as $curso) : ?>
                        <option value="<?php echo $curso->id ?>"  <?php if ($query->curso == $curso->id) {
                                                                        echo 'selected';
                                                                    } ?>><?php echo $curso->curso ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="data_pag">Data Pagamento: (*) </label>
                    <?php
                    date_default_timezone_set('America/Sao_Paulo');
                    $data_paga = new DateTime($query->data_pagamento);
                    $data_venc = new DateTime($query->data_vencimento);
                    ?>
                    <input type="date" id="data_pag" name="data_pagamento" value="<?php echo $data_paga->format('Y-m-d'); ?>" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <label for="data_pag">Data Vencimento: (*) </label>
                    <input type="date" id="data_ven" name="data_vencimento" value="<?php echo $data_venc->format('Y-m-d'); ?>" class="form-control">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="valor">Valor: (*) </label>
                    <input type="text" id="valor" name="valor" value="<?php echo $query->valor; ?>" class="form-control">
                </div>
                <div class="form-group col-md-4">
                    <label for="desconto">Desconto: (*) </label>
                    <input type="text" id="desconto" name="desconto" value="<?php echo $query->desconto; ?>" class="form-control">
                </div>
                <div class="form-group col-md-4">
                    <label for="parcela">Parcela: (*) </label>
                    <input type="number" id="parcela" name="parcela" value="<?php echo $query->parcela; ?>" class="form-control">
                </div>
            </div>
            <div class="form-group">        
                <input type="hidden" name="id" value=""/><br>
                <button type="submit" value="Editar" class="btn btn-success"> <i class="fa fa-save"></i> Editar</button>
                <a href="<?php echo base_url('pagamentos'); ?>" class="btn btn-danger"/>Cancelar <i class="fa fa-warning"></i> </a>
            </div>
        </form>
    </div>
  </section>
</div>  
