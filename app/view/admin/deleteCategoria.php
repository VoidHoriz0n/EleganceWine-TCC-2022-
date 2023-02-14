<?php 
include_once "../../database/connection.php";
include_once "../../class/crud.class.php";

$pdo = conecction::getInstance();  
$crud = Crud::getInstance($pdo, 'tb_categoria');

$id = $_GET['id'];

 // Exclui o registro do usuário com id ? 

 $arrayCond = array('cod_Categoria=' => $id);  
 $retorno   = $crud->delete($arrayCond);  
 header('Refresh: 1; url=CategoriesView.php');
?>