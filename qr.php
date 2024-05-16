<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear PDF con QR</title>
    <link rel="stylesheet" href="bootstrap.css">
</head>

<body>

    <div class="container mt-5">
        <button type="submit" onclick="crearpdf();" class="btn btn-info">CREAR PDF</button>
        <!-- Aquí agregamos el contenedor del código QR -->
        <div id="qrCodeContainer"></div>
    </div>

    <script src="jspdf.min.js"></script>
    <script src="qrcode.min.js"></script>
    <script>
    function crearpdf() {
        // Crear un nuevo objeto jsPDF
        var doc = new jsPDF();

        // Agregar contenido al PDF
        doc.text("¡Hola, este es un PDF generado dinámicamente!", 10, 10);

        // Generar el Blob a partir del contenido del PDF
        var blob = doc.output("blob");

        // Crear un objeto URL para el Blob
        var url = URL.createObjectURL(blob);


        // Generar el código QR
        var qr = new QRCode(document.getElementById("qrCodeContainer"), {
            text: url,
            width: 128,
            height: 128,
        });

        // Obtener el código QR como imagen
        var canvas = document.getElementById("qrCodeContainer").getElementsByTagName("canvas")[0];
        var imgData = canvas.toDataURL('image/jpeg');

        // Agregar el código QR al PDF
        doc.addImage(imgData, 'JPEG', 10, 40, 50, 50);

        // Guardar el PDF
        doc.save("mi_pdf_con_qr.pdf");
    }
    </script>

</body>

</html>