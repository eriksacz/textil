<?php

$id = $_POST['id'];

require '../conector/conexion.php';

$sql = mysql_query("SELECT * FROM usuario WHERE id='$id'");
$row = mysql_fetch_array($sql);

echo "!! Desea Eliminar a ";
echo $nofacatura = $row['nofacatura']; 
echo " "; echo $proveedor = $row['proveedor'];

echo " ? ";


?>
<input type="hidden" id="id" value="<?php echo $id;?>">