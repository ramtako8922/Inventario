<?php
 class Conection{
    private $host=''; //nombre del servidor
    private $db=''; // nombre db
    private $user=''; //usuario db
    private $password='';// password db;
    private $charset = 'utf8mb4';
    private $pdo;
 

//Constructor

public function __construct() {
   $dsn = "mysql:host=$this->host;dbname=$this->db;charset=$this->charset";
   try {
       $this->pdo = new PDO($dsn, $this->user, $this->password);
       $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   } catch (PDOException $e) {
       throw new Exception('Error de conexión a la base de datos: ' . $e->getMessage());
   }
}

public function getPDO() {
   return $this->pdo;
}
}
?>