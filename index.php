<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>CRUD XML PHP</title>
    <link rel="website icon" href="images/website icon.png">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
    <!-- <link rel="stylesheet" href="style.css"> -->
</head>
<body>
<div class="container">
    <h1 class="page-header text-center">Cadastro de pacientes</h1>
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <a href="#addnew" class="btn btn-primary" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span> Novo Cadastro</a>
            <?php 
                session_start();
                if(isset($_SESSION['message'])){
                    ?>
                    <div class="alert alert-info text-center" style="margin-top:20px;">
                        <?php echo $_SESSION['message']; ?>
                    </div>
                    <?php

                    unset($_SESSION['message']);
                }
            ?>
            <table class="table table-bordered table-striped" style="margin-top:20px;">
                <thead>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Sobrenome</th>
                    <th>Data de nascimento</th>
                    <th>Email</th>
                    <th>Endereco</th>
                    <th>Contacto</th>
                    <th>Opcoes</th>
                </thead>
                <tbody>
                    <?php
                    //load xml file
                    $file = simplexml_load_file('files/pacientes.xml');
                    
                    foreach($file->paciente as $row){
                        ?>
                        <tr>
                            <td><?php echo $row->id; ?></td>
                            <td><?php echo $row->nome; ?></td>
                            <td><?php echo $row->sobrenome; ?></td>
                            <td><?php echo $row->datan; ?></td>
                            <td><?php echo $row->email; ?></td>
                            <td><?php echo $row->endereco; ?></td>
                            <td><?php echo $row->contacto; ?></td>
                            <td>
                                <a href="#edit_<?php echo $row->id; ?>" data-toggle="modal" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span> Editar</a>
                                <a href="#delete_<?php echo $row->id; ?>" data-toggle="modal" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span> Remover</a>
                            </td>
                            <?php include('edit_delete_modal.php'); ?>
                        </tr>
                        <?php
                    }
        
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include('add_modal.php'); ?>
<script src="jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>