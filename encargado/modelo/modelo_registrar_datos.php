<?php
require '../../conector/conexion.php';

 $trabajador = $_POST['trabajador']; 
 $dibujo = $_POST['dibujo']; 
 $hilo = $_POST['hilo'];

 
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

 $sqll = mysqli_query($con,"INSERT INTO `produccion` (`ID_usuario`, `trabajador_id`, `dibujo_id`, `hilo_id`) 
										   VALUES (NULL, '$id_trabajador', '$id_dibujo', '$id_hilo')");
										   

 if($sqll == TRUE){
 	echo "Registro Correcto XD";
 }

?>