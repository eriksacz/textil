<?php

 $nofacatura = $_POST['nofacatura']; 
 $proveedor = $_POST['proveedor']; 
 $nopallets = $_POST['nopallets'];

 require '../conector/conexion.php';

 $sql = mysqli_query($con,"INSERT INTO `usuario` (`id`, `nofacatura`, `proveedor`, `nopallets`) 
 VALUES (NULL, '$nofacatura', '$proveedor', '$nopallets')");

 if($sql == TRUE){
 	echo "Registro Correcto XD";
 }

?>