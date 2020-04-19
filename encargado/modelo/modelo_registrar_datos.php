<?php
require '../../conector/conexion.php';

 $trabajador = $_POST['trabajador']; 
 $dibujo = $_POST['dibujo']; 
 $hilo = $_POST['hilo'];

 //nuevos datos
 $composicion = $_POST['composicion'];
 $maquina = $_POST['maquina'];
 $turno = $_POST['turno'];
 $lote = $_POST['lote'];
 $fecha = $_POST['fecha'];
 $rollo = $_POST['rollo'];
 $kilos = $_POST['kilos'];
 //--nuevos datos

 
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

 $sqll = mysqli_query($con,"INSERT INTO `produccion` (`ID_usuario`, `trabajador_id`, `dibujo_id`, `hilo_id`,
                                `composicion_id`, `maquina_id`, `turno_id`, `lote_id`, `fecha`, `rollo`, `kg`) 
					VALUES (NULL, '$id_trabajador', '$id_dibujo', '$id_hilo', '$id_composicion', '$id_maquina',
					 '$id_turno', '$id_lote', '$fecha', '$rollo', '$kilos')");
										   

 if($sqll == TRUE){
 	echo "Registro Correcto XD";
 }

?>