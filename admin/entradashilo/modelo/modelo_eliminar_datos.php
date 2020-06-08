<?php
$id = $_POST['id'];
require '../../../conector/conexion.php';
 $sql = mysqli_query($con,"DELETE FROM `altas` WHERE `altas`.`id` = $id");
 if($sql == TRUE){
 	echo "Eliminacion Correcta XD";
 }
?>

