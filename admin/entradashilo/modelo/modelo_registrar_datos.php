<?php

 $nofacatura = $_POST['nofacatura']; 
 $proveedor = $_POST['proveedor']; 
 $nopallets = $_POST['nopallets'];
 $composicion = $_POST["composicion"];
 $lote = $_POST["lote"];
 $kilos = $_POST["kilos"];
 $fecha = $_POST["fecha"];



 require '../../../conector/conexion.php';



 $sql2 = mysqli_query($con,"SELECT id FROM hilos WHERE nombreHilo ='$proveedor'");
 while ($row = mysqli_fetch_array($sql2)) {
	 $id_hilo = $row['id'];
 }

 $sql3 = mysqli_query($con,"SELECT id FROM composiciones WHERE composicion ='$composicion'");
while ($row = mysqli_fetch_array($sql3)) {
	$id_composicion = $row['id'];
}

$sql6 = mysqli_query($con,"SELECT id FROM lotes WHERE lote ='$lote'");
while ($row = mysqli_fetch_array($sql6)) {
	$id_lote = $row['id'];
}


 $sql = mysqli_query($con,"INSERT INTO `altas` (`id`, `no_factura`, `proveedor_id`, `no_pallets`,
                                                          `composicion_id`, `lote_id`, `kilos`, `fecha`) 
 VALUES (NULL, '$nofacatura', '$id_hilo', '$nopallets', '$id_composicion', '$id_lote', '$kilos', '$fecha')");

 //if($sql == TRUE){
 	//echo "Registro Correcto XD";
 //}else{
	//echo mysqli_error ($sql);
//	echo("Error description: " . $sql -> error);
 //}

 if (mysqli_query($con, $sql)) {
	echo "New record created successfully";
} else {
//	echo "Error: " . $sql . "<br>" . mysqli_error($con);
}


?>