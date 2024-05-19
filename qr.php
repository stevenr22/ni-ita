<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear PDF con QR</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
    



</head>

<body>
    <div class="container">
        <div class="card" id="card-qr">
            <div class="card-header">
                <div class="card-title">
                    <h2><b>INFORMACION DE LA COMPRA</b></h2>
                </div>
            </div>
            <div class="card-body">
                <?php
    // Conexión a la base de datos
    require_once("conexion.php");

    // Consulta SQL para seleccionar todos los registros de la tabla compra
    $query = "SELECT * FROM compra";
    $resultado = mysqli_query($con, $query);

    // Verificar si hay resultados
    if(mysqli_num_rows($resultado) > 0) {
        // Iterar sobre los resultados y mostrar cada compra como un recibo
        while($fila = mysqli_fetch_assoc($resultado)) {
            echo "<div class='recibo'>";
            echo "<h1>RECIBO DE COMPRA #" . $fila['ID_Compra'] . "</h1>";
            echo "<div class='info'>";
            echo "<p><strong>Fecha:</strong> " . $fila['Fecha'] . "</p>";
            echo "<p><strong>Total:</strong> $" . $fila['total'] . "</p>";
            echo "<p><strong>Producto:</strong> " . $fila['producto'] . "</p>";
            echo "<p><strong>Cédula:</strong> " . $fila['cedula'] . "</p>";
            echo "<hr></hr>";
            // Agrega más detalles según sea necesario
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "No se encontraron resultados.";
    }

    // Cerrar conexión
    mysqli_close($con);
    ?>
            </div>



        </div>
    </div>

</body>

</html>