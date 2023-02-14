<?php
session_start();
include_once "../../database/connection.php";
include_once "../../class/crud.class.php";

$pdo = connection::getInstance();  
$crud = Crud::getInstance($pdo, 'tb_vendas');  

// Consulta os dados da cliente
$sql        = "SELECT * FROM tb_vendas";
$arrayParam = ""; 
$dados      = $crud->getSQLGeneric($sql, $arrayParam, TRUE);
?>













<!doctype html>
<html lang="pt_BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    
    <title>Admin · EleganceWine</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sidebars/">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" type="image" href="./libs/site/img/WineNavbar.png">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <script type="text/javascript" src="https://gc.kis.v2.scr.kaspersky-labs.com/FD126C42-EBFA-4E12-B309-BB3FDD723AC1/main.js?attr=GRAzxvctt3g5OWcsIYEOVlk7UC3r2_AB-y2KpMqhCxgWTN7wi1tTdHELlCFOupQlvxhCAHcHMn577UlJb9M87KMUnIJbeSQmzMCA4mi8Y0A" charset="UTF-8"></script><style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <link href="assets/css/sidebars.css" rel="stylesheet">
  </head>
  <body>
    
  <?php include ('./template/svg.php'); ?>

<main>
  <!-- div  com foto da conta-->
  <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;">

    <div class="dropdown">
        <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
          <img src="./assets/image/WineNavbar.png" alt="" width="32" height="32" class="rounded-circle me-2">
          <strong>
            <?php 
            echo "Olá,";
            ?> 

            <!--            ?php 
            echo "Olá, " .$_SESSION['usuario'];
            ?> -->
          </strong>
        </a>
        <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item" href="logout.php"><i class="fa-solid fa-sign-in-alt"></i> Sair</a></li>
        </ul>
      </div>

    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="#" class="nav-link link-dark" aria-current="page">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"/></svg>
          Inicio
        </a>
      </li>
      <li>
        <a href="pedidos.php" class="nav-link active link-dark">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"/></svg>
          Pedidos
        </a>
      </li>
      <li>
        <a href="../client/ClientAction.php" class="nav-link link-dark">
          <!--<svg class="bi me-2" width="16" height="16"><use xlink:href="#bi bi-terminal"/></svg>-->
          <i class="fa-solid fa-person-military-pointing"></i>
          Área do Cliente
        </a>
      </li>   
      <li>
        <a href="../../index.php" class="nav-link link-dark">
        <i class="fa-solid fa-server"> </i>
          Site
        </a>
      </li> 
      <li><hr class="dropdown-divider"></li> 
      
      <ul class="nav nav-pills flex-column mb-auto">
      <li>
        <a href="createProduto.php" class="nav-link link-dark">
        <i class="fa-sharp fa-solid fa-plus"></i>
          Cadastrar Produtos
        </a>
      </li>
      <li>
        <a href="createCategoria.php" class="nav-link link-dark">
        <i class="fa-solid fa-folder-plus"></i>
          Cadastrar Categorias
        </a>
      </li>
      <li>
        <a href="createPromocao.php" class="nav-link link-dark">
        <i class="fa-solid fa-folder-plus"></i>
          Cadastrar Promoção
        </a>
      </li>
      <li>
        <a href="createUser.php" class="nav-link link-dark">
        <i class="fa-solid fa-folder-plus"></i>
          Cadastrar Usuario
        </a>
      </li>
      <li><hr class="dropdown-divider"></li>
      <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">

        <a href="ClientView.php" class="nav-link link-dark">
          <i class="fa-sharp fa-solid fa-eye"></i>
          Visualizar Clientes
        </a>

      </li>
      <li>
        <a href="AdminView.php" class="nav-link link-dark">
        <i class="fa-sharp fa-solid fa-eye"></i>
           Visualizar Admin
        </a>
      </li>
      <li>
        <a href="ProductView.php" class="nav-link link-dark">
        <i class="fa-sharp fa-solid fa-eye"></i>
           Visualizar Produto
        </a>
      </li>
      <li>
        <a href="CategoriesView.php" class="nav-link link-dark">
          <i class="fa-sharp fa-solid fa-eye"></i> Visualizar Categoria
        </a>
      </li>
      <li>
        <a href="PromotionsView.php" class="nav-link link-dark">
        <i class="fa-sharp fa-solid fa-eye"></i>
           Visualizar Promoção
        </a>
      </li>

      <li><hr class="dropdown-divider"></li>
      
      <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="ClientUpdate.php" class="nav-link link-dark">
        <i class="fa-solid fa-users-gear"></i>
         Alterar Contas
        </a>
      </li>
      <li>
        <a href="createProduto.php" class="nav-link link-dark">
        <i class="fa-sharp fa-solid fa-plus"></i>
          Alterar Produtos
        </a>
      </li>
      <li>
        <a href="CategoriesUpdate.php" class="nav-link link-dark">
        <i class="fa-solid fa-folder-plus"></i>
          Alterar Categorias
        </a>
      </li>

      <li><hr class="dropdown-divider"></li>

      <li class="nav-item">
        <a href="deleteAccounts.php" class="nav-link link-dark">
        <i class="fa-solid fa-trash"></i>
        Deletar Contas
        </a>
      </li>
      <li>
        <a href="deleteProduto.php" class="nav-link link-dark">
        <i class="fa-solid fa-trash"></i>
        Deletar Produtos
        </a>
      </li>
      <li>
        <a href="deleteCategoria.php" class="nav-link link-dark">
        <i class="fa-solid fa-trash"></i>
        Deletar Categorias
        </a>
      </li> 
      <li>
        <a href="deletePromocao.php" class="nav-link link-dark">
        <i class="fa-solid fa-trash"></i>
        Deletar Promoções
        </a>
      </li> 
    </ul>
    <hr>
  <br><br><br><br>
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
        <strong>ELEGANCEWINE©2022</strong>
      </a>
  </div>
   <!-- Sidebar Fix --->

  <div class="b-example-divider"></div>

  <div class="container-fluid">
    <div class="row">
  
      <div class="d-flex align-items-center p-3 my-3 text-white bg-vinho rounded shadow-sm">
        <img class="me-3" src="./assets/image/WineNavbar.png" alt="" width="48" height="38">
        <div class="lh-1">
          <h1 class="h6 mb-0 text-white lh-1">EleganceWine</h1>
          <small>Painel Administrador</small>
        </div>
      </div>

      <br>

<br><br><br>




    <div class="container ">
        <table class="table table-responsive justify-content-center">
        <thead>
            <tr class="table-danger">

                <th scope="col">Código</th>
                <th scope="col">Data da Venda</th>
                <th scope="col">Cliente</th>
                <th scope="col">Movimento</th>

                <?php if($_SESSION['nivel'] == 2){ ?>
                <th colspan="3" scope="col">Ações</th>
                <?php } ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach($dados as $dc){ ?>
            <tr>
                <td><?php echo $dc->cod_venda; ?></td>
                <td><?php echo $dc->data_venda; ?></td>
                <td><?php echo $dc->cliente; ?></td>
                <td><?php echo $dc->tipo; ?></td>
                <?php if($_SESSION['nivel'] == 2){ ?>
                <td><a class="btn btn-primary" href="ClientUpdate.php?id=<?php echo $dc->cod_Cliente;?>"><i class="fa-sharp fa-solid fa-pen"></i><!--alterar--></a></td>
                <td><a class="btn btn-danger" href="deleteCliente.php?id=<?php echo $dc->cod_Cliente;?>" onclick="return confirm('Tem certeza que deseja deletar esse registro?');"><i class="fa-sharp fa-solid fa-trash"></i><!--Excluir--></a></td>
                <?php } ?>
            <tr>
            <?php }?>
            <tr>
            <td><a class="btn btn-danger" href="index.php">Voltar</a></td>
            </tr>
        </tbody>


    </main>
    <script src="https://kit.fontawesome.com/a8239b02c3.js" crossorigin="anonymous"></script>
    <script src="assets/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!--<script src="sidebars.js"></script>-->
  </body>
</html>        