<?php
    $bd_host = "localhost";
    $bd_usuario = "root";    // el alias de la cuenta creada de la base de datos
    $bd_password = "";          // la contrasena de la cuenta
    $bd_base = "bd_practica";   // el nombre de la base de datos
 
	$con = mysqli_connect($bd_host, $bd_usuario,$bd_password); 
	$base =  mysqli_select_db($con,$bd_base);
	 //mysqli_set_charset('utf8'); 

      if($con==TRUE){
       //echo "coneccion existosa";
      }

?>