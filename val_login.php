<?php
session_start();
require_once("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usu = $_POST["usu"];
    $contra = $_POST["pass"];
    $query = "SELECT * FROM usuario WHERE nombre_usuario = '$usu' and contrasena = '$contra'";
    $resultado = mysqli_query($con, $query);


    if(mysqli_num_rows($resultado) > 0) {
        $usuario = mysqli_fetch_assoc($resultado);
        $_SESSION['usuario'] = $usuario;
        echo "
        <script>
            window.location = 'home.php';
        </script>
       
        ";
        
    } else {
        echo "
        <script>
            alert(' Usuario no encontrado.');
            window.location = 'index.html';
        </script>
       
        ";    }
}

?>