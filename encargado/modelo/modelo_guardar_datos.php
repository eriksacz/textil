<?php
 require '../../conector/conexion.php';

$ID_usuario = $_POST['ID_usuario'];
 $trabajador = $_POST['trabajador']; 
 $dibujo = $_POST['dibujo']; 
 $hilo = $_POST['hilo'];

 $composicion = $_POST['composicion'];
 $maquina = $_POST['maquina'];
 $turno = $_POST['turno'];
 $lote = $_POST['lote'];
 $fecha = $_POST['fecha'];
 $rollo = $_POST['rollo'];
 $kilos = $_POST['kilos'];

  
$sql = mysqli_query($con,"SELECT id FROM empleados WHERE nombres ='$trabajador'");
while ($row = mysqli_fetch_array($sql)) {
	$id_trabajador = $row['id'];
}
$sql1 = mysqli_query($con,"SELECT id FROM dibujos WHERE dibujo ='$dibujo'");
while ($row = mysqli_fetch_array($sql1)) {
	$id_dibujo = $row['id'];
}
$sql2 = mysqli_query($con,"SELECT id FROM hilos WHERE nombreHilo ='$hilo'");
while ($row = mysqli_fetch_array($sql2)) {
	$id_hilo = $row['id'];
}

//nuevas consultas
$sql3 = mysqli_query($con,"SELECT id FROM composiciones WHERE composicion ='$composicion'");
while ($row = mysqli_fetch_array($sql3)) {
	$id_composicion = $row['id'];
}
$sql4 = mysqli_query($con,"SELECT id FROM maquinas WHERE numero ='$maquina'");
while ($row = mysqli_fetch_array($sql4)) {
	$id_maquina = $row['id'];
}
$sql5 = mysqli_query($con,"SELECT id FROM turnos WHERE turno ='$turno'");
while ($row = mysqli_fetch_array($sql5)) {
	$id_turno = $row['id'];
}
$sql6 = mysqli_query($con,"SELECT id FROM lotes WHERE lote ='$lote'");
while ($row = mysqli_fetch_array($sql6)) {
	$id_lote = $row['id'];
}
//--nuevas consultas


$sqll = mysqli_query($con,"UPDATE `produccion` SET `trabajador_id` = '$id_trabajador', `dibujo_id` = '$id_dibujo',
  `hilo_id` = '$id_hilo',`composicion_id` = '$id_composicion',`maquina_id` = '$id_maquina',`turno_id` = '$id_turno',
  `lote_id` = '$id_lote',`fecha` = '$fecha',`rollo` = '$rollo',`kg` = '$kilos' 
  WHERE `produccion`.`ID_usuario` = $ID_usuario");
 
 if($sqll == TRUE){
 	echo "Edicion Correcto XD";
 }
?>