<?php

$id = $_POST['id'];

require '../conector/conexion.php';

$sql = mysql_query("SELECT * FROM usuario WHERE id='$id'");
$row = mysql_fetch_array($sql);

$nofacatura = $row['nofacatura']; 
$proveedor = $row['proveedor'];
$nopallets = $row['nopallets'];

?>
<input type="hidden" id="id" value="<?php echo $id; ?>">
<label for="nofacatura"> nofacatura </label>
<input type="text" class="form-control" id="nofacatura_ed" placeholder="* nofacatura " value="<?php echo $nofacatura; ?>">

<label for="proveedor"> proveedor </label>
<input type="text" class="form-control" id="proveedor_ed" placeholder="* proveedor " value="<?php echo $proveedor; ?>">

<label for="nopallets"> nopallets </label>
<input type="text" class="form-control" id="nopallets_ed" placeholder="* nopallets " value="<?php echo $nopallets; ?>">