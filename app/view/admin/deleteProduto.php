<?php 
include_once "../../database/connection.php";
include_once "../../class/crud.class.php";

$pdo = connection::getInstance();  
$crud = Crud::getInstance($pdo, 'tb_produtos');

$id = $_GET['id'];

 // Exclui o registro do usuário com id ? 

 $arrayCond = array('cod_produtos=' => $id);  
 $retorno   = $crud->delete($arrayCond);  
 header('Refresh: 1; url=index.php');
?>