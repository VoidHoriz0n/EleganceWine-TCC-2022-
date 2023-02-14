<?php
session_start();
//require_once "conexao.php";
include_once "./database/connection.php";
include_once "./class/crud.class.php";
$pdo = connection::getInstance();


//$pdo = conectar();

// criando um select para pegar todas as 
// categorias que tem na tabela.

$sqlpr = "SELECT * FROM tb_produtos";

// preparando o sql para não aceitar sql injection
$stmtpr = $pdo->prepare($sqlpr);
$stmtpr->execute();

// pegando todos os dados da tabela
//$produtos = $stmtpr->fetchAll();
$horizontal = 5; // quantidade de colunas
$i = 1;
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Vitrine de Produto</title>
</head>

<body>
    <h1>Listagem de Produtos</h1>
    <table class="table">
        <tr>
            <?php while ($p = $stmtpr->fetch(PDO::FETCH_ASSOC)) {
                if ($i < $horizontal) { ?>
                    <td>
                        <img src="<?php echo "img/" . $p['imagem']; ?>" height="70px" width="70px">
                        <p>
                        <h3><?php echo $p['descricao']; ?></h3>
                        </p>
                        <p><a href="#" class="btn btn-success">Agendar</a></p>
                    </td>
                <?php } elseif ($i = $horizontal) { ?>
                    <td>
                        <img src="<?php echo "img/" . $p['imagem']; ?>" height="70px" width="70px">
                        <p>
                        <h2><?php echo $p['descricao']; ?></p>
                            <p><a href="#" class="btn btn-success">Agendar</a></p>
                    </td>
        </tr>
        <tr>
    <?php $i = 0;
                }
                $i++;
            } ?>
        </tr>
    </table>

    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>