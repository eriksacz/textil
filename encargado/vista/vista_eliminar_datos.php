<?php

$ID_usuario = $_POST['ID_usuario'];

require '../../conector/conexion.php';

$sql = mysqli_query($con,"SELECT empleados.nombres, produccion.fecha FROM produccion 
INNER JOIN empleados ON produccion.trabajador_id=empleados.id 
WHERE ID_usuario='$ID_usuario'");

$row = mysqli_fetch_array($sql);

echo "!! Desea Eliminar a ";
echo $trabajador = $row['nombres']; 
echo " "; echo $dibujo = $row['fecha'];

echo " ? ";


?>
<input type="hidden" id="ID_usuario" value="<?php echo $ID_usuario;?>">