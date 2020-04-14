<?php

$ID_usuario = $_POST['ID_usuario'];

require '../../conector/conexion.php';

$sql = mysqli_query($con,"SELECT * FROM usuario WHERE ID_usuario='$ID_usuario'");
$row = mysqli_fetch_array($sql);

$nombre = $row['nombre']; 
$apellido = $row['apellido'];
$edad = $row['edad'];

?>
<input type="hidden" id="ID_usuario" value="<?php echo $ID_usuario; ?>">
<label for="nombre"> Nombre </label>
<input type="text" class="form-control" id="nombre_ed" placeholder="* Nombre " value="<?php echo $nombre; ?>">

<label for="apellido"> Apellido </label>
<input type="text" class="form-control" id="apellido_ed" placeholder="* Apellido " value="<?php echo $apellido; ?>">

<label for="edad"> Edad </label>
<input type="text" class="form-control" id="edad_ed" placeholder="* Edad " value="<?php echo $edad; ?>">