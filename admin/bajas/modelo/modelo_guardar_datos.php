<?php

 $id = $_POST['id'];
 $nonota = $_POST['nonota']; 
 $norollos = $_POST['norollos']; 
 $dibujo = $_POST['dibujo'];
 $proveedor = $_POST['proveedor'];
 $lote = $_POST['lote'];
 $composicion = $_POST['composicion'];
 $maquina = $_POST['maquina'];
 $kilos = $_POST['kilos'];
 $fecha = $_POST['fecha'];
 
 require '../../../conector/conexion.php';

 $sql1 = mysqli_query($con,"SELECT id FROM dibujos WHERE dibujo ='$dibujo'");
 while ($row = mysqli_fetch_array($sql1)) {
	 $id_dibujo = $row['id'];
 }

 $sql6 = mysqli_query($con,"SELECT id FROM lotes WHERE lote ='$lote'");
 while ($row = mysqli_fetch_array($sql6)) {
	 $id_lote = $row['id'];
 }
 
 $sql3 = mysqli_query($con,"SELECT id FROM composiciones WHERE composicion ='$composicion'");
 while ($row = mysqli_fetch_array($sql3)) {
	 $id_composicion = $row['id'];
 }
  
 $sql4 = mysqli_query($con,"SELECT id FROM proveedores WHERE proveedor ='$proveedor'");
 while ($row = mysqli_fetch_array($sql4)) {
	 $id_proveedor = $row['id'];
 }

 $sql5 = mysqli_query($con,"SELECT id FROM maquinas WHERE numero ='$maquina'");
 while ($row = mysqli_fetch_array($sql5)) {
	 $id_maquina = $row['id'];
 }

 $sql = mysqli_query($con,"UPDATE `bajas` SET `no_nota` = '$nonota', `no_rollos` = '$norollos', `dibujo_id` = '$id_dibujo',
							 `proveedor_id` = '$id_proveedor', `composicion_id` = '$id_composicion', `lote_id` = '$id_lote',
							 `maquina_id` = '$id_maquina', `kilos` = '$kilos', `fecha` = '$fecha'
						  	  WHERE `bajas`.`id` = $id");
 
 if (mysqli_query($con, $sql)) {
	echo "New record created successfully";
} else {
echo "Error: " . $sql . "<br>" . mysqli_error($con);
}

?>