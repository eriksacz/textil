<?php
error_reporting(0);
$user=null;
session_start();
$users = $_SESSION['username'];

 require '../conector/conexion.php';

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
 header('Location: ../index.html');//redirige a la página de login, modifica la url a tu conveniencia
 echo "Tu sesion a expirado,
 <a href='index.html'>Inicia Sesion</a>";
 exit;
 }
 
?>
<script>
function salir(){
   var respuesta=confirm("¿Desea usted realmente salir?");
   if(respuesta==true)
       window.location="../logout.php";
  else
       return 0;
}
</script>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Administrador</title>
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="assets/images/">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div class="container-fluid bg-login">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-12 login-card">
                    <div class="row">
                        <div class="col-md-5 detail-part">
                            <h1>Distribuidora Reainbol Textil</h1>
                          
<p align="center" > <?php echo 'Bienvenido >> '.$users.'  usted es un administrador'; ?>
&nbsp &nbsp &nbsp<input class="btn btn-warning btn-xs" type='button' value='Cerrar sesion' onclick='salir()'/></p>
                        </div>
                        <div class="col-md-7 logn-part">
                            <div class="row">
                                <div class="col-lg-10 col-md-12 mx-auto">
                                    <div class="logo-cover">
                                        <img src="assets/images/textil.jpeg" alt="" width="400" height="100" alt="">
                                    </div>
                                    <div class="form-cover">


        <a type="button" class="btn btn-outline-primary" href="usuarios/index.php"> Usuarios y Trabajdores</a>
        <hr>
        <a type="button" class="btn btn-outline-secondary" href="altas/vista/vista_menu.php">Entradas de Hilo</a>
        <hr>
        <a type="button" class="btn btn-outline-danger" href="bajas/vista/vista_menu.php">Salida de Rollo</a>
        <hr>
        <a type="button" class="btn btn-outline-success" href="reportes/prereporte.html">Reportes</a>
         <hr>
       
      



                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
<script src="assets/js/jquery-3.2.1.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

</html>