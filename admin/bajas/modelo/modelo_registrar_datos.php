<?php

 $nonota = $_POST['nonota']; 
 $norollos = $_POST['norollos']; 
 $dibujo = $_POST['dibujo'];
 $proveedor = $_POST['proveedor'];
 $composicion = $_POST['composicion'];
 $lote = $_POST['lote'];
 $maquina = $_POST['maquina'];
 $kilos = $_POST['kilos'];
 $fecha = $_POST['fecha'];

 require '../../../conector/conexion.php';

 $sql1 = mysqli_query($con,"SELECT id FROM dibujos WHERE dibujo ='$dibujo'");
 while ($row = mysqli_fetch_array($sql1)) {
	 $id_dibujo = $row['id'];
 }

 $sql2 = mysqli_query($con,"SELECT id FROM proveedores WHERE proveedor ='$proveedor'");
 while ($row = mysqli_fetch_array($sql2)) {
	 $id_proveedor = $row['id'];
 }


 $sql3 = mysqli_query($con,"SELECT id FROM composiciones WHERE composicion ='$composicion'");
 while ($row = mysqli_fetch_array($sql3)) {
	 $id_composicion = $row['id'];
 }

 $sql6 = mysqli_query($con,"SELECT id FROM lotes WHERE lote ='$lote'");
 while ($row = mysqli_fetch_array($sql6)) {
	 $id_lote = $row['id'];
 }

 $sql7 = mysqli_query($con,"SELECT id FROM maquinas WHERE numero ='$maquina'");
 while ($row = mysqli_fetch_array($sql7)) {
	 $id_maquina = $row['id'];
 }

 $sql = mysqli_query($con,"INSERT INTO `bajas` (`id`, `no_nota`, `no_rollos`, `dibujo_id`, `proveedor_id`, `composicion_id`,
 				  `lote_id`, `maquina_id`, `kilos`, `fecha`) VALUES (NULL, '$nonota', '$norollos', '$id_dibujo', '$id_proveedor', '$id_composicion',
				  '$id_lote', '$id_maquina', '$kilos', '$fecha')");

if (mysqli_query($con, $sql)) {
	echo "New record created successfully";
} else {
	echo "Error: " . $sql . "<br>" . mysqli_error($con);
}

?>