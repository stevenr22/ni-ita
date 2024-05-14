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
    <title>Descargando PDF</title>
</head>

<body>
    <script>
    function crearPdf() {
        // Crear un nuevo objeto jsPDF
        var doc = new jsPDF();

        // Agregar contenido al PDF
        doc.text(20, 20, 'Este es un PDF generado dinámicamente.');

        // Obtener la información para el código QR
        var qrData =
        'https://tecnops.es/generando-codigo-qr-con-javascript/'; // Puedes modificar esto según tu necesidad

        // Generar el código QR
        var qrCodeImage = generarQR(qrData);

        // Agregar el código QR al PDF
        doc.addImage(qrCodeImage, 'PNG', 20, 50, 50, 50); // Ajusta las coordenadas y el tamaño según sea necesario

        // Guardar el PDF
        doc.save('qr.pdf');
    }

    // Función para generar un código QR con la información proporcionada
    function generarQR(data) {
        // Generar el código QR con qrcode.js
        var qrCode = new QRCode(document.createElement('div'), {
            text: data,
            width: 100, // Puedes ajustar el tamaño según sea necesario
            height: 100, // Puedes ajustar el tamaño según sea necesario
            colorDark: "#000000", // Color oscuro
            colorLight: "#ffffff", // Color claro
            correctLevel: QRCode.CorrectLevel.H // Nivel de corrección de errores
        });

        // Obtener la imagen del código QR
        var qrCodeImage = qrCode._el.firstChild.toDataURL('image/png'); // Convertir a base64

        // Devolver la imagen del código QR en formato base64
        return qrCodeImage;
    }
    </script>

    <!-- Incluye la biblioteca jsPDF -->
    <script src="jspdf.min.js"></script>
    <!-- Incluye la biblioteca QRCode -->
    <script src="qrcode.js"></script>







</body>

</html>