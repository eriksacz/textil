<?php

 $nombre = $_POST['nombre']; 
 $apellido = $_POST['apellido']; 
 $edad = $_POST['edad'];

 require '../../conector/conexion.php';

 $sql = mysqli_query($con,"INSERT INTO `usuario` (`ID_usuario`, `nombre`, `apellido`, `edad`) VALUES (NULL, '$nombre', '$apellido', '$edad')");

 if($sql == TRUE){
 	echo "Registro Correcto XD";
 }

?>