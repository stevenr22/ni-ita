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
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <title>Registro de Compra</title>
</head>
<body>
    <div class="container" style="background-color: aliceblue; padding: 20px 20px 20px 20px;">
    <div class="card">
        <div class="card-title">
            <h4 class="text-center mb-0">Bienvenido, <b><?php echo $nombre_completo; ?></b></h4>


        </div>
    </div>
    <br>
        <div class="card">
            <div class="card-header">
                <h2><b>REGISTRO DE COMPRA</b></h2>
            </div>
           
            <div class="card-body">
                <form action="regis.php" class="form-group" method="post">
                    <input type="hidden" name="cedula" value="<?php echo $id_usuario?>">
                    <label for="fecha" class="form-label"><b>Fecha:</b></label>
                    <br>
                    <input type="date" class="form-control" name="fecha" id="fecha" required>
                    <br>

                    <label for="producto" class="form-label"><b>Producto:</b></label>
                    <br>
                    <select class="form-control" name="producto" id="producto" required>
                        <option value="">Selecciona un producto</option>                        
                        <!-- Aquí puedes llenar las opciones del select con los proveedores de la base de datos -->
                        <option value="1">producto 1</option>
                        <option value="2">producto 2</option>
                        <!-- Agrega más opciones según sea necesario -->
                    </select>
                    <br>
                    <label for="total" class="form-label"><b>Total:</b></label>
                    <br>
                    <input type="text" onkeypress="return solonum(event)" class="form-control" name="tot" id="tot" placeholder="Ingrese el total" required>
                    <br>

                   

                    <!-- Agrega más campos según sea necesario, como los detalles de la compra -->

                    <button type="submit" class="btn btn-primary">Registrar</button>
                </form>
            
                

            </div>
            

            

        </div>
        <br>
        <div class="card">
            <div class="row">

                <button onclick="cerrarSesion();"  type="submit">Cerrar sesión</button>
            </div>

        </div>
    </div>
    <script src="main.js"></script>
    <script>
        function cerrarSesion(){
            window.location = 'cerrar_sesion.php';
        }

        
    </script>
    

   
</body>
</html>
