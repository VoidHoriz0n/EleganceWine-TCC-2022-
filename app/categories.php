<?php 
session_start();
include_once "./database/connection.php";
include_once "./class/crud.class.php";
$pdo = connection::getInstance();
$crud = Crud::getInstance($pdo, 'tb_produtos');  


// Consulta os dados da produto 
/*
$sql        = "SELECT  
                    p.cod_produtos,
                    p.nome, 
                    p.valor
                    FROM tb_produtos as p
                    ORDER BY p.nome"; 
$arrayParam = ""; 
$dados      = $crud->getSQLGeneric($sql, $arrayParam, TRUE);
*/
?>  
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elegance Wine - Produtos</title>
    <link rel="shortcut icon" type="image" href="./libs/site/img/WineNavbar.png">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>
    <link rel="stylesheet" href="./libs/site/css/style.navbar.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="./libs/site/css/style.navbar2.css">
    <link rel="canonical" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="index2.css">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="footer.css">

    <link rel="stylesheet" href="./libs/site/css/style.categories.css">
    Projeto de Conclusão de Curso | Sistema demonstrativo
</head>


<body id="page-top">

<?php 
    include('HeaderView.php');
?>    

<nav class="nav wine-subnav">
  <div class="links-in-the-center">
  </div>
</nav>

<br>

    <header class="page-section masthead2">
		<div class="container h-50">
			<h1 class="section-header text-white font-weight-bold">Produtos</h1>
			<small style="color:white;">Aproveite nosso mais variado catalogo.</small>
		</div>
		
	</header>

    <!----god-->
    <div class="d-flex align-items-center p-3 my-3 text-white bg-vinho rounded shadow-sm">
    <img class="me-3" src="./libs/site/img/harmonyzacao.svg" alt="" width="48" height="38">
        <div class="lh-1">
            <h1 class="h6 mb-0 text-white lh-1">Os Melhores</h1>
            <i class="fa-solid fa-sparkles"></i>
             <small>Experimente os vinhos mais incríveis ao redor do mundo.</small>
        </div>
    </div>
 
    <!--------->
	<section class="page-section">
		<div class="container">
			<div class="row">

				<div class="col-lg-3 blog-form">
					<h2 class="blog-sidebar-title"><b>Categorias</b></h2>
					<hr />

					<p class="blog-sidebar-list"><b><span class="list-icon"> </span> Tinto</b></p>
					<p class="blog-sidebar-list"><b><span class="list-icon"> </span> Roses</b></p>
					<p class="blog-sidebar-list"><b><span class="list-icon"> </span> Brancos</b></p>
					<p class="blog-sidebar-list"><b><span class="list-icon"> </span> Espumantes</b></p>
					<p class="blog-sidebar-list"><b><span class="list-icon"> </span> Fisantes</b></p>
					<p class="blog-sidebar-list"><b><span class="list-icon"> </span> Lincorosos</b></p>
					<div>&nbsp;</div>
					<div>&nbsp;</div>
					<hr />

				</div>
				<!--END  <div class="col-lg-3 blog-form">-->

				<div class="col-lg-9" style="padding-left: 30px;">
					<div class="row">

                    <?php
                    $sql = "SELECT * FROM tb_categorias";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute();
                    $categ = $stmt->fetchAll();
                    ?>
						<div class="col">
							<select class="form-control">
                            <?php foreach ($categ as $categs) { ?>
								<option value="<?php echo $categs['cod_categoria']; ?>"><?php echo $categs['nome']; ?></option>
                            <?php } ?>    
							</select>
						</div>

					</div>
					<!-- Sorting by <div class="row"> -->
					<div>&nbsp;</div>
					<div>&nbsp;</div>


					<?php
					$sqlpr = "SELECT * FROM tb_produtos LIMIT 10";
					
					// preparando o sql para não aceitar sql injection
					$stmtpr = $pdo->prepare($sqlpr);
					$stmtpr->execute();
					
					// pegando todos os dados da tabela
					//$produtos = $stmtpr->fetchAll();
					$horizontal = 5; // quantidade de colunas
					$i = 1;
					?>



					<div class="row">
					<?php while ($p = $stmtpr->fetch(PDO::FETCH_ASSOC)) {
                    if ($i < $horizontal) { ?>	
						<div class="col-sm-3 col-md-6 col-lg-4">
							<div class="card">
								<div class="card-body text-center">
									<img src="<?php echo $p['imagem']; ?>" class="product-image">

									<h5 class="card-title"><b><?php echo $p['nome']; ?></b></h5>
									<p class="card-text small"><?php echo $p['descricao']; ?></p>
									<p class="tags"><?php echo "R$".$p['valor']; ?></p>


									<a href="carrinho.php?ac=add&id=<?php echo $p['cod_produtos']; ?>" target="_blank" class="btn btn-success button-text"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Comprar</a>
								
                                </div>
							</div>
						</div>


						<?php $i = 0;
                                }
                                $i++;
                            } ?> 
<!-- Demais Produtos-->
<!--
						<div class="col-sm-3 col-md-6 col-lg-4">
							<div class="card">
								<div class="card-body text-center">
									<img src="img/coffee_item8.jpg" class="product-image">
									<h5 class="card-title"><b>Coffee Bank</b></h5>
									<p class="card-text small">With supporting text below as a natural lead-in to additional content.</p>
									<p class="tags">Price $16</p>
									<a href="#" class="btn btn-success button-text"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Add to cart</a>
								</div>
							</div>
						</div>

				</div>-->
			</div>
		</div>
	</section>

    <?php include('FooterView.php')?>


	<!-- Bootstrap JavaScript -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	

</body>
</html>