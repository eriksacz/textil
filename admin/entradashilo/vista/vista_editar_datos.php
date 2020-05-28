<?php

$id = $_POST['id'];

require '../conector/conexion.php';

$sql = mysqli_query($con,"SELECT * FROM altas WHERE id='$id'");
$row = mysqli_fetch_array($sql);

$nofacatura = $row['no_factura']; 
$nopallets = $row['no_pallets'];
$kilos = $row['kilos'];

?>
<input type="hidden" id="id" value="<?php echo $id; ?>">
<label for="nofacatura"> Nº Facatura </label>
<input type="text" class="form-control" id="nofactura_ed" placeholder="* Nº factura " value="<?php echo $nofacatura; ?>">

<label for="nopallets"> Nº Pallets </label>
<input type="text" class="form-control" id="nopallets_ed" placeholder="* Nº pallets " value="<?php echo $nopallets; ?>">

<label for="kilos"> kilos </label>
<input type="text" class="form-control" id="kilos_ed" placeholder="* kilos " value="<?php echo $kilos; ?>">