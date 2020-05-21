
<?php
 require '../../../conector/conexion.php';

 session_start();
 
 if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
 
 } else {
	echo "Inicia Sesion para acceder a este contenido.<br>";
	echo "<br><a href='login.html'>Login</a>";
	header('Location: index.html');//redirige a la página de login si el usuario quiere ingresar sin iniciar sesion
 
 
 exit;
 }
 
 $now = time();
 
 if($now > $_SESSION['expire']) {
 session_destroy();
 header('Location: ../../index.html');//redirige a la página de login, modifica la url a tu conveniencia
 echo "Tu sesion a expirado,
 <a href='index.html'>Inicia Sesion</a>";
 exit;
 }
 
 
?>

<!DOCTYPE html>
<html>
<head>
	<title> Entradas de hilo </title>
	<link rel="stylesheet" type="text/css" href="../../librerias/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../../librerias/bootstrap/css/bootstrap-theme.min.css">

	<script type="text/javascript" src="../../librerias/bootstrap/js/jquery.min.js"></script>
	<script type="text/javascript" src="../../librerias/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../controlador/control_usuario.js"></script>

</head>
<body>


	<h1 align="center"> Entradas de Hilo </h1>

	<div class="row" style="margin: 0px; padding: 0px;"> 

    <div class="col-lg-3 col-md-5 xs-9">

	<h4 align="center" > <?php echo 'Bienvenido >> '.$_SESSION['username']; ?>
			&nbsp &nbsp &nbsp<input class="btn btn-warning btn-xs" type='button' value='Cerrar sesion' onclick='salir()'/></h4>



    	<h3 align="center"> Registro </h3>
    	<div id="panel_registro" style="padding: 5%; box-shadow: 1px 2px 2px #A4A4A4; border:1px solid #A4A4A4;" align="center">
    		<!-- Panel de datos -->
    		<table class="table table-condensed" style="width: 70%;">
    			<tr>
    				<td> <label> N° Facatura </label></td>
					<td> <input type="text" id="nofacatura" class="form-control" placeholder="* nofacatura"></td>
				</tr>
				
				<tr>
					<td><label>Proveedor</label></td>
					<td>
					<select id="proveedor" class="form-control">
					<option value=""></option>
					<?php
					$sql = mysqli_query($con,"SELECT * FROM proveedores");
					while($fila=$sql->fetch_array()){
						echo "<option value='".$fila['proveedor']."'>".$fila['proveedor']."</option>";
					}
					?>
					</select>
					</td>
					</tr>

			
			
			
				<tr> 
					<td> <label>N° Pallets </label></td>
    				<td> <input type="number" id="nopallets" min="0" class="form-control" placeholder="* nopallets"></td>
				</tr>
				
					
				<tr>
					<td><label>Composicion</label></td>
					<td>
					<select id="composicion" class="form-control">
					<option value=""></option>
					<?php
					$sql = mysqli_query($con,"SELECT * FROM composiciones");
					while($fila=$sql->fetch_array()){
						echo "<option value='".$fila['composicion']."'>".$fila['composicion']."</option>";
					}
					?>
					</select>
					</td>
					</tr>


					<tr>
					<td><label>Lote</label></td>
					<td>
					<select id="lote" class="form-control">
					<option value=""></option>
					<?php
					$sql = mysqli_query($con,"SELECT * FROM lotes Where estatus=1");
					while($fila=$sql->fetch_array()){
						echo "<option value='".$fila['lote']."'>".$fila['lote']."</option>";
					}
					?>
					</select>
					</td>
					</tr>


					<tr>
						<td> <label> Kg</label></td>
						<td> <input type="number" id="kilos" min="0" class="form-control"></td>
					</tr>



					<tr>
						<td> <label> Fecha </label></td>
						<td> <input type="date" id="fecha" min="0" class="form-control"></td>
					</tr>
					<tr>





    			<tr>
    				<td colspan="2">
    					<hr>
    					<div id="panel_respuesta"></div>
    				</td>
    			</tr>
    			<tr>
    				<td colspan="2" align="center">
    					<button class="btn btn-success btn-md" onclick="btn_guardar_dato();"> Registrar </button>
    				</td>
    			</tr>
    			
    		</table>

    	</div>
    	
    </div>
    <div class="col-lg-6 col-md-8 xs-12">
    	<h3 align="center"> Listado de Datos </h3>
    	<button class="btn btn-info btn-md" onclick="btn_listar_datos();"> Listar </button>
    	<div id="panel_listado">
    		<!-- Panel de datos -->

    	</div>
    </div>
	</div>

</body>
</html>