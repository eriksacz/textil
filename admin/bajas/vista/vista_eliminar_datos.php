<?php

$id = $_POST['id'];

require '../conector/conexion.php';

$sql = mysqli_query($con,"SELECT * FROM bajas WHERE id='$id'");
$row = mysqli_fetch_array($sql);

echo "!! Desea Eliminar a ";
echo $nonota = $row['no_nota']; 
echo " con fecha del "; echo $norollos = $row['fecha'];

echo " ? ";


?>
<input type="hidden" id="id" value="<?php echo $id;?>">