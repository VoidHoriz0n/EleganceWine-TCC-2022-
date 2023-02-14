<?php
session_start();
//require_once "conexao.php";
//$pdo = conectar();
include_once "./database/connection.php";
$pdo = connection::getInstance();
// criando um select para pegar todas as 
// categorias que tem na tabela.

$sqlpr = "SELECT * FROM tb_produtos";

// preparando o sql para não aceitar sql injection
$stmtpr = $pdo->prepare($sqlpr);
$stmtpr->execute();

// pegando todos os dados da tabela
$produtos = $stmtpr->fetchAll();

//print_r($produtos);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Lista de Produto</title>
</head>

<body>
    <h1>Listagem de Produtos</h1>
    <table class="table col-6">
        <thead>
            <tr>
                <th scope="col" class="col-3">Nome</th>
                <th scope="col" class="col-3">Imagem</th>
                <th scope="col" class="col-3">Descrição</th>
                <th scope="col" class="col-3">Preço</th>
                <th scope="col" class="col-2">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($produtos as $p) { ?>
                <tr>
                    <td>
                    <td><?php echo $p['nome']; ?></td>

                    <!--<img src="./img/?php echo $p['imagem']; ?>" witdh="50px" height="50px">--->
                    <img src="<?php echo $p['imagem']. ".png"; ?>" witdh="50px" height="50px">
                    </td>
                    <td><?php echo $p['descricao']; ?></td>
                    <td><?php echo $p['valor']; ?></td>
                    <td><a href="carrinho.php?ac=add&id=<?php echo $p['cod_produtos']; ?>">Comprar</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>