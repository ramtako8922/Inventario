<?php

require 'data/Producto.php';

// Configurar la respuesta como JSON
header('Content-Type: application/json');

try {
    // Obtener los datos del POST en formato JSON
    $input = json_decode(file_get_contents('php://input'), true);

    // Validar que los parámetros sean correctos
    if (!isset($input['producto_id']) || !isset($input['stock'])) {
        throw new Exception('Faltan parámetros necesarios');
    }

    // Obtener parámetros
    $productoId = $input['producto_id'];
    $stock = $input['stock'];

    // Instanciar la clase Producto y actualizar el stock
    $producto = new Producto();
    $resultado = $producto->actualizarStock($productoId, $stock);

    // Enviar la respuesta en formato JSON
    echo json_encode($resultado);
} catch (Exception $e) {
    
    // Manejar errores y enviar respuesta en JSON
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}
?>