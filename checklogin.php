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

$sql = "SELECT * FROM $tbl_name WHERE username = '$username'";


$result = $conexion->query($sql);


if ($result->num_rows > 0) {     }


  $row = $result->fetch_array(MYSQLI_ASSOC);
 // if (password_verify($password, $row['password'])) {
if ($password==$row['password']) {

    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username;
    $_SESSION['start'] = time();
    $_SESSION['expire'] = $_SESSION['start'] + (20 * 60); //Aqui se le pone el tiempo que se desea por inactividad

    $sql1 = "SELECT rol_id,estado FROM $tbl_name WHERE username = '$username'";
    $result1 = $conexion->query($sql1);
    if ($result1->num_rows > 0) {     }
    $row = $result1->fetch_array(MYSQLI_ASSOC);
    if ($row['rol_id'] == 1 && $row['estado'] == 1) {
          header('Location: admin/menu.php');//redirecciona a la pagina del usuario
    }else if($row['rol_id'] == 2 && $row['estado'] == 1){
          header('Location: encargado/vista/vista_menu.php');
    } else {
    ?>      
   <!DOCTYPE html>
   <html lang="en">
   <head>
         <meta charset="UTF-8">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <title>Document</title>
   </head>
   <body>
         <h1 align ="center">Usuario o contraseña incorrectos</h1>
         <form align ="center" action="index.html">
        <input type="submit" value="LOGIN" />
        </form>

   </body>
   </html>
   
   
   
   
   <?php
 }
 mysqli_close($conexion);
}
 ?>
