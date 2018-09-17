<?php
defined('BASEPATH') OR exit ('não tem acesso ao arquivo');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">	
    <link rel="stylesheet" href=<?php echo base_url()."assets/plugins/bootstrap/css/bootstrap.css" ?> type="text/css" >
    <link rel="stylesheet" href=<?php echo base_url()."assets/plugins/ionicons/ionicons.min.css" ?> type="text/css">
    <link rel="stylesheet" href=<?php echo base_url()."assets/plugins/font-awesome/css/font-awesome.css"?> type="text/css">
    <!--<link rel="stylesheet" href=<?php echo base_url()."assets/dist/css/adminlte.css"?> type="text/css" > -->
	<link rel="stylesheet" href=<?php //echo base_url()."assets/dist/css/login.css"?> type="text/css" >
    <title>Login</title>
	
</head>
<!-- <body class="login"> -->
<div class="container col-xs-12 col-sm-offset-2 col-sm-8 col-md-offset-3 col-md-6 col-lg-offset-4 col-lg-4">
            <br />
            <div class="panel panel-default">
                <div class="panel-heading">
                    <img src="<?php echo base_url()."assets/dist/img/puc.jpg"?>" class="rounded mx-auto d-block" alt="" />
                    <h1 class="text-center">Login</h1>                   
                </div>
                <div class="panel-body">
                    <form action="<?php echo base_url('logar')?>" method="post">                    
					<div class="form-group">
                        <div class="input-group mb-3">                            
                            <input id="txtUsuario" runat="server" type="text" class="form-control" name="login" placeholder="Usuário" required="" />
                            <div class="input-group-append">
								<span class="fa fa-user input-group-text"></span>																
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group mb-3">                           
                            <input id="txtSenha" runat="server" type="password" class="form-control" name="senha" placeholder="Senha" required="true" />
                            <div class="input-group-append">								
								<span class="fa fa-lock input-group-text"></span>
                            </div>
                        </div>
                    </div>
                    <button id="btnLogin" class="btn btn-success" style="width: 100%">
                        ENTRAR <i class="fa fa-sign-in"></i>
                    </button>
                    <a href="<?php echo base_url('reset')?>" class="btn btn-outline-info">Esqueci a senha</a> 
                    <a href="<?php echo base_url('newaccount')?>" class="btn btn-outline-info">Criar Conta</a>
                    <?php if (isset($dados)){
                         echo $dados; } ?>
					</form>                                                                              
                </div>
            </div>
        </div>  


<!--<script src=<?php echo base_url()."assets/plugins/jquery/jquery.min.js" ?> > </script>-->
<script src=<?php echo base_url()."assets/plugins/bootstrap/js/bootstrap.bundle.min.js"  ?>></script>
<script src=<?php echo base_url()."assets/plugins/bootstrap/js/bootstrap.min.js"  ?>></script>
<!--</body> -->
</html>

