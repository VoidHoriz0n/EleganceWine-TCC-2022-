<?php 

include_once ('../../database/connection.php');
$pdo = connection::getInstance();  

if (isset($_POST['Cadastrar_se'])) {

    $nome     = isset($_POST['nome']) ? $_POST['nome'] : null;
    $usuario      = isset($_POST['usuario']) ? $_POST['usuario'] : null;
    $email    = isset($_POST['email']) ? $_POST['email'] : null;
    $senha    = isset($_POST['password']) ? md5($_POST['password']) : null;

    if(empty($nome) || empty($usuario) || empty($email) || empty($senha))
    {
        echo "Necessário informar todos os campos";
        exit();
    } 

    $sql = "INSERT INTO tb_registros (nome, usuario, senha, email, nivel) VALUES ( :n, :u, :s, :e, 1);";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':n', $nome);
    $stmt->bindParam(':u', $usuario);
    $stmt->bindParam(':e', $email);
    $stmt->bindParam(':s', $senha);
    //$stmt->execute();

    
    if ($stmt->execute()){
        echo "Você foi cadastrado com sucesso";
    } else {
        echo "Por favor insira os dados da maneira correta";
    }
}
?>