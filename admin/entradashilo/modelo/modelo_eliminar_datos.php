<?php
$id = $_POST['id'];

require '../conector/conexion.php';

 $sql = mysql_query("DELETE FROM `usuario` WHERE `usuario`.`id` = $id");
 
 if($sql == TRUE){
 	echo "Eliminacion Correcta XD";
 }
?>