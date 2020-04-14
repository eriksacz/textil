<?php

$ID_usuario = $_POST['ID_usuario'];

require '../../conector/conexion.php';

$sql = mysqli_query($con,"SELECT * FROM usuario WHERE ID_usuario='$ID_usuario'");
$row = mysqli_fetch_array($sql);

echo "!! Desea Eliminar a ";
echo $nombre = $row['nombre']; 
echo " "; echo $apellido = $row['apellido'];

echo " ? ";


?>
<input type="hidden" id="ID_usuario" value="<?php echo $ID_usuario;?>">