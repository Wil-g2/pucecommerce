<?php
/**
 * Created by PhpStorm.
 * User: willian
 * Date: 8/28/18
 * Time: 9:26 PM
 */
defined('BASEPATH') or exit('No direct script access allowed');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href=<?php echo base_url() . "assets/plugins/bootstrap/css/bootstrap.css" ?> type="text/css" >
    <link rel="stylesheet" href=<?php echo base_url() . "assets/plugins/ionicons/ionicons.min.css" ?> type="text/css">
    <link rel="stylesheet" href=<?php echo base_url() . "assets/plugins/font-awesome/css/font-awesome.css" ?> type="text/css">
    <link rel="stylesheet" href=<?php echo base_url() . "assets/dist/css/adminlte.css" ?> type="text/css" >
    <!-- DataTables -->
    <link rel="stylesheet" href=<?php echo base_url() . "assets/plugins/datatables/dataTables.bootstrap4.css"?> >
    <!-- jQuery -->
    <script src="<?php echo base_url() . "assets/plugins/jquery/jquery.min.js"?> "></script>
    <link rel="stylesheet" href=<?php echo base_url() . "assets/dist/css/adminlte.css" ?> type="text/css" >
    <script src="<?php echo base_url() . "assets/plugins/datatables/jquery.dataTables.js"?>"></script>
    <script src="<?php echo base_url() . "assets/plugins/datatables/dataTables.bootstrap4.js" ?>"></script>

    <style>
        #main{
            margin-top: 60px;
            margin-bottom: 60px;
        }
        #sidebar{
            margin-top: 60px;
            margin-bottom: 60px;
        }

    </style>
    <title>Lojas PUC</title>
</head>

<table id="table">
    <thead>
        <tr>
            <td>Id</td>
            <td>Nome</td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>Willian</td>
        </tr>
        <tr>
            <td>1</td>
            <td>Home</td>
        </tr>
        <tr>
            <td>1</td>
            <td>Bebel</td>
        </tr>
        <tr>
            <td>1</td>
            <td>Mayra</td>
        </tr>
        <tr>
            <td>1</td>
            <td>Diretriz</td>
        </tr>
    </tbody>
</table>
<script>
        $(document).ready(function() {
            $('#table').dataTable();
        });
</script>


