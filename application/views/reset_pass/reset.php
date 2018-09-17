<?php  defined('BASEPATH') OR exit('No direct script access allowed'); ?>
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
    <title>Resetar Senha</title>    
</head>
<body>
<div class="container col-xs-12 col-sm-offset-2 col-sm-8 col-md-offset-3 col-md-6 col-lg-offset-4 col-lg-4">
            <br />
            <div class="panel panel-default">
                <div class="panel-heading">
                    <img src="<?php echo base_url()."assets/dist/img/puc.jpg"?>" class="rounded mx-auto d-block" alt="" />
                    <h1 class="text-center">Resetar Senha</h1>
                </div>
                <div class="panel-body">
                    <form action="<?php echo base_url('resetar')?>" method="post">                                  
					<div class="form-group">
                        <div class="input-group mb-3">                            
                            <input id="txtEmail" type="text" class="form-control" name="email" placeholder="email@example.com" required="" />
                            <div class="input-group-append">
								<span class="fa fa-envelope input-group-text"></span>																
                            </div>
                        </div>
                    </div>                    
                    <button id="btnLogin" runat="server" class="btn btn-success" style="width: 100%">
                        RESETAR <i class="fa fa-reset"></i>
                    </button>                   
					</form>
                    <?php echo validation_errors(); 
                    if (isset($msg)){ ?>
                    <div class="<?php echo $tipo; ?>" role="alert"><?php  echo $msg; ?> </div>                       
                    <?php } ?>   
                    <a href="<?php echo base_url('login')?>">Fazer Login</a>
                </div>
            </div>
        </div>  


<!--<script src=<?php echo base_url()."assets/plugins/jquery/jquery.min.js" ?> > </script>-->
<script src=<?php echo base_url()."assets/plugins/bootstrap/js/bootstrap.bundle.min.js"  ?>></script>
<script src=<?php echo base_url()."assets/plugins/bootstrap/js/bootstrap.min.js"  ?>></script>
    
</body>
</html>
