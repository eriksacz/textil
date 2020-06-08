<?php
$id = $_POST['id'];

require '../../../conector/conexion.php';

 $sql = mysqli_query($con,"DELETE FROM `bajas` WHERE `bajas`.`id` = $id");
 
 if($sql == TRUE){
 	echo "Eliminacion Correcta XD";
 }
?>