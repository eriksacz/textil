<?php

$id = $_POST['id'];

require '../conector/conexion.php';

$sql = mysqli_query($con,"SELECT * FROM altas WHERE id='$id'");
$row = mysqli_fetch_array($sql);

$nofacatura = $row['no_factura']; 
$nopallets = $row['no_pallets'];

?>
<input type="hidden" id="id" value="<?php echo $id; ?>">
<label for="nofacatura"> nofacatura </label>
<input type="text" class="form-control" id="nofacatura_ed" placeholder="* nofacatura " value="<?php echo $nofacatura; ?>">

<label for="nopallets"> nopallets </label>
<input type="text" class="form-control" id="nopallets_ed" placeholder="* nopallets " value="<?php echo $nopallets; ?>">