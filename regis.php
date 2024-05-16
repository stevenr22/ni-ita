<?php
session_start();
require_once("conexion.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cedula = $_POST["cedula"];
    $fecha = $_POST["fecha"];
    $producto = $_POST["producto"];
    $tot = $_POST["tot"];

    $insercion = "INSERT INTO compra(Fecha, total, producto, cedula) VALUES ('$fecha','$tot','$producto','$cedula')";
    $resultado_inser = mysqli_query($con, $insercion);
    if ($resultado_inser) {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: '¡Compra registrada correctamente!',
                    text: '¿Deseas descargar el PDF?',
                    icon: 'success',
                    showCancelButton: true,
                    confirmButtonText: 'Sí',
                    cancelButtonText: 'No'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'comprobante.php';
                    } else {
                        window.location.href = 'home.php';
                    }
                });
            });
        </script>";
    } else {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: '¡Error!',
                    text: 'Error al registrar la compra.',
                    icon: 'error'
                });
            });
        </script>";
    }
}
?>
