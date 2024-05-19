<?php
session_start();
if(isset($_SESSION['usuario'])) {
    $nombre = $_SESSION['usuario']['nombre'];
    $apellido = $_SESSION['usuario']['apellido'];
    $nombre_completo = $nombre." ".$apellido;
    $id_usuario = $_SESSION['usuario']['cedula'];
} else {
    header("Location: index.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Descargar PDF</title>


</head>

<body>

    <script src="jspdf.min.js"></script>
    <!-- Incluye la biblioteca QRCode -->
    <script src="qrcode.js"></script>


    <script>
    function crearPdf() {
        // Cargar la librería jsPDF
        const {
            jsPDF
        } = window.jspdf;

        // Crear una nueva instancia de jsPDF
        const doc = new jsPDF();

        // Agregar contenido al PDF
        doc.text("Hola mundo!", 10, 10);

        // Descargar el PDF con el nombre especificado
        doc.save("ejemplo.pdf");
    }
    </script>
</body>

</html>