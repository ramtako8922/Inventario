<?php
 class Conection{
    private $host='localhost';
    private $db='inventario';
    private $user='root';
    private $password='123456';
    private $charset = 'utf8mb4';
    private $pdo;
 }

//Constructor

 public function __construct() {
    $dsn="mysql:host=$this->host;dbname=$this->db;charset=$this->charset";
  try {
     $this->pdo=new PDO($dsn, $this->$user,$this->$password);
     $this->pdo=setAtribute(PDO::ATTR_ERRMODE,PDO::ERR_MODE_EXCEPTION);

  } catch (PDOException $e) {
    throw new Exception("Error al conectarse a la base de datos" . $e->getMessage());
  }
 }


    //metodo getter para obtener atributo privado desde otra clase
    
   public function getPDO(){
      return $this->pdo;
   }
?>