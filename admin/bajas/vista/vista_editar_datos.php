<?php

$id = $_POST['id'];

require '../conector/conexion.php';

$sql = mysqli_query($con,"SELECT bajas.id,bajas.no_nota, bajas.no_rollos,bajas.fecha,bajas.kilos, dibujos.dibujo, proveedores.proveedor,
composiciones.composicion, lotes.lote, maquinas.numero 
FROM bajas 
INNER JOIN dibujos on bajas.dibujo_id = dibujos.id 
INNER JOIN proveedores on bajas.proveedor_id = proveedores.id 
INNER JOIN composiciones on bajas.composicion_id = composiciones.id 
INNER JOIN lotes on bajas.lote_id = lotes.id 
INNER JOIN maquinas on bajas.maquina_id = maquinas.id 
WHERE bajas.id='$id'");

$row = mysqli_fetch_array($sql);

    $nonota = $row['no_nota'];
	$norollos = $row['no_rollos'];
	$dibujo = $row['dibujo'];
	$proveedor = $row['proveedor'];
	$composicion = $row['composicion'];
	$lote = $row['lote'];
	$maquina = $row['numero'];
	$kilos = $row['kilos'];
	$fecha = $row['fecha'];
?>
<input type="hidden" id="id" value="<?php echo $id; ?>">
<label for="nonota"> nonota </label>
<input type="text" class="form-control" id="nonota_ed" placeholder="* nonota " value="<?php echo $nonota; ?>">

<label for="norollos"> norollos </label>
<input type="text" class="form-control" id="norollos_ed" placeholder="* norollos " value="<?php echo $norollos; ?>">




					<label for="inputState">Dibujo</label></td>
					<select id="dibujo_ed" class="form-control">
					<option selected><?php echo $dibujo; ?></option>
					<?php
					$sql = mysqli_query($con,"SELECT * FROM dibujos");
					while($fila=$sql->fetch_array()){
						echo "<option value='".$fila['dibujo']."'>".$fila['dibujo']."</option>";
					}
					?>
                    </select>

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
                    <label for="inputState">Maquina</label></td>
					<select id="maquina_ed" class="form-control">
					<option selected><?php echo $maquina; ?></option>
					<?php
					$sql = mysqli_query($con,"SELECT * FROM maquinas");
					while($fila=$sql->fetch_array()){
						echo "<option value='".$fila['numero']."'>".$fila['numero']."</option>";
					}
					?>
                    </select>
        <label for="kilos"> kilos </label>
        <input type="text" class="form-control" id="kilos_ed" placeholder="* kilos " value="<?php echo $kilos; ?>">

        <label for="fecha"> Fecha </label>
        <input type="date" class="form-control" id="fecha_ed" placeholder="* fecha " value="<?php echo $fecha; ?>">