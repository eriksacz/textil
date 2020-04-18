<?php
$ID_usuario = $_POST['ID_usuario'];

require '../../conector/conexion.php';

 $sql = mysqli_query($con,"DELETE FROM `produccion` WHERE `produccion`.`ID_usuario` = $ID_usuario");
 
 if($sql == TRUE){
 	echo "Eliminacion Correcta XD";
 }
?>