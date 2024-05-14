<?php
session_start();
require_once("conexion.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cedula = $_POST["cedula"];
    $fecha = $_POST["fecha"];
    $producto = $_POST["producto"];
    $tot = $_POST["tot"];


   

    
    $insercion = "INSERT INTO compra(Fecha, total, producto, cedula) VALUES 
    ('$fecha','$tot','$producto','$cedula')";
    $resultado_inser = mysqli_query($con, $insercion);
    if ($resultado_inser) {
        echo "
        <script>
            alert('Compra registrada correctamente.'); 
            var val = confirm('¿Deseas descargar el PDF?');
            if (val == true) {
                window.location.href = 'comprobante.php';

            } else {
                // Redirigir al usuario a otra página
                window.location.href = 'home.php';
            }
        </script>";
        
        
        
    } else {
        echo "
        <script>
            alert('Error al registrar la compra.');
        </script>";
        }
                
    }
    

?>