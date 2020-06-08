
<table class="table table-bordered">
	<tr>
		<th> Id </th>
		<th> N° Facatura </th>
		<th> Proveedor </th>
		<th> N° Pallets </th>
    <th> Composicion </th>
    <th> Lote </th>
    <th> Kilos </th>
    <th> Fecha </th>
		<th> </th>
	</tr>
<?php

require '../../../conector/conexion.php';

///_____________________________________________________________________________

///____________________________________________________________________________


$sql = mysqli_query($con,"SELECT altas.id, altas.no_factura, hilos.nombreHilo, altas.no_pallets,
                   composiciones.composicion, lotes.lote, altas.kilos, altas.fecha
                   from altas
                   INNER JOIN hilos on altas.proveedor_id = hilos.id
                   INNER JOIN composiciones on altas.composicion_id = composiciones.id 
                   INNER JOIN lotes on altas.lote_id = lotes.id
                   ORDER BY id DESC");
$i =0;
while ($row = mysqli_fetch_array($sql)) {
	$i++;
	$id = $row['id'];
	$nofacatura = $row['no_factura'];
	$proveedor = $row['nombreHilo'];
  $nopallets = $row['no_pallets'];
  $composicion = $row['composicion']; 
  $lote = $row['lote']; 
  $kilos = $row['kilos']; 
  $fecha = $row['fecha']; 
	?>
     <tr>
     	<td> <?php echo $i; ?></td>
     	<td> <?php echo $nofacatura; ?></td>
     	<td> <?php echo $proveedor; ?></td>
     	<td> <?php echo $nopallets; ?></td>
     	<td> <?php echo $composicion; ?></td>
     	<td> <?php echo $lote; ?></td>
     	<td> <?php echo $kilos; ?></td>
     	<td> <?php echo $fecha; ?></td>
     	<td class="col-lg-1"> 
     		 
     		 <button class="btn btn-primary btn-xs" style="width: 100%;" data-toggle="modal" data-target="#myModal_editar" onclick="btn_editar('<?php echo $id; ?>');"> Editar </button>
     		 
     		 <button class="btn btn-danger btn-xs" style="width: 100%; margin-top: 1%;" data-toggle="modal" data-target="#myModal_eliminar" onclick="btn_eliminar('<?php echo $id; ?>');"> Eliminar </button>
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