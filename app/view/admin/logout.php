<?php 
session_start();
session_destroy();
//header("Location: readCategoria.php");
header("Location: ../auth/AuthView.php");

?>