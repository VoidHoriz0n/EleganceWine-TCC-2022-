<?php 
session_start();

if(!isset($_SESSION)){
	header('Location: ./view/auth/AuthView.php');
	
}else{
	$idCliente = $_SESSION['idcliente'];
}

include_once "./database/connection.php";
include_once "./class/crud.class.php";
  
$pdo = connection::getInstance();  

$crud = Crud::getInstance($pdo, 'tb_vendas');

// Consulta os dados da produto 

$sql        = "SELECT * FROM tb_clientes WHERE cod_cliente = ?"; 
$arrayParam = array($idCliente); 
$clientes      = $crud->getSQLGeneric($sql, $arrayParam, FALSE);


if(!isset($_SESSION['carrinho'])){
	$_SESSION['carrinho'] = array();
} 

if(isset($_GET['ac'])){

	// adiciona ao carrinho

	if($_GET['ac'] == 'add'){
		$id = intval($_GET['id']);
		if(!isset($_SESSION['carrinho'][$id])){
			$_SESSION['carrinho'][$id] = 1;
		} else {
			$_SESSION['carrinho'][$id] += 1;
		}
	}

	if($_GET['ac'] == 'del'){
		$id = intval($_GET['id']);
		if(isset($_SESSION['carrinho'][$id])){
			unset($_SESSION['carrinho'][$id]);
		}
	} 

	if($_GET['ac'] == 'up' && count($_SESSION['carrinho']) != 0){
		if(is_array($_POST['prod'])){
			foreach($_POST['prod'] as $id => $qtd){
				$id = intval($id);
				$qtd = intval($qtd);
				if(!empty($qtd) || $qtd <> 0){
					$_SESSION['carrinho'][$id] = $qtd;
				}else{
					unset($_SESSION['carrinho'][$id]);
				}
			}
		}
	}
	header("Location: carrinho.php");
}
?>

<html>
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- ====== Fontawesome CDN Link ====== -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>
    <link rel="stylesheet" href="./libs/site/css/style.navbar.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Elegance Wine - Carrinho</title>
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
?>


<div class="container w-100 p-3">
	<div class="row justify-content-md-center">
        <div class="bg-light">
		<h1>Carrinho de Compras</h1>

		<table class="table tabela">
		<tr>
			<td class="acao">Ação</td>
			<td>Produto</td>
			<td>Quant</td>
			<td>Preço</td>
			<td>SubTotal</td>			

					</tr>
					<form action="?ac=up" method="post">
						<?php
						if (count($_SESSION['carrinho']) == 0) {
							echo '<tr><td colspan="5">Não há produto no carrinho</td></tr>';
						} else {
							$total = 0;
							$i = 0;

							foreach ($_SESSION['carrinho'] as $id => $qtd) {
								$sql = "SELECT * FROM tb_produtos WHERE cod_produtos = :p";
								$stmt = $pdo->prepare($sql);
								$stmt->bindValue(':p', $id);
								$stmt->execute();
								$dados = $stmt->fetch(PDO::FETCH_ASSOC);

								$produto = $dados['nome'];
								$preco = number_format($dados['valor'], 2, ',', '.');
								$sub = number_format($dados['valor'] * $qtd, 2, ',', '.');
								$total += $dados['valor'] * $qtd;
								$_SESSION['valor_total'] = $total;
								$i++;
					echo '


					<tr>
						<td><a href="?ac=del&id='.$id.'"><i class="fa-solid fa-trash"></i></a></td>
						<td><b>'.$produto.'</b></td>
						<td><input type="text" size="3" name="prod['.$id.']" value="'.$qtd.'" /></td>
						<td>R$ '.$preco.'</td>
						<td>R$ '.$sub.'</td>
					</tr>';
				}
				$total = number_format($total, 2, ',', '.');

				echo '<tr>	
				<td colspan=2><input class="btn btn-success col-12" type="submit" value="Atualizar Carrinho" /></td> </td>
				<td colspan="2" class="text-right font-weight-bold">Total</td><td class="font-weight-bold">R$ '.$total.'</td></tr>';
			} ?>
	</form>
	
</table>
<div class="row justify-content-md-center">
	<div class="col-6"><a class="btn btn-dark col-12" href="categories.php">Continuar Comprando</a></td>
</div>
<div class="col-6"><button type="button" class="btn btn-primary col-12" data-toggle="modal" data-target="#vendas">Fechar Venda</button></div>

</div>
<div class="modal fade" id="vendas" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
      		<div class="modal-header">
				<h5 class="modal-title">Finalizando a venda</h5>
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      		</div>
      		<div class="modal-body">
        		<form method="post">
          			<div class="form-group">
            			<label class="col-form-label">Email:</label>

						<input type="text" name="cliente" value="<?php echo $_SESSION['email']; ?>" readonly="readonly">
					</div>
          			<div class="form-group">
						<?php $hoje = date('d/m/Y');?>
						<label class="col-form-label">Data:</label>
						<input type="text" value="<?php echo $hoje;?>" readonly="readonly">
          			</div>
      		</div>
      		<div class="modal-footer">
        		<button type="submit" name="finalizaVenda" class="btn btn-primary">Fechar Venda</button>
      		</div>
			  </form>
    	</div>
  	</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/a8239b02c3.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>

<?php

if(isset($_POST['finalizaVenda'])){

	$Movimentos = array(
        'tipo' => "S",
		'cliente' => (int) $_SESSION['idcliente'],
		'data_venda' => date('Y-m-d'),
        'valorTotal' => $_SESSION['valor_total']   
    );  
	
    $movimento   = $crud->insert($Movimentos);
	$_SESSION['ultimoId'] = $movimento[1];

 	//inserindo os itens comprados 
 	foreach ($_SESSION['carrinho'] as $id => $qtd) {

		$stm = $pdo->prepare("INSERT INTO tb_venda_produtos (fk_cod_venda,fk_cod_produtos,quantidade) values (?,?,?)");
		$stm->bindValue(1, $_SESSION["ultimoId"]);
		$stm->bindValue(2, $id);
		$stm->bindValue(3, $qtd);
		$stm->execute();

		unset($_SESSION['carrinho']);
		unset($_SESSION['valor_total']);

		echo "<script> alert('Pedido realizado com sucesso') </script>";
		echo "<meta http-equiv='refresh' content='0; URL=index.php'/>";

	}
}
/*
Fix
if (isset($_POST['finalizaVenda'])) {

	$cliente 	= (int) $_SESSION['cliente'];
	$dataCompra = date('Y-m-d');
	$valorTotal = $_SESSION['valor_total'];
	$observacao = $_POST['observacao'];

	$sql = "INSERT INTO pedido (codigoPedido, cliente, data, total, observacao) VALUES (default, :c, :dc, :vt, :ob)";
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':c', $cliente);
	$stmt->bindParam(':dc', $dataCompra);
	$stmt->bindParam(':vt', $valorTotal);
	$stmt->bindParam(':ob', $observacao);
	$stmt->execute();

	$sqlp = "SELECT max(codigoPedido) ultimo FROM pedido";
	$stmtu = $pdo->prepare($sqlp);
	$stmtu->execute();
	$ultimoId = $stmtu->fetch();
	
	$_SESSION['ultimoId'] = $ultimoId['ultimo'];

	$ultimo = $_SESSION['ultimoId'];
	//inserindo os itens comprados 
	foreach ($_SESSION['carrinho'] as $id => $qtd) {

		$sqli = "INSERT INTO itens (pedido,produto,quantidade) VALUES (?,?,?)";
		$stmi = $pdo->prepare($sqli);
		$stmi->bindValue(1, $ultimo);
		$stmi->bindValue(2, $id);
		$stmi->bindValue(3, $qtd);
		$stmi->execute();

		unset($_SESSION['carrinho']);
		unset($_SESSION['valor_total']);

		header("Location: listaproduto.php");
	}
} 



 */

?>