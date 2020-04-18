<?php
 $ID_usuario = $_POST['ID_usuario'];
 $trabajador = $_POST['trabajador']; 
 $dibujo = $_POST['dibujo']; 
 $hilo = $_POST['hilo'];

 require '../../conector/conexion.php';



  
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


$sqll = mysqli_query($con,"UPDATE `produccion` SET `trabajador_id` = '$id_trabajador', `dibujo_id` = '$id_dibujo',
  `hilo_id` = '$id_hilo' WHERE `produccion`.`ID_usuario` = $ID_usuario");
 
 if($sqll == TRUE){
 	echo "Edicion Correcto XD";
 }
?>