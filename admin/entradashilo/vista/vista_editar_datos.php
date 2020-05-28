<?php

$id = $_POST['id'];

require '../conector/conexion.php';

$sql = mysqli_query($con,"SELECT altas.id,altas.no_factura,altas.no_pallets,altas.kilos,proveedores.proveedor, 
composiciones.composicion,lotes.lote 
from altas 
INNER JOIN proveedores on altas.proveedor_id = proveedores.id 
INNER JOIN composiciones on altas.composicion_id = composiciones.id 
INNER JOIN lotes on altas.lote_id = lotes.id 
WHERE altas.id='$id'");


$row = mysqli_fetch_array($sql);

$nofacatura = $row['no_factura']; 
$nopallets = $row['no_pallets'];
$kilos = $row['kilos'];
$proveedor = $row['proveedor'];
$composicion = $row['composicion'];
$lote = $row['lote'];

?>
<input type="hidden" id="id" value="<?php echo $id; ?>">
<label for="nofacatura"> Nº Facatura </label>
<input type="text" class="form-control" id="nofactura_ed" placeholder="* Nº factura " value="<?php echo $nofacatura; ?>">

<label for="nopallets"> Nº Pallets </label>
<input type="text" class="form-control" id="nopallets_ed" placeholder="* Nº pallets " value="<?php echo $nopallets; ?>">

<label for="kilos"> kilos </label>
<input type="text" class="form-control" id="kilos_ed" placeholder="* kilos " value="<?php echo $kilos; ?>">


                    <label for="inputState">Proveedor</label></td>
					<select id="proveedor_ed" class="form-control">
					<option selected><?php echo $proveedor; ?></option>
					<?php
					$sql = mysqli_query($con,"SELECT * FROM proveedores");
					while($fila=$sql->fetch_array()){
						echo "<option value='".$fila['proveedor']."'>".$fila['proveedor']."</option>";
					}
					?>
					</select>

                    
                    <label for="inputState">Composicion</label></td>
					<select id="composicion_ed" class="form-control">
					<option selected><?php echo $composicion; ?></option>
					<?php
					$sql = mysqli_query($con,"SELECT * FROM composiciones");
					while($fila=$sql->fetch_array()){
						echo "<option value='".$fila['composicion']."'>".$fila['composicion']."</option>";
					}
					?>
					</select>


                    <label for="inputState">Lotes</label></td>
					<select id="lote_ed" class="form-control">
					<option selected><?php echo $lote; ?></option>
					<?php
					$sql = mysqli_query($con,"SELECT * FROM lotes");
					while($fila=$sql->fetch_array()){
						echo "<option value='".$fila['lote']."'>".$fila['lote']."</option>";
					}
					?>
					</select>
