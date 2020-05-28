<?php
 $id = $_POST['id'];
 $nofactura = $_POST['nofactura'];  
 $nopallets = $_POST['nopallets'];
 $kilos = $_POST['kilos'];

 require '../conector/conexion.php';

 $sql = mysqli_query($con,"UPDATE `altas` SET `no_factura` = '$nofactura', 
 `no_pallets` = '$nopallets', `kilos` = '$kilos' WHERE `altas`.`id` = $id");
 
 if($sql == TRUE){
 	echo "Edicion Correcto XD";
 }
?>