<?php 
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
$horizontal = 3; // quantidade de colunas
$i = 1;
?>

<!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <?php while ($p = $stmtpr->fetch(PDO::FETCH_ASSOC)) {
                    if ($i < $horizontal) { ?>
                    <div class="col mb-5">
                        <div class="card h-100">
     
                            <!-- Product image-->
                            <img class="card-img-top" src="<?php echo $p['imagem']; ?>" witdh="50px" height="50px" alt="..." />

                            <!-- Product details-->
                            <div class="card-body p-4">
                                  <h5 class="fw-bolder"><?php echo $p['nome']; ?></h5>
                                    <!-- Product reviews-->
                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                        <div class="bi-star-fill"></div>    
                                    </div>
                                    <!-- Product price-->
                                    <td><?php echo $p['descricao']; ?></td><br>
                                    <td><?php echo "R$".$p['valor']; ?></td> 
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="carrinho.php?ac=add&id=<?php echo $p['cod_produtos']; ?>">Comprar</a></div>
                            </div>
                        </div>
                    </div>

                    <?php $i = 0;
                                }
                                $i++;
                            } ?>                          

                        <!---teste-->
                    </div>
                </div>
            </div>
        </section>