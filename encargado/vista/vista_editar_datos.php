<?php

$ID_usuario = $_POST['ID_usuario'];

require '../../conector/conexion.php';

//$sql = mysqli_query($con,"SELECT * FROM usuario WHERE ID_usuario='$ID_usuario'");

$sql = mysqli_query($con,"SELECT produccion.ID_usuario,produccion.fecha, produccion.rollo, produccion.kg, 
empleados.nombres, dibujos.dibujo, hilos.nombreHilo, composiciones.composicion, maquinas.numero, 
       turnos.turno, lotes.lote  
from produccion 
INNER JOIN empleados on produccion.trabajador_id = empleados.id 
INNER JOIN dibujos on produccion.dibujo_id = dibujos.id
INNER JOIN hilos on produccion.hilo_id = hilos.id
INNER JOIN composiciones on produccion.composicion_id = composiciones.id 
INNER JOIN maquinas on produccion.maquina_id = maquinas.id
INNER JOIN turnos on produccion.turno_id = turnos.id
INNER JOIN lotes on produccion.lote_id = lotes.id
WHERE ID_usuario='$ID_usuario'
ORDER BY ID_usuario DESC");

$row = mysqli_fetch_array($sql);

$trabajador = $row['nombres']; 
$dibujo = $row['dibujo'];
$hilo = $row['nombreHilo'];
$composicion = $row['composicion'];
$numero = $row['numero'];
$turno = $row['turno'];
$lote = $row['lote'];
$fecha = $row['fecha'];
$rollo = $row['rollo'];
$kg = $row['kg'];

?>
<input type="hidden" id="ID_usuario" value="<?php echo $ID_usuario; ?>">


                    
					<label for="inputState">Trabajador</label></td>
					<select id="trabajador_ed" class="form-control">
					<option selected><?php echo $trabajador; ?></option>
					<?php
					$sql = mysqli_query($con,"SELECT * FROM empleados WHERE estado BETWEEN '2' and '3'");
					while($fila=$sql->fetch_array()){
						echo "<option value='".$fila['nombres']."'>".$fila['nombres']."</option>";
					}
					?>
					</select>

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

                    <label for="inputState">Dibujo</label></td>
					<select id="hilo_ed" class="form-control">
					<option selected><?php echo $hilo; ?></option>
                    <?php
                    $sql = mysqli_query($con,"SELECT * FROM hilos");
					while($fila=$sql->fetch_array()){
						echo "<option value='".$fila['nombreHilo']."'>".$fila['nombreHilo']."</option>";
					}
					?>
					</select>

					<!---nuevos-->

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

                    <label for="inputState">Maquinas</label></td>
					<select id="maquina_ed" class="form-control">
					<option selected><?php echo $numero; ?></option>
					<?php
					$sql = mysqli_query($con,"SELECT * FROM maquinas");
                    while($fila=$sql->fetch_array()){
                        echo "<option value='".$fila['numero']."'>".$fila['numero']."</option>";
                    }
                    ?>
                    </select>

                    <label for="inputState">Turnos</label></td>
					<select id="turno_ed" class="form-control">
					<option selected><?php echo $turno; ?></option>
                    <?php
                    $sql = mysqli_query($con,"SELECT * FROM turnos");
					while($fila=$sql->fetch_array()){
						echo "<option value='".$fila['turno']."'>".$fila['turno']."</option>";
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

					<label for="dibujo"> Fecha </label>
<input type="date" class="form-control" id="fecha_ed" placeholder="* fecha " value="<?php echo $fecha; ?>">

<label for="dibujo"> Rollo </label>
<input type="text" class="form-control" id="rollo_ed" placeholder="* rollo " value="<?php echo $rollo; ?>">

<label for="dibujo"> Kilo </label>
<input type="text" class="form-control" id="kilos_ed" placeholder="* kilos " value="<?php echo $kg; ?>">