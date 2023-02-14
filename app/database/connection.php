<?php

define('HOST',     'localhost');  
define('DBNAME',   'elegancewinefix');  
define('CHARSET',  'utf8');  
define('USER',     'root');  
define('PASSWORD', ''); 

class connection {

    private static $pdo;
    private function __construct() {  
    } 

    public static function getInstance() {  
        if (!isset(self::$pdo)) {  
          try {  
            $opcoes = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8', PDO::ATTR_PERSISTENT => TRUE);  
            self::$pdo = new PDO("mysql:host=" . HOST . "; dbname=" . DBNAME . "; charset=" . CHARSET . ";", USER, PASSWORD, $opcoes);  
          } catch (PDOException $e) {  
            print "Erro: " . $e->getMessage();  
          }  
        }  
        return self::$pdo;  
      }  
    }

/*
define('HOST',     'localhost');  
define('DBNAME',   'mydb');  
define('CHARSET',  'utf8');  
define('USER',     'root');  
define('PASSWORD', ''); 
*/

?>