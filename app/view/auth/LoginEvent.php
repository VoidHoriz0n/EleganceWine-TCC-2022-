<?php
session_start();
include_once ('../../database/connection.php');
$pdo = connection::getInstance();
?>

<?php
if (isset($_POST['logar'])) {
    
    $email    = isset($_POST['email']) ? $_POST['email'] : null;
    $senha    = isset($_POST['password']) ? md5 ($_POST['password']) : null;

    if(empty($email) && empty($senha)){
        echo "Necessário informar email e senha";
        exit();
    }
//onclick="return confirm('Tem certeza que deseja deletar esse registro?');">
    $sql = "SELECT * FROM tb_registros WHERE email = :e AND senha = :s";
    
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':e', $email);
    $stmt->bindParam(':s', $senha);
    $stmt->execute();
    $user = $stmt->fetch();



    
    if ($stmt->rowCount() > 0) {
///gambiarra
        
        $_SESSION['idcliente'] = strtoupper($user[0]); 
    
        $sql = "SELECT * FROM tb_clientes WHERE cod_cliente = :cli";
    
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':cli', $user[1]);
        $stmt->execute();
        $cli = $stmt->fetch();

        //$_SESSION['idcliente'] = $user['cod_cliente'];
        var_dump ($_SESSION['idcliente']); //exibir dados da variavel


///gambiarra
        $_SESSION['email'] = $user['email'];
        $_SESSION['nome'] = $user['nome'];
        $_SESSION['usuario'] = $user['usuario'];
        $_SESSION['nivel'] = $user['nivel'];

        if ($_SESSION['nivel'] == 0) {
            header("Location: index.php");
        } elseif ($_SESSION['nivel'] == 1) {
            header("Location: url=../../../client/ClientAction.php");
        } else {
            header("Location: url=../../../admin/index.php");
        }
    } else {
        echo "Usuário ou senha invalidos";
        exit();
    }




}
?>
