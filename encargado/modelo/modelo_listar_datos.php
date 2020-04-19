
<table class="table table-bordered">
	<tr>
		<th> # </th>
		<th> Trabajador </th>
		<th> Dibujo </th>
		<th> Hilo </th>
		<th> Composicion </th>
		<th> Maquina </th>
		<th> Turno </th>
		<th> Lote </th>
		<th> Fecha </th>
		<th> rollo </th>
		<th> kilo </th>
		<th>Opciones </th>
	</tr>
<?php

require '../../conector/conexion.php';

//$sql = mysqli_query($con,"SELECT * FROM produccion ORDER BY ID_usuario DESC");

$sql = mysqli_query($con,"SELECT produccion.ID_usuario, produccion.fecha, produccion.rollo, produccion.kg,
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
ORDER BY ID_usuario DESC");

$i =0;
while ($row = mysqli_fetch_array($sql)) {
	$i++;
	$ID_usuario = $row['ID_usuario'];
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
     <tr>
     	<td> <?php echo $i; ?></td>
     	<td> <?php echo $trabajador; ?></td>
     	<td> <?php echo $dibujo; ?></td>
     	<td> <?php echo $hilo; ?></td>
     	<td> <?php echo $composicion; ?></td>
     	<td> <?php echo $numero; ?></td>
     	<td> <?php echo $turno; ?></td>
     	<td> <?php echo $lote; ?></td>
     	<td> <?php echo $fecha; ?></td>
     	<td> <?php echo $rollo; ?></td>
     	<td> <?php echo $kg; ?></td>
     	<td class="col-lg-1"> 
     		 
     		 <button class="btn btn-primary btn-xs" style="width: 100%;" data-toggle="modal" data-target="#myModal_editar" onclick="btn_editar('<?php echo $ID_usuario; ?>');"> Editar </button>
     		 
     		 <button class="btn btn-danger btn-xs" style="width: 100%; margin-top: 1%;" data-toggle="modal" data-target="#myModal_eliminar" onclick="btn_eliminar('<?php echo $ID_usuario; ?>');"> Eliminar </button>
     	</td>
     </tr>
	<?php
}

?>
</table>

<!-- Modal -->
<div id="myModal_editar" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #084B8A; color: white;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"> Modal Editar </h4>
      </div>
      <div class="modal-body">
        <p> Edicion .</p>
        <div id="panel_editar"></div>
        <div id="panel_respuesta_edicion"></div>
      </div>
      <div class="modal-footer">
      	<button type="button" class="btn btn-info" onclick="btn_guardar_edicion();"> Guardar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"> Cerrar </button>
      </div>
    </div>

  </div>
</div>


<!-- Modal -->
<div id="myModal_eliminar" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: red; color:white;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Eliminar</h4>
      </div>
      <div class="modal-body">
        <p> Eliminar </p>
        <div id="panel_eliminar"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" onclick="btn_eliminar_dato();"> Eliminar </button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"> Cerrar </button>
       
      </div>
    </div>

  </div>
</div>