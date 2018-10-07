<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url() . "assets/plugins/datatables/dataTables.bootstrap4.css"?>">
    <!--<link rel="stylesheet" href=<?php echo base_url() . "assets/plugins/bootstrap/css/bootstrap.css" ?> type="text/css" >-->
    <!-- Ionicons -->
    <link rel="stylesheet" href=<?php echo base_url() . "assets/plugins/ionicons/ionicons.min.css" ?> type="text/css">
    <!--<link rel="stylesheet" href=<?php echo base_url() . "assets/plugins/font-awesome/css/font-awesome.css" ?> type="text/css">-->
    <!-- Theme style -->
    <link rel="stylesheet" href=<?php echo base_url() . "assets/dist/css/adminlte.css" ?> type="text/css" >
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">


    <!-- jQuery -->
    <script src="<?php echo base_url() . "assets/plugins/jquery/jquery.min.js"?>"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url() . "assets/plugins/bootstrap/js/bootstrap.bundle.min.js"?> "></script>
    <!-- DataTables -->
    <script src="<?php echo base_url() . "assets/plugins/datatables/jquery.dataTables.js"?>"></script>
    <script src="<?php echo base_url() . "assets/plugins/datatables/dataTables.bootstrap4.js" ?>"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>    
    <title>Lojas PUC</title>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
        <!--<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top"> -->
        <!--<div class="container-fluid">-->
        <div class='navbar-header'>
            <a class="navbar-brand" href="<?php echo base_url('users'); ?>" data-widget="pushmenu" ><strong>Loja</strong><i class="fa fa-bars"></i> </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="nav navbar-nav">
                <li class="nav-item ">
                    <a class="nav-link" href="<?php echo base_url('useredit').'/'.$this->session->userdata('id_user'); ?>"><i class="fa fa-user"></i> Usuários <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('pessoaedit/'.$this->session->userdata('id_user')); ?>"><i class="fa fa-users"></i> Cadastrado<span class="sr-only">(current)</span></a>
                </li>                
                <li>
                    <a class="nav-link" href="<?php echo base_url('enderecos/'.$this->session->userdata('id_user')); ?>"><i class="fa fa-product-hunt"></i> Endereços<span class="sr-only">(current)</span></a>
                </li>
                <li>
                    <a class="nav-link" href="<?php echo base_url('pedidos'); ?>"><i class="fa-first-order"></i> Pedidos<span class="sr-only">(current)</span></a>
                </li>
                <li>
                    <a class="nav-link" href="<?php echo base_url('sacadd'); ?>"><ion-icon name="call"></ion-icon> SAC<span class="sr-only">(current)</span></a>
                </li>                
            </ul>
        </div>
        <form class="form-inline my-2 my-lg-0">           
                <a href="<?php echo base_url('pedido') ?>" class="form-control mr-sm-2" >Comprar <i class="fa fa-shopping-cart"></i> </a>   
            <?php if ($this->session->userdata('tipo') != null) { ?>
                <button type="button" class="btn btn-outline-success my-2 my-sm-0" data-toggle="modal" data-target="#ModalLogout"> Sair <i class="fa fa-close"></i></button>
                <?php
            } else { ?>
                <a href='<?php echo base_url('login'); ?>' class="btn btn-outline-success my-2 my-sm-0"> Login <i class="fa fa-lock"></i></a>
                <?php
            } ?>
        </form>
    </nav>
    <!--<div class="container-fluid">-->
    <!-- <div class="row"> -->
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-light-primary elevation-4">
        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!--<nav class="col-md-2 col-sd-1 d-none d-md-block bg-light sidebar collapse navbar-collapse">-->
                    <div class="sidebar-sticky">
                        <p><i class="fa fa-tags"></i> Categorias > </p>
                        <ul class="nav flex-column">
                            <?php
                            foreach ($query as $dado) : ?>
                                <li class="nav-item">
                                    <a class="nav-link active" href="<?php echo  base_url('catalogo/'.$dado->id); ?>">
                                        <!--<i class="fa fa-tags"></i>
                                        <i class="fa fa-tags"></i>-->
                                        <?php echo $dado->categoria; ?> <span class="sr-only">(current)</span>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
            </nav>
        </div>
    </aside>
<!-- Modal -->
<div class="modal fade" id="ModalLogout" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Alerta</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <p>Deseja SAIR do sistema?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <a href="<?php echo base_url('logout'); ?>" class="btn btn-info">Sim</i></a>
            </div>

        </div>
    </div>
</div>
            

