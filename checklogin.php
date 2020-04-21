<?php
session_start();
?>

<?php

include 'conector/conexionLogin.php';

$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM $tbl_name WHERE usuario = '$username'";


$result = $conexion->query($sql);


if ($result->num_rows > 0) {     }


  $row = $result->fetch_array(MYSQLI_ASSOC);
 // if (password_verify($password, $row['password'])) {
if ($password==$row['password']) {

    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username;
    $_SESSION['start'] = time();
    $_SESSION['expire'] = $_SESSION['start'] + (1 * 60); //Aqui se le pone el tiempo que se desea por inactividad

    $sql1 = "SELECT estado FROM $tbl_name WHERE usuario = '$username'";
    $result1 = $conexion->query($sql1);
    if ($result1->num_rows > 0) {     }
    $row = $result1->fetch_array(MYSQLI_ASSOC);
    if ($row['estado'] == 1) {
          header('Location: panel-control.php');//redirecciona a la pagina del usuario
    }else if($row['estado'] == 2){
          header('Location: encargado/vista/vista_menu.php');
    }
 } else {
   echo "Username o Password estan incorrectos.";

   echo "<br><a href='login.html'>Volver a Intentarlo</a>";
 }
 mysqli_close($conexion);
 ?>
