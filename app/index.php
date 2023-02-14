<?php 
session_start();
include_once "./database/connection.php";
include_once "./class/crud.class.php";
$pdo = connection::getInstance();
$crud = Crud::getInstance($pdo, 'tb_produtos');  

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- ====== Fontawesome CDN Link ====== -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>
    <link rel="stylesheet" href="./libs/site/css/style.navbar.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Elegance Wine - Inicio</title>
    <link rel="shortcut icon" type="image" href="./libs/site/img/WineNavbar.png">
    <link rel="stylesheet" href="./libs/site/css/style.navbar2.css">
    <link rel="canonical" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="index2.css">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="footer.css">


    <!--overflow-y: hidden;-->
    Projeto de Conclusão de Curso | Sistema demonstrativo

</head>
<body>

<?php 
include('HeaderView.php');
include('carrosel.php');
?>


<br><br><br>


<div class="d-flex align-items-center p-3 my-3 text-white bg-vinho rounded shadow-sm">
  <img class="me-3" src="./libs/site/img/harmonyzacao.svg" alt="" width="48" height="38">
  <div class="lh-1">
    <h1 class="h6 mb-0 text-white lh-1">Os Melhores</h1>
    <i class="fa-solid fa-sparkles"></i>
    <small>Experimente os vinhos mais incríveis ao redor do mundo.</small>
  </div>
</div>
<?php include('produtosTest.php')?>

<!--?php include('produtos.php')?>-->

<br>
<div class="d-flex align-items-center p-3 my-3 text-white bg-vinho rounded shadow-sm">
  <img class="me-3" src="./libs/site/img/harmonyzacao.svg" alt="" width="48" height="38">
  <div class="lh-1">
    <h1 class="h6 mb-0 text-white lh-1">Descontos Imperdíveis</h1>
    <i class="fa-solid fa-sparkles"></i>
    <small>Compre seus vinhos com descontos exclusivos.</small>
  </div>
</div>

<?php include('produtosTest.php')?>
<!--?php include('produtos.php')?>-->

<br>

<div class="d-flex align-items-center p-3 my-3 text-white bg-vinho rounded shadow-sm">
  <img class="me-3" src="./libs/site/img/harmonyzacao.svg" alt="" width="48" height="38">
  <div class="lh-1">
    <h1 class="h6 mb-0 text-white lh-1">Os Melhores</h1>
    <i class="fa-solid fa-sparkles"></i>
    <small>Experimente os vinhos mais incríveis ao redor do mundo.</small>
  </div>
</div>
<br>
<!--  Cards (Produtos da página inicial)-->

  <?php include('produtosTest.php')?>

  <!--?php include('produtos.php')?>-->

  <?php include('FooterView.php')?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!--<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bo-->
    <script src="https://kit.fontawesome.com/a8239b02c3.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  </body>
</html>