<?php
function obtenerDetallesPorTicketId($ticket_id) {
    require_once("conexion.php");

    // Preparar la consulta SQL utilizando una sentencia preparada
    $sql = "SELECT * FROM boletos WHERE ticket_id = ?";
    $stmt = $con->prepare($sql);

    // Vincular el parámetro
    $stmt->bind_param("i", $ticket_id);

    // Ejecutar la consulta
    $stmt->execute();

    // Obtener el resultado de la consulta
    $resultado = $stmt->get_result();

    // Verificar si se encontraron detalles relacionados con el ticket_id especificado
    if ($resultado->num_rows > 0) {
        // Inicializar un array para almacenar los detalles
        $detalles = array();

        // Obtener los detalles y agregarlos al array
        while ($fila = $resultado->fetch_assoc()) {
            $detalles[] = $fila;
        }

        // Cerrar el statement
        $stmt->close();

        // Devolver el array de detalles
        return $detalles;
    } else {
        // Cerrar el statement
        $stmt->close();

        // Si no se encuentran detalles relacionados con el ticket_id especificado, devolver un array vacío
        return array();
    }

    // Cerrar la conexión a la base de datos
    $con->close();
}

?>
