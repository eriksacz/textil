<?php

    $mysqli = new mysqli('localhost','root','','textil');//en usuarios le pones la base de datos textil
    if ($mysqli->connect_error) {
        
        die('Error en la conexion: '.$mysqli->connect_error);

    }    

?>