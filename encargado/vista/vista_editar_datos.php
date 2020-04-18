<?php

$ID_usuario = $_POST['ID_usuario'];

require '../../conector/conexion.php';

//$sql = mysqli_query($con,"SELECT * FROM usuario WHERE ID_usuario='$ID_usuario'");

$sql = mysqli_query($con,"SELECT produccion.ID_usuario, empleados.nombres, dibujos.dibujo, hilos.nombreHilo 
from produccion 
INNER JOIN empleados on produccion.trabajador_id = empleados.id 
INNER JOIN dibujos on produccion.dibujo_id = dibujos.id
INNER JOIN hilos on produccion.hilo_id = hilos.id
WHERE ID_usuario='$ID_usuario'
ORDER BY ID_usuario DESC");

$row = mysqli_fetch_array($sql);

$trabajador = $row['nombres']; 
$dibujo = $row['dibujo'];
$hilo = $row['nombreHilo'];

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