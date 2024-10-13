<?php
require 'db/Conection.php';

 class Producto {
 private $db;

    public function __construct() {
        $this->db=(new Conection())->getPDO();
    }

    public function actualizarStock($productoId, $stock) {
        try {
            // Preparar la consulta SQL que actualiza el stock
            $sql = "UPDATE productos SET stock = :stock WHERE producto_id = :productoId";
            $stmt = $this->db->prepare($sql);

            // Asignar valores a los parámetros de entrada a la DB
            $stmt->bindParam(':stock', $stock, PDO::PARAM_INT);
            $stmt->bindParam(':productoId', $productoId, PDO::PARAM_INT);

            // Ejecución de la consulta
            if ($stmt->execute()) {
                return ['success' => true, 'message' => 'Stock actualizado correctamente'];
            } else {
                return ['success' => false, 'message' => 'No se pudo actualizar el stock'];
            }
        } catch (Exception $e) {
            return ['success' => false, 'message' => 'Error: ' . $e->getMessage()];
        }
    }


 }
?>