<?php

$id = $_POST['id'];

require '../conector/conexion.php';

$sql = mysqli_query($con,"SELECT * FROM altas WHERE id='$id'");
$row = mysqli_fetch_array($sql);

echo "!! Desea Eliminar la Factura --> ";
echo $nofacatura = $row['no_factura']; 
//echo " "; echo $proveedor = $row['proveedor'];

echo " ? ";


?>
<input type="hidden" id="id" value="<?php echo $id;?>">