<?php
require_once("conexion.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $cedula = $_POST["ced"];
    $nombre_usu = $_POST["nombre_usu"];
    $contra = $_POST["pass"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $correo = $_POST["email"];


    //verificar si estan en la base
    $consulta = "SELECT * FROM usuario WHERE cedula = '$cedula'";
    $resultado = mysqli_query($con, $consulta);

    if (mysqli_num_rows($resultado) > 0) {
        echo "
            <script> 
                alert('USUARIO REGISTRADO'); 
                window.location.href = 'registro.html';
            </script>";

    } else {
        $sql = "INSERT INTO usuario (cedula, nombre_usuario, contrasena, nombre, apellido, correo) 
        VALUES ('$cedula', '$nombre_usu','$contra', '$nombre', '$apellido', '$correo')";
        
        if(mysqli_query($con, $sql)){
            echo "
            <script> 
                alert('REGISTRO EXITOSO'); 
                window.location.href = 'index.html';
            </script>";

        } else {
            echo "Error al registrar los datos: " . mysqli_error($con);
        }
    }
    mysqli_close($con);

}


?>