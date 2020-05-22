<?php
 $id = $_POST['id'];
 $nofacatura = $_POST['nofacatura']; 
 $proveedor = $_POST['proveedor']; 
 $nopallets = $_POST['nopallets'];

 require '../conector/conexion.php';

 $sql = mysqli_query($con,"UPDATE `usuario` SET `nofacatura` = '$nofacatura', `proveedor` = '$proveedor', `nopallets` = '$nopallets' WHERE `usuario`.`id` = $id");
 
 if($sql == TRUE){
 	echo "Edicion Correcto XD";
 }
?>