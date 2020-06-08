<?php
 $id = $_POST['id'];
 $nofactura = $_POST['nofactura'];  
 $nopallets = $_POST['nopallets'];
 $kilos = $_POST['kilos'];
 $proveedor = $_POST['proveedor'];
 $composicion = $_POST['composicion'];
 $lote = $_POST['lote'];

 require '../../../conector/conexion.php';

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
 
 $sql = mysqli_query($con,"UPDATE `altas` SET `no_factura` = '$nofactura',`no_pallets` = '$nopallets', 
 `kilos` = '$kilos', `lote_id` = '$id_lote', `composicion_id` = '$id_composicion', `proveedor_id` = '$id_proveedor' 
 WHERE `altas`.`id` = $id");
 
 if($sql == TRUE){
 	echo "Edicion Correcto XD";
 }
?>