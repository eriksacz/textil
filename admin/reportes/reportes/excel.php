<?php
    header('Content-type:application/xls');
//header('Content-Disposition: attachment; filename=produccion.xls');
//header('Content-type: application/vnd.ms-excel;charset=iso-8859-15');
header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
header("Cache-Control: max-age=0");



//abre directamente el excel sin alerta de incompatibilidad
header("Content-Type:   application/vnd.ms-Excel; charset=utf-8");
header("Content-Disposition: attachment; filename= produccion.xls");  //File name extension was wrong
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: private",false);
echo "<font face='Arial' size='10' color='blue' >Distribuidora Rainbow Textil</font>";

require('../php/conexion.php');


    $fecha1=$_POST['fecha1'];
    $fecha2=$_POST['fecha2'];
    $composicion=$_POST['composicion'];
    $dibujo=$_POST['draw'];
    $hilo=$_POST['hilo'];
    $lote=$_POST['lote'];
    $maquina=$_POST['maquina'];
    $trabajador=$_POST['trabajador'];
    $turno=$_POST['turno'];


    if (($fecha2 == null) && ($dibujo == null) && ($composicion == null) && ($hilo == null) && ($lote == null) && ($maquina == null) && ($trabajador == null) && ($turno == null)) {
        $consulta = "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
        FROM produccion
        INNER JOIN empleados ON produccion.trabajador_id=empleados.id
        INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
        INNER JOIN hilos ON produccion.hilo_id = hilos.id
        INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
        INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
        INNER JOIN turnos ON produccion.turno_id = turnos.id
        INNER JOIN lotes ON produccion.lote_id = lotes.id
        WHERE produccion.fecha = '$fecha1'";

    }elseif (($fecha1 == null) && ($dibujo == null) && ($composicion == null) && ($hilo == null) && ($lote == null) && ($maquina == null) && ($trabajador == null) && ($turno == null)) {
        $consulta = "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE produccion.fecha = '$fecha2'";
    }elseif (($dibujo == null) && ($composicion == null) && ($hilo == null) && ($lote == null) && ($maquina == null) && ($trabajador == null) && ($turno == null)) {
        $consulta = "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($fecha1 == null) && ($fecha2 == null) && ($dibujo == null) && ($hilo == null) && ($lote == null) && ($maquina == null) && ($trabajador == null) && ($turno == null)) {
        $consulta = "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
             FROM produccion
             INNER JOIN empleados ON produccion.trabajador_id=empleados.id
             INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
             INNER JOIN hilos ON produccion.hilo_id = hilos.id
             INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
             INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
             INNER JOIN turnos ON produccion.turno_id = turnos.id
             INNER JOIN lotes ON produccion.lote_id = lotes.id
             WHERE composiciones.id = '$composicion'";

    }elseif (($fecha1 == null) && ($fecha2 == null) && ($composicion == null) && ($hilo == null) && ($lote == null) && ($maquina == null) && ($trabajador == null) && ($turno == null)) {
        $consulta = "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo'";
    }elseif (($fecha1 == null) && ($fecha2 == null) && ($composicion == null) && ($dibujo == null) && ($lote == null) && ($maquina == null) && ($trabajador == null) && ($turno == null)) {
        $consulta = "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
             FROM produccion
             INNER JOIN empleados ON produccion.trabajador_id=empleados.id
             INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
             INNER JOIN hilos ON produccion.hilo_id = hilos.id
             INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
             INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
             INNER JOIN turnos ON produccion.turno_id = turnos.id
             INNER JOIN lotes ON produccion.lote_id = lotes.id
             WHERE hilos.nombreHilo = '$hilo'";
    }elseif (($fecha1 == null) && ($fecha2 == null) && ($composicion == null) && ($dibujo == null) && ($hilo == null) && ($maquina == null) && ($trabajador == null) && ($turno == null)) {
        $consulta = "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
             FROM produccion
             INNER JOIN empleados ON produccion.trabajador_id=empleados.id
             INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
             INNER JOIN hilos ON produccion.hilo_id = hilos.id
             INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
             INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
             INNER JOIN turnos ON produccion.turno_id = turnos.id
             INNER JOIN lotes ON produccion.lote_id = lotes.id
             WHERE lotes.lote = '$lote'";
    }elseif (($fecha1 == null) && ($fecha2 == null) && ($composicion == null) && ($dibujo == null) && ($hilo == null) && ($lote == null) && ($trabajador == null) && ($turno == null)) {
        $consulta = "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
             FROM produccion
             INNER JOIN empleados ON produccion.trabajador_id=empleados.id
             INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
             INNER JOIN hilos ON produccion.hilo_id = hilos.id
             INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
             INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
             INNER JOIN turnos ON produccion.turno_id = turnos.id
             INNER JOIN lotes ON produccion.lote_id = lotes.id
             WHERE maquinas.id = '$maquina'";
    }elseif (($fecha1 == null) && ($fecha2 == null) && ($composicion == null) && ($dibujo == null) && ($hilo == null) && ($lote == null) && ($maquina == null) && ($turno == null)) {
        $consulta = "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
                 FROM produccion
                 INNER JOIN empleados ON produccion.trabajador_id=empleados.id
                 INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
                 INNER JOIN hilos ON produccion.hilo_id = hilos.id
                 INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
                 INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
                 INNER JOIN turnos ON produccion.turno_id = turnos.id
                 INNER JOIN lotes ON produccion.lote_id = lotes.id
                 WHERE empleados.id = '$trabajador'";
    }elseif (($fecha1 == null) && ($fecha2 == null) && ($composicion == null) && ($dibujo == null) && ($hilo == null) && ($lote == null) && ($maquina == null) && ($trabajador == null)) {
        $consulta = "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
             FROM produccion
             INNER JOIN empleados ON produccion.trabajador_id=empleados.id
             INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
             INNER JOIN hilos ON produccion.hilo_id = hilos.id
             INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
             INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
             INNER JOIN turnos ON produccion.turno_id = turnos.id
             INNER JOIN lotes ON produccion.lote_id = lotes.id
             WHERE turnos.turno = '$turno'";
    }elseif (($composicion == null) && ($dibujo == null) && ($hilo == null) && ($trabajador == null) && ($turno == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE lotes.lote = '$lote' AND maquinas.id = '$maquina'";
    }elseif (($composicion == null) && ($hilo == null) && ($lote == null) && ($trabajador == null) && ($turno == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND maquinas.id = '$maquina'";

    }elseif (($composicion == null) && ($dibujo == null) && ($hilo == null) && ($lote == null) && ($turno == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND maquinas.id = '$maquina'";
    }elseif (($composicion == null) && ($dibujo == null) && ($lote == null) && ($trabajador == null) && ($turno == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE hilos.nombreHilo = '$hilo' AND maquinas.id = '$maquina'";
    }elseif (($dibujo == null) && ($hilo == null) && ($lote == null) && ($trabajador == null) && ($turno == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE composiciones.id = '$composicion' AND maquinas.id = '$maquina'";
    }elseif (($composicion == null) && ($dibujo == null) && ($hilo == null) && ($lote == null) && ($trabajador == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE turnos.turno = '$turno' AND maquinas.id = '$maquina'";
    }elseif (($composicion == null) && ($lote == null) && ($trabajador == null) && ($turno == null) && ($maquina == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND hilos.nombreHilo = '$hilo'";
    }elseif (($hilo == null) && ($lote == null) && ($trabajador == null) && ($turno == null) && ($maquina == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND composiciones.id = '$composicion'";
    }elseif (($hilo == null) && ($lote == null) && ($trabajador == null) && ($composicion == null) && ($maquina == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND turnos.turno = '$turno'";
    }elseif (($hilo == null) && ($turno == null) && ($trabajador == null) && ($composicion == null) && ($maquina == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND lotes.lote = '$lote'";
    }elseif (($hilo == null) && ($turno == null) && ($lote == null) && ($composicion == null) && ($maquina == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador'";
    }elseif (($dibujo == null) && ($turno == null) && ($lote == null) && ($composicion == null) && ($maquina == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE hilos.nombreHilo = '$hilo' AND empleados.id = '$trabajador'";
    }elseif (($dibujo == null) && ($turno == null) && ($lote == null) && ($hilo == null) && ($maquina == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE composiciones.id = '$composicion' AND empleados.id = '$trabajador'";
    }elseif (($dibujo == null) && ($composicion == null) && ($lote == null) && ($hilo == null) && ($maquina == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE turnos.turno = '$turno' AND empleados.id = '$trabajador'";
    }elseif (($dibujo == null) && ($composicion == null) && ($turno == null) && ($hilo == null) && ($maquina == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE lotes.lote = '$lote' AND empleados.id = '$trabajador'";
    }elseif (($dibujo == null) && ($composicion == null) && ($turno == null) && ($trabajador == null) && ($maquina == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE lotes.lote = '$lote' AND hilos.nombreHilo = '$hilo'";
    }elseif (($dibujo == null) && ($composicion == null) && ($lote == null) && ($trabajador == null) && ($maquina == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE turnos.turno = '$turno' AND hilos.nombreHilo = '$hilo'";
    }elseif (($dibujo == null) && ($turno == null) && ($lote == null) && ($trabajador == null) && ($maquina == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE composiciones.id = '$composicion' AND hilos.nombreHilo = '$hilo'";
    }elseif (($dibujo == null) && ($hilo == null) && ($lote == null) && ($trabajador == null) && ($maquina == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE turnos.turno = '$turno' AND composiciones.id = '$composicion'";
    }elseif (($dibujo == null) && ($hilo == null) && ($turno == null) && ($trabajador == null) && ($maquina == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE lotes.lote = '$lote' AND composiciones.id = '$composicion'";
    }elseif (($dibujo == null) && ($hilo == null) && ($composicion == null) && ($trabajador == null) && ($maquina == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE lotes.lote = '$lote' AND turnos.turno = '$turno'";
    }elseif (($turno == null) && ($lote == null) && ($composicion == null) && ($maquina == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo'";
    }elseif (($turno == null) && ($lote == null) && ($hilo == null) && ($maquina == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND composiciones.id = '$composicion'";
    }elseif (($turno == null) && ($lote == null) && ($hilo == null) && ($composicion == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND maquinas.id = '$maquina'";
    }elseif (($turno == null) && ($lote == null) && ($hilo == null) && ($composicion == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND turnos.turno = '$turno'";
    }elseif (($maquina == null) && ($turno == null) && ($hilo == null) && ($composicion == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND lotes.lote = '$lote'";
    }elseif (($maquina == null) && ($turno == null) && ($trabajador == null) && ($composicion == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND hilos.nombreHilo = '$hilo' AND lotes.lote = '$lote'";
    }elseif (($maquina == null) && ($turno == null) && ($trabajador == null) && ($lote == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion'";
    }elseif (($composicion == null) && ($turno == null) && ($trabajador == null) && ($lote == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND hilos.nombreHilo = '$hilo' AND maquinas.id = '$maquina'";
    }elseif (($composicion == null) && ($maquina == null) && ($trabajador == null) && ($lote == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND hilos.nombreHilo = '$hilo' AND turnos.turno = '$turno'";
    }elseif (($turno == null) && ($hilo == null) && ($trabajador == null) && ($lote == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina'";
    }elseif (($maquina == null) && ($hilo == null) && ($trabajador == null) && ($lote == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND composiciones.id = '$composicion' AND turnos.turno = '$turno'";
    }elseif (($maquina == null) && ($hilo == null) && ($trabajador == null) && ($turno == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND composiciones.id = '$composicion' AND lotes.lote = '$lote'";
    }elseif (($composicion == null) && ($hilo == null) && ($trabajador == null) && ($lote == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND maquinas.id = '$maquina' AND turnos.turno = '$turno'";
    }elseif (($composicion == null) && ($hilo == null) && ($trabajador == null) && ($turno== null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND maquinas.id = '$maquina' AND lotes.lote = '$lote'";
    }elseif (($composicion == null) && ($hilo == null) && ($trabajador == null) && ($maquina == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND turnos.turno = '$turno' AND lotes.lote = '$lote'";
    }elseif (($dibujo == null) && ($turno == null) && ($lote == null) && ($maquina == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion'";
    }elseif (($dibujo == null) && ($turno == null) && ($lote == null) && ($composicion == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND maquinas.id = '$maquina'";
    }elseif (($dibujo == null) && ($maquina == null) && ($lote == null) && ($composicion == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND turnos.turno = '$turno'";
    }elseif (($dibujo == null) && ($maquina == null) && ($turno == null) && ($composicion == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND lotes.lote = '$lote'";
    }elseif (($dibujo == null) && ($hilo == null) && ($turno == null) && ($lote == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina'";
    }elseif (($dibujo == null) && ($hilo == null) && ($maquina == null) && ($lote == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND composiciones.id = '$composicion' AND turnos.turno = '$turno'";
    }elseif (($dibujo == null) && ($hilo == null) && ($maquina == null) && ($turno == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND composiciones.id = '$composicion' AND lotes.lote = '$lote'";
    }elseif (($dibujo == null) && ($hilo == null) && ($composicion == null) && ($lote == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND maquinas.id = '$maquina' AND turnos.turno = '$turno'";
    }elseif (($dibujo == null) && ($hilo == null) && ($composicion == null) && ($turno == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND maquinas.id = '$maquina' AND lotes.lote = '$lote'";
    }elseif (($dibujo == null) && ($hilo == null) && ($composicion == null) && ($maquina == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND turnos.turno = '$turno' AND lotes.lote = '$lote'";
    }elseif (($dibujo == null) && ($trabajador == null) && ($turno == null) && ($lote == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina'";
    }elseif (($dibujo == null) && ($trabajador == null) && ($maquina == null) && ($lote == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND turnos.turno = '$turno'";
    }elseif (($dibujo == null) && ($trabajador == null) && ($maquina == null) && ($turno == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND lotes.lote = '$lote'";
    }elseif (($dibujo == null) && ($trabajador == null) && ($composicion == null) && ($lote == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE hilos.nombreHilo = '$hilo' AND maquinas.id = '$maquina' AND turnos.turno = '$turno'";
    }elseif (($dibujo == null) && ($trabajador == null) && ($composicion == null) && ($turno == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE hilos.nombreHilo = '$hilo' AND maquinas.id = '$maquina' AND lotes.lote = '$lote'";
    }elseif (($dibujo == null) && ($trabajador == null) && ($composicion == null) && ($maquina == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE hilos.nombreHilo = '$hilo' AND turnos.turno = '$turno' AND lotes.lote = '$lote'";
    }elseif (($dibujo == null) && ($trabajador == null) && ($hilo == null) && ($lote == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND turnos.turno = '$turno'";
    }elseif (($dibujo == null) && ($trabajador == null) && ($hilo == null) && ($turno == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND lotes.lote = '$lote'";
    }elseif (($dibujo == null) && ($trabajador == null) && ($hilo == null) && ($maquina == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE composiciones.id = '$composicion' AND turnos.turno = '$turno' AND lotes.lote = '$lote'";
    }elseif (($dibujo == null) && ($trabajador == null) && ($hilo == null) && ($composicion == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE maquinas.id = '$maquina' AND turnos.turno = '$turno' AND lotes.lote = '$lote'";
    }elseif (($turno == null) && ($lote == null) && ($maquina == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion'";
    }elseif (($composicion == null) && ($lote == null) && ($turno == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND maquinas.id = '$maquina'";
    }elseif (($composicion == null) && ($lote == null) && ($maquina == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND turnos.turno = '$turno'";
    }elseif (($composicion == null) && ($turno == null) && ($maquina == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND lotes.lote = '$lote'";
    }elseif (($turno == null) && ($trabajador == null) && ($lote == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina'";
    }elseif (($maquina == null) && ($trabajador == null) && ($lote == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND turnos.turno = '$turno'";
    }elseif (($maquina == null) && ($trabajador == null) && ($turno == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND lotes.lote = '$lote'";
    }elseif (($turno == null) && ($lote == null) && ($hilo == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina'";
    }elseif (($maquina == null) && ($lote == null) && ($hilo == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND composiciones.id = '$composicion' AND turnos.turno = '$turno'";
    }elseif (($maquina == null) && ($turno == null) && ($hilo == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND composiciones.id = '$composicion' AND lotes.lote = '$lote'";
    }elseif (($lote == null) && ($hilo == null) && ($composicion == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND maquinas.id = '$maquina'AND turnos.turno = '$turno'";
    }elseif (($turno == null) && ($hilo == null) && ($composicion == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND maquinas.id = '$maquina'AND lotes.lote = '$lote'";
    }elseif (($maquina == null) && ($hilo == null) && ($composicion == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND turnos.turno = '$turno' AND lotes.lote = '$lote'";
    }elseif (($composicion == null) && ($trabajador == null) && ($lote == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND hilos.nombreHilo = '$hilo' AND maquinas.id = '$maquina' AND turnos.turno = '$turno'";
    }elseif (($composicion == null) && ($trabajador == null) && ($turno == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND hilos.nombreHilo = '$hilo' AND maquinas.id = '$maquina' AND lotes.lote = '$lote'";
    }elseif (($composicion == null) && ($maquina == null) && ($trabajador == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND hilos.nombreHilo = '$hilo' AND turnos.turno = '$turno' AND lotes.lote = '$lote'";
    }elseif (($hilo == null) && ($trabajador == null) && ($lote == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND turnos.turno = '$turno'";
    }elseif (($hilo == null) && ($trabajador == null) && ($turno == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina'";
    }elseif (($maquina == null) && ($hilo == null) && ($trabajador == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND composiciones.id = '$composicion' AND turnos.turno = '$turno' AND lotes.lote = '$lote'";
    }elseif (($composicion == null) && ($hilo == null) && ($trabajador == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND maquinas.id = '$maquina' AND turnos.turno = '$turno' AND lotes.lote = '$lote'";
    }elseif (($dibujo == null) && ($turno == null) && ($lote == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina'";
    }elseif (($dibujo == null) && ($maquina == null) && ($lote == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND turnos.turno = '$turno'";
    }elseif (($dibujo == null) && ($maquina == null) && ($turno == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND lotes.lote = '$lote'";
    }elseif (($dibujo == null) && ($lote == null) && ($composicion == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND maquinas.id = '$maquina' AND turnos.turno = '$turno'";
    }elseif (($dibujo == null) && ($turno == null) && ($composicion == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND maquinas.id = '$maquina' AND lotes.lote = '$lote'";
    }elseif (($dibujo == null) && ($maquina == null) && ($composicion == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND turnos.turno = '$turno' AND lotes.lote = '$lote'";
    }elseif (($dibujo == null) && ($hilo == null) && ($lote == null)){
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND turnos.turno = '$turno'";
    }elseif (($dibujo == null) && ($hilo == null) && ($turno == null)){
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND lotes.lote = '$lote'";
    }elseif (($dibujo == null) && ($hilo == null) && ($maquina == null)){
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND composiciones.id = '$composicion' AND turnos.turno = '$turno' AND lotes.lote = '$lote'";
    }elseif (($dibujo == null) && ($hilo == null) && ($composicion == null)){
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND maquinas.id = '$maquina' AND turnos.turno = '$turno' AND lotes.lote = '$lote'";
    }elseif (($dibujo == null) && ($trabajador == null) && ($lote == null)){
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND turnos.turno = '$turno'";
    }elseif (($dibujo == null) && ($trabajador == null) && ($turno == null)){
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND lotes.lote = '$lote'";
    }elseif (($dibujo == null) && ($trabajador == null) && ($maquina == null)){
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND turnos.turno = '$turno' AND lotes.lote = '$lote'";
    }elseif (($dibujo == null) && ($trabajador == null) && ($composicion == null)){
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE hilos.nombreHilo = '$hilo' AND maquinas.id = '$maquina' AND turnos.turno = '$turno' AND lotes.lote = '$lote'";
    }elseif (($dibujo == null) && ($trabajador == null) && ($hilo == null)){
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND turnos.turno = '$turno' AND lotes.lote = '$lote'";
    }elseif (($turno == null) && ($lote == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina'";
    }elseif (($maquina == null) && ($lote == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND turnos.turno = '$turno'";
    }elseif (($maquina == null) && ($turno == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND lotes.lote = '$lote'";
    }elseif (($composicion == null) && ($turno == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND maquinas.id = '$maquina' AND turnos.turno = '$turno'";
    }elseif (($composicion == null) && ($turno == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND maquinas.id = '$maquina' AND lotes.lote = '$lote'";
    }elseif (($composicion == null) && ($maquina == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND turnos.turno = '$turno' AND lotes.lote = '$lote'";
    }elseif (($lote == null) && ($hilo == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND turnos.turno = '$turno'";
    }elseif (($turno == null) && ($hilo == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND lotes.lote = '$lote'";
    }elseif (($maquina == null) && ($hilo == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND composiciones.id = '$composicion' AND turnos.turno = '$turno' AND lotes.lote = '$lote'";
    }elseif (($hilo == null) && ($composicion == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND maquinas.id = '$maquina' AND turnos.turno = '$turno' AND lotes.lote = '$lote'";
    }elseif (($trabajador == null) && ($lote == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND turnos.turno = '$turno'";
    }elseif (($trabajador == null) && ($turno == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND lotes.lote = '$lote'";
    }elseif (($maquina == null) && ($trabajador == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND turnos.turno = '$turno' AND lotes.lote = '$lote'";
    }elseif (($composicion == null) && ($trabajador == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND hilos.nombreHilo = '$hilo' AND maquinas.id = '$maquina' AND turnos.turno = '$turno' AND lotes.lote = '$lote'";
    }elseif (($hilo == null) && ($trabajador == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND turnos.turno = '$turno' AND lotes.lote = '$lote'";
    }elseif (($dibujo == null) && ($lote == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND turnos.turno = '$turno'";
    }elseif (($dibujo == null) && ($turno == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND lotes.lote = '$lote'";
    }elseif (($dibujo == null) && ($maquina == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND turnos.turno = '$turno' AND lotes.lote = '$lote'";
    }elseif (($dibujo == null) && ($composicion == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND maquinas.id = '$maquina' AND turnos.turno = '$turno' AND lotes.lote = '$lote'";
    }elseif (($dibujo == null) && ($hilo == null)){
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND turnos.turno = '$turno' AND lotes.lote = '$lote'";
    }elseif (($dibujo == null) && ($trabajador == null)){
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND turnos.turno = '$turno' AND lotes.lote = '$lote'";
    }elseif (($lote == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND turnos.turno = '$turno'";
    }elseif (($turno == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND lotes.lote = '$lote'";
    }elseif (($maquina == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND turnos.turno = '$turno' AND lotes.lote = '$lote'";
    }elseif (($composicion == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND maquinas.id = '$maquina' AND turnos.turno = '$turno' AND lotes.lote = '$lote'";
    }elseif (($hilo == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND turnos.turno = '$turno' AND lotes.lote = '$lote'";
    }elseif (($trabajador == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND turnos.turno = '$turno' AND lotes.lote = '$lote'";





    }elseif (($dibujo == null) && ($hilo == null) && ($lote == null) && ($maquina == null) && ($trabajador == null) && ($turno == null)) {
        $consulta = "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
             FROM produccion
             INNER JOIN empleados ON produccion.trabajador_id=empleados.id
             INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
             INNER JOIN hilos ON produccion.hilo_id = hilos.id
             INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
             INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
             INNER JOIN turnos ON produccion.turno_id = turnos.id
             INNER JOIN lotes ON produccion.lote_id = lotes.id
             WHERE composiciones.id = '$composicion' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($composicion == null) && ($hilo == null) && ($lote == null) && ($maquina == null) && ($trabajador == null) && ($turno == null)) {
        $consulta1 = "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
                 FROM produccion
                 INNER JOIN empleados ON produccion.trabajador_id=empleados.id
                 INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
                 INNER JOIN hilos ON produccion.hilo_id = hilos.id
                 INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
                 INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
                 INNER JOIN turnos ON produccion.turno_id = turnos.id
                 INNER JOIN lotes ON produccion.lote_id = lotes.id
                 WHERE dibujos.id = '$dibujo' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($composicion == null) && ($dibujo == null) && ($lote == null) && ($maquina == null) && ($trabajador == null) && ($turno == null)) {
        $consulta = "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
             FROM produccion
             INNER JOIN empleados ON produccion.trabajador_id=empleados.id
             INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
             INNER JOIN hilos ON produccion.hilo_id = hilos.id
             INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
             INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
             INNER JOIN turnos ON produccion.turno_id = turnos.id
             INNER JOIN lotes ON produccion.lote_id = lotes.id
             WHERE hilos.nombreHilo = '$hilo' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($composicion == null) && ($dibujo == null) && ($hilo == null) && ($maquina == null) && ($trabajador == null) && ($turno == null)) {
        $consulta = "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
             FROM produccion
             INNER JOIN empleados ON produccion.trabajador_id=empleados.id
             INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
             INNER JOIN hilos ON produccion.hilo_id = hilos.id
             INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
             INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
             INNER JOIN turnos ON produccion.turno_id = turnos.id
             INNER JOIN lotes ON produccion.lote_id = lotes.id
             WHERE lotes.lote = '$lote' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($composicion == null) && ($dibujo == null) && ($hilo == null) && ($lote == null) && ($trabajador == null) && ($turno == null)) {
        $consulta = "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
             FROM produccion
             INNER JOIN empleados ON produccion.trabajador_id=empleados.id
             INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
             INNER JOIN hilos ON produccion.hilo_id = hilos.id
             INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
             INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
             INNER JOIN turnos ON produccion.turno_id = turnos.id
             INNER JOIN lotes ON produccion.lote_id = lotes.id
             WHERE maquinas.id = '$maquina' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($composicion == null) && ($dibujo == null) && ($hilo == null) && ($lote == null) && ($maquina == null) && ($turno == null)) {
        $consulta = "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
                 FROM produccion
                 INNER JOIN empleados ON produccion.trabajador_id=empleados.id
                 INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
                 INNER JOIN hilos ON produccion.hilo_id = hilos.id
                 INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
                 INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
                 INNER JOIN turnos ON produccion.turno_id = turnos.id
                 INNER JOIN lotes ON produccion.lote_id = lotes.id
                 WHERE empleados.id = '$trabajador' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($composicion == null) && ($dibujo == null) && ($hilo == null) && ($lote == null) && ($maquina == null) && ($trabajador == null)) {
        $consulta = "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
             FROM produccion
             INNER JOIN empleados ON produccion.trabajador_id=empleados.id
             INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
             INNER JOIN hilos ON produccion.hilo_id = hilos.id
             INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
             INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
             INNER JOIN turnos ON produccion.turno_id = turnos.id
             INNER JOIN lotes ON produccion.lote_id = lotes.id
             WHERE turnos.turno = '$turno' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";

    }elseif (($composicion == null) && ($dibujo == null) && ($hilo == null) && ($trabajador == null) && ($turno == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE lotes.lote = '$lote' AND maquinas.id = '$maquina' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($composicion == null) && ($hilo == null) && ($lote == null) && ($trabajador == null) && ($turno == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND maquinas.id = '$maquina' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";

    }elseif (($composicion == null) && ($dibujo == null) && ($hilo == null) && ($lote == null) && ($turno == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND maquinas.id = '$maquina' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($composicion == null) && ($dibujo == null) && ($lote == null) && ($trabajador == null) && ($turno == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE hilos.nombreHilo = '$hilo' AND maquinas.id = '$maquina' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($dibujo == null) && ($hilo == null) && ($lote == null) && ($trabajador == null) && ($turno == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($composicion == null) && ($dibujo == null) && ($hilo == null) && ($lote == null) && ($trabajador == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE turnos.turno = '$turno' AND maquinas.id = '$maquina' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($composicion == null) && ($lote == null) && ($trabajador == null) && ($turno == null) && ($maquina == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND hilos.nombreHilo = '$hilo' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($hilo == null) && ($lote == null) && ($trabajador == null) && ($turno == null) && ($maquina == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND composiciones.id = '$composicion' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($hilo == null) && ($lote == null) && ($trabajador == null) && ($composicion == null) && ($maquina == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND turnos.turno = '$turno' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($hilo == null) && ($turno == null) && ($trabajador == null) && ($composicion == null) && ($maquina == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND lotes.lote = '$lote' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($hilo == null) && ($turno == null) && ($lote == null) && ($composicion == null) && ($maquina == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($dibujo == null) && ($turno == null) && ($lote == null) && ($composicion == null) && ($maquina == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE hilos.nombreHilo = '$hilo' AND empleados.id = '$trabajador' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($dibujo == null) && ($turno == null) && ($lote == null) && ($hilo == null) && ($maquina == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE composiciones.id = '$composicion' AND empleados.id = '$trabajador' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($dibujo == null) && ($composicion == null) && ($lote == null) && ($hilo == null) && ($maquina == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE turnos.turno = '$turno' AND empleados.id = '$trabajador' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($dibujo == null) && ($composicion == null) && ($turno == null) && ($hilo == null) && ($maquina == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE lotes.lote = '$lote' AND empleados.id = '$trabajador' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($dibujo == null) && ($composicion == null) && ($turno == null) && ($trabajador == null) && ($maquina == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE lotes.lote = '$lote' AND hilos.nombreHilo = '$hilo' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($dibujo == null) && ($composicion == null) && ($lote == null) && ($trabajador == null) && ($maquina == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE turnos.turno = '$turno' AND hilos.nombreHilo = '$hilo' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($dibujo == null) && ($turno == null) && ($lote == null) && ($trabajador == null) && ($maquina == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE composiciones.id = '$composicion' AND hilos.nombreHilo = '$hilo' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($dibujo == null) && ($hilo == null) && ($lote == null) && ($trabajador == null) && ($maquina == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE turnos.turno = '$turno' AND composiciones.id = '$composicion' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($dibujo == null) && ($hilo == null) && ($turno == null) && ($trabajador == null) && ($maquina == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE lotes.lote = '$lote' AND composiciones.id = '$composicion' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($dibujo == null) && ($hilo == null) && ($composicion == null) && ($trabajador == null) && ($maquina == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE lotes.lote = '$lote' AND turnos.turno = '$turno' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($turno == null) && ($lote == null) && ($composicion == null) && ($maquina == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($turno == null) && ($lote == null) && ($hilo == null) && ($maquina == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND composiciones.id = '$composicion' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($turno == null) && ($lote == null) && ($hilo == null) && ($composicion == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND maquinas.id = '$maquina' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($turno == null) && ($lote == null) && ($hilo == null) && ($composicion == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND turnos.turno = '$turno' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($maquina == null) && ($turno == null) && ($hilo == null) && ($composicion == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND lotes.lote = '$lote' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($maquina == null) && ($turno == null) && ($trabajador == null) && ($composicion == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND hilos.nombreHilo = '$hilo' AND lotes.lote = '$lote' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($maquina == null) && ($turno == null) && ($trabajador == null) && ($lote == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($composicion == null) && ($turno == null) && ($trabajador == null) && ($lote == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND hilos.nombreHilo = '$hilo' AND maquinas.id = '$maquina' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($composicion == null) && ($maquina == null) && ($trabajador == null) && ($lote == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND hilos.nombreHilo = '$hilo' AND turnos.turno = '$turno' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($turno == null) && ($hilo == null) && ($trabajador == null) && ($lote == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($maquina == null) && ($hilo == null) && ($trabajador == null) && ($lote == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND composiciones.id = '$composicion' AND turnos.turno = '$turno' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($maquina == null) && ($hilo == null) && ($trabajador == null) && ($turno == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND composiciones.id = '$composicion' AND lotes.lote = '$lote' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($composicion == null) && ($hilo == null) && ($trabajador == null) && ($lote == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND maquinas.id = '$maquina' AND turnos.turno = '$turno' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($composicion == null) && ($hilo == null) && ($trabajador == null) && ($turno== null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND maquinas.id = '$maquina' AND lotes.lote = '$lote' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($composicion == null) && ($hilo == null) && ($trabajador == null) && ($maquina == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND turnos.turno = '$turno' AND lotes.lote = '$lote' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($dibujo == null) && ($turno == null) && ($lote == null) && ($maquina == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($dibujo == null) && ($turno == null) && ($lote == null) && ($composicion == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND maquinas.id = '$maquina' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($dibujo == null) && ($maquina == null) && ($lote == null) && ($composicion == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND turnos.turno = '$turno' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($dibujo == null) && ($maquina == null) && ($turno == null) && ($composicion == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND lotes.lote = '$lote' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($dibujo == null) && ($hilo == null) && ($turno == null) && ($lote == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($dibujo == null) && ($hilo == null) && ($maquina == null) && ($lote == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND composiciones.id = '$composicion' AND turnos.turno = '$turno' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($dibujo == null) && ($hilo == null) && ($maquina == null) && ($turno == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND composiciones.id = '$composicion' AND lotes.lote = '$lote' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($dibujo == null) && ($hilo == null) && ($composicion == null) && ($lote == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND maquinas.id = '$maquina' AND turnos.turno = '$turno' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($dibujo == null) && ($hilo == null) && ($composicion == null) && ($turno == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND maquinas.id = '$maquina' AND lotes.lote = '$lote' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($dibujo == null) && ($hilo == null) && ($composicion == null) && ($maquina == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND turnos.turno = '$turno' AND lotes.lote = '$lote' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($dibujo == null) && ($trabajador == null) && ($turno == null) && ($lote == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($dibujo == null) && ($trabajador == null) && ($maquina == null) && ($lote == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND turnos.turno = '$turno' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($dibujo == null) && ($trabajador == null) && ($maquina == null) && ($turno == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND lotes.lote = '$lote' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($dibujo == null) && ($trabajador == null) && ($composicion == null) && ($lote == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE hilos.nombreHilo = '$hilo' AND maquinas.id = '$maquina' AND turnos.turno = '$turno' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($dibujo == null) && ($trabajador == null) && ($composicion == null) && ($turno == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE hilos.nombreHilo = '$hilo' AND maquinas.id = '$maquina' AND lotes.lote = '$lote' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($dibujo == null) && ($trabajador == null) && ($composicion == null) && ($maquina == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE hilos.nombreHilo = '$hilo' AND turnos.turno = '$turno' AND lotes.lote = '$lote' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($dibujo == null) && ($trabajador == null) && ($hilo == null) && ($lote == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND turnos.turno = '$turno' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($dibujo == null) && ($trabajador == null) && ($hilo == null) && ($turno == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND lotes.lote = '$lote' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($dibujo == null) && ($trabajador == null) && ($hilo == null) && ($maquina == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE composiciones.id = '$composicion' AND turnos.turno = '$turno' AND lotes.lote = '$lote' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($dibujo == null) && ($trabajador == null) && ($hilo == null) && ($composicion == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE maquinas.id = '$maquina' AND turnos.turno = '$turno' AND lotes.lote = '$lote' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($turno == null) && ($lote == null) && ($maquina == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($composicion == null) && ($lote == null) && ($turno == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND maquinas.id = '$maquina' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($composicion == null) && ($lote == null) && ($maquina == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND turnos.turno = '$turno' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($composicion == null) && ($turno == null) && ($maquina == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND lotes.lote = '$lote' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($turno == null) && ($trabajador == null) && ($lote == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($maquina == null) && ($trabajador == null) && ($lote == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND turnos.turno = '$turno' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($maquina == null) && ($trabajador == null) && ($turno == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND lotes.lote = '$lote' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($turno == null) && ($lote == null) && ($hilo == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($maquina == null) && ($lote == null) && ($hilo == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND composiciones.id = '$composicion' AND turnos.turno = '$turno' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($maquina == null) && ($turno == null) && ($hilo == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND composiciones.id = '$composicion' AND lotes.lote = '$lote' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($lote == null) && ($hilo == null) && ($composicion == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND maquinas.id = '$maquina'AND turnos.turno = '$turno' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($turno == null) && ($hilo == null) && ($composicion == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND maquinas.id = '$maquina'AND lotes.lote = '$lote' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($maquina == null) && ($hilo == null) && ($composicion == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND turnos.turno = '$turno' AND lotes.lote = '$lote' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($composicion == null) && ($trabajador == null) && ($lote == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND hilos.nombreHilo = '$hilo' AND maquinas.id = '$maquina' AND turnos.turno = '$turno' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($composicion == null) && ($trabajador == null) && ($turno == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND hilos.nombreHilo = '$hilo' AND maquinas.id = '$maquina' AND lotes.lote = '$lote' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($composicion == null) && ($maquina == null) && ($trabajador == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND hilos.nombreHilo = '$hilo' AND turnos.turno = '$turno' AND lotes.lote = '$lote' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($hilo == null) && ($trabajador == null) && ($lote == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND turnos.turno = '$turno' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($hilo == null) && ($trabajador == null) && ($turno == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND lotes.lote = '$lote' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($maquina == null) && ($hilo == null) && ($trabajador == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND composiciones.id = '$composicion' AND turnos.turno = '$turno' AND lotes.lote = '$lote' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($composicion == null) && ($hilo == null) && ($trabajador == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND maquinas.id = '$maquina' AND turnos.turno = '$turno' AND lotes.lote = '$lote' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($dibujo == null) && ($turno == null) && ($lote == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($dibujo == null) && ($maquina == null) && ($lote == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND turnos.turno = '$turno' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($dibujo == null) && ($maquina == null) && ($turno == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND lotes.lote = '$lote' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($dibujo == null) && ($lote == null) && ($composicion == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND maquinas.id = '$maquina' AND turnos.turno = '$turno' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($dibujo == null) && ($turno == null) && ($composicion == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND maquinas.id = '$maquina' AND lotes.lote = '$lote' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($dibujo == null) && ($maquina == null) && ($composicion == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND turnos.turno = '$turno' AND lotes.lote = '$lote' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($dibujo == null) && ($hilo == null) && ($lote == null)){
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND turnos.turno = '$turno' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($dibujo == null) && ($hilo == null) && ($turno == null)){
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND lotes.lote = '$lote' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($dibujo == null) && ($hilo == null) && ($maquina == null)){
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND composiciones.id = '$composicion' AND turnos.turno = '$turno' AND lotes.lote = '$lote' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($dibujo == null) && ($hilo == null) && ($composicion == null)){
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND maquinas.id = '$maquina' AND turnos.turno = '$turno' AND lotes.lote = '$lote' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($dibujo == null) && ($trabajador == null) && ($lote == null)){
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND turnos.turno = '$turno' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($dibujo == null) && ($trabajador == null) && ($turno == null)){
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND lotes.lote = '$lote' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($dibujo == null) && ($trabajador == null) && ($maquina == null)){
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND turnos.turno = '$turno' AND lotes.lote = '$lote' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($dibujo == null) && ($trabajador == null) && ($composicion == null)){
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE hilos.nombreHilo = '$hilo' AND maquinas.id = '$maquina' AND turnos.turno = '$turno' AND lotes.lote = '$lote' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($dibujo == null) && ($trabajador == null) && ($hilo == null)){
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND turnos.turno = '$turno' AND lotes.lote = '$lote' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($turno == null) && ($lote == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($maquina == null) && ($lote == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND turnos.turno = '$turno' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($maquina == null) && ($turno == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND lotes.lote = '$lote' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($composicion == null) && ($turno == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND maquinas.id = '$maquina' AND turnos.turno = '$turno' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($composicion == null) && ($turno == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND maquinas.id = '$maquina' AND lotes.lote = '$lote' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($composicion == null) && ($maquina == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND turnos.turno = '$turno' AND lotes.lote = '$lote' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($lote == null) && ($hilo == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND turnos.turno = '$turno' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($turno == null) && ($hilo == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND lotes.lote = '$lote' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($maquina == null) && ($hilo == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND composiciones.id = '$composicion' AND turnos.turno = '$turno' AND lotes.lote = '$lote' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($hilo == null) && ($composicion == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND maquinas.id = '$maquina' AND turnos.turno = '$turno' AND lotes.lote = '$lote' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($trabajador == null) && ($lote == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND turnos.turno = '$turno' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($trabajador == null) && ($turno == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND lotes.lote = '$lote' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($maquina == null) && ($trabajador == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND turnos.turno = '$turno' AND lotes.lote = '$lote' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($composicion == null) && ($trabajador == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND hilos.nombreHilo = '$hilo' AND maquinas.id = '$maquina' AND turnos.turno = '$turno' AND lotes.lote = '$lote' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($hilo == null) && ($trabajador == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND turnos.turno = '$turno' AND lotes.lote = '$lote' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($dibujo == null) && ($lote == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND turnos.turno = '$turno' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($dibujo == null) && ($turno == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND lotes.lote = '$lote' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($dibujo == null) && ($maquina == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND turnos.turno = '$turno' AND lotes.lote = '$lote' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($dibujo == null) && ($composicion == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND maquinas.id = '$maquina' AND turnos.turno = '$turno' AND lotes.lote = '$lote' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($dibujo == null) && ($hilo == null)){
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND turnos.turno = '$turno' AND lotes.lote = '$lote' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($dibujo == null) && ($trabajador == null)){
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND turnos.turno = '$turno' AND lotes.lote = '$lote' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($lote == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND turnos.turno = '$turno' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($turno == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND lotes.lote = '$lote' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($maquina == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND turnos.turno = '$turno' AND lotes.lote = '$lote' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($composicion == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND maquinas.id = '$maquina' AND turnos.turno = '$turno' AND lotes.lote = '$lote' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($hilo == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND turnos.turno = '$turno' AND lotes.lote = '$lote' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($trabajador == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND turnos.turno = '$turno' AND lotes.lote = '$lote' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($dibujo == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND turnos.turno = '$turno' AND lotes.lote = '$lote' AND produccion.fecha BETWEEN '$fecha1' AND '$fecha2'";
    }elseif (($dibujo == null) && ($hilo == null) && ($lote == null) && ($maquina == null) && ($trabajador == null) && ($turno == null) && ($fecha2 == null)) {
        $consulta = "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
             FROM produccion
             INNER JOIN empleados ON produccion.trabajador_id=empleados.id
             INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
             INNER JOIN hilos ON produccion.hilo_id = hilos.id
             INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
             INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
             INNER JOIN turnos ON produccion.turno_id = turnos.id
             INNER JOIN lotes ON produccion.lote_id = lotes.id
             WHERE composiciones.id = '$composicion' AND produccion.fecha = '$fecha1'";
    }elseif (($composicion == null) && ($hilo == null) && ($lote == null) && ($maquina == null) && ($trabajador == null) && ($turno == null) && ($fecha2 == null)) {
        $consulta1 = "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
                 FROM produccion
                 INNER JOIN empleados ON produccion.trabajador_id=empleados.id
                 INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
                 INNER JOIN hilos ON produccion.hilo_id = hilos.id
                 INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
                 INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
                 INNER JOIN turnos ON produccion.turno_id = turnos.id
                 INNER JOIN lotes ON produccion.lote_id = lotes.id
                 WHERE dibujos.id = '$dibujo' AND produccion.fecha = '$fecha1'";
    }elseif (($composicion == null) && ($dibujo == null) && ($lote == null) && ($maquina == null) && ($trabajador == null) && ($turno == null) && ($fecha2 == null)) {
        $consulta = "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
             FROM produccion
             INNER JOIN empleados ON produccion.trabajador_id=empleados.id
             INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
             INNER JOIN hilos ON produccion.hilo_id = hilos.id
             INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
             INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
             INNER JOIN turnos ON produccion.turno_id = turnos.id
             INNER JOIN lotes ON produccion.lote_id = lotes.id
             WHERE hilos.nombreHilo = '$hilo' AND produccion.fecha = '$fecha1'";
    }elseif (($composicion == null) && ($dibujo == null) && ($hilo == null) && ($maquina == null) && ($trabajador == null) && ($turno == null) && ($fecha2 == null)) {
        $consulta = "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
             FROM produccion
             INNER JOIN empleados ON produccion.trabajador_id=empleados.id
             INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
             INNER JOIN hilos ON produccion.hilo_id = hilos.id
             INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
             INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
             INNER JOIN turnos ON produccion.turno_id = turnos.id
             INNER JOIN lotes ON produccion.lote_id = lotes.id
             WHERE lotes.lote = '$lote' AND produccion.fecha = '$fecha1'";
    }elseif (($composicion == null) && ($dibujo == null) && ($hilo == null) && ($lote == null) && ($trabajador == null) && ($turno == null) && ($fecha2 == null)) {
        $consulta = "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
             FROM produccion
             INNER JOIN empleados ON produccion.trabajador_id=empleados.id
             INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
             INNER JOIN hilos ON produccion.hilo_id = hilos.id
             INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
             INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
             INNER JOIN turnos ON produccion.turno_id = turnos.id
             INNER JOIN lotes ON produccion.lote_id = lotes.id
             WHERE maquinas.id = '$maquina' AND produccion.fecha = '$fecha1'";
    }elseif (($composicion == null) && ($dibujo == null) && ($hilo == null) && ($lote == null) && ($maquina == null) && ($turno == null) && ($fecha2 == null)) {
        $consulta = "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
                 FROM produccion
                 INNER JOIN empleados ON produccion.trabajador_id=empleados.id
                 INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
                 INNER JOIN hilos ON produccion.hilo_id = hilos.id
                 INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
                 INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
                 INNER JOIN turnos ON produccion.turno_id = turnos.id
                 INNER JOIN lotes ON produccion.lote_id = lotes.id
                 WHERE empleados.id = '$trabajador' AND produccion.fecha = '$fecha1'";
    }elseif (($composicion == null) && ($dibujo == null) && ($hilo == null) && ($lote == null) && ($maquina == null) && ($trabajador == null) && ($fecha2 == null)) {
        $consulta = "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
             FROM produccion
             INNER JOIN empleados ON produccion.trabajador_id=empleados.id
             INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
             INNER JOIN hilos ON produccion.hilo_id = hilos.id
             INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
             INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
             INNER JOIN turnos ON produccion.turno_id = turnos.id
             INNER JOIN lotes ON produccion.lote_id = lotes.id
             WHERE turnos.turno = '$turno' AND produccion.fecha = '$fecha1'";
    }elseif (($composicion == null) && ($dibujo == null) && ($hilo == null) && ($trabajador == null) && ($turno == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE lotes.lote = '$lote' AND maquinas.id = '$maquina' AND produccion.fecha = '$fecha1'";
    }elseif (($composicion == null) && ($hilo == null) && ($lote == null) && ($trabajador == null) && ($turno == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND maquinas.id = '$maquina' AND produccion.fecha = '$fecha1'";
    }elseif (($composicion == null) && ($dibujo == null) && ($hilo == null) && ($lote == null) && ($turno == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND maquinas.id = '$maquina' AND produccion.fecha = '$fecha1'";
    }elseif (($composicion == null) && ($dibujo == null) && ($lote == null) && ($trabajador == null) && ($turno == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE hilos.nombreHilo = '$hilo' AND maquinas.id = '$maquina' AND produccion.fecha = '$fecha1'";
    }elseif (($dibujo == null) && ($hilo == null) && ($lote == null) && ($trabajador == null) && ($turno == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND produccion.fecha = '$fecha1'";
    }elseif (($composicion == null) && ($dibujo == null) && ($hilo == null) && ($lote == null) && ($trabajador == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE turnos.turno = '$turno' AND maquinas.id = '$maquina' AND produccion.fecha = '$fecha1'";
    }elseif (($composicion == null) && ($lote == null) && ($trabajador == null) && ($turno == null) && ($maquina == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND hilos.nombreHilo = '$hilo' AND produccion.fecha = '$fecha1'";
    }elseif (($hilo == null) && ($lote == null) && ($trabajador == null) && ($turno == null) && ($maquina == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND composiciones.id = '$composicion' AND produccion.fecha = '$fecha1'";
    }elseif (($hilo == null) && ($lote == null) && ($trabajador == null) && ($composicion == null) && ($maquina == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND turnos.turno = '$turno' AND produccion.fecha = '$fecha1'";
    }elseif (($hilo == null) && ($turno == null) && ($trabajador == null) && ($composicion == null) && ($maquina == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha1'";
    }elseif (($hilo == null) && ($turno == null) && ($lote == null) && ($composicion == null) && ($maquina == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND produccion.fecha = '$fecha1'";
    }elseif (($dibujo == null) && ($turno == null) && ($lote == null) && ($composicion == null) && ($maquina == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE hilos.nombreHilo = '$hilo' AND empleados.id = '$trabajador' AND produccion.fecha = '$fecha1'";
    }elseif (($dibujo == null) && ($turno == null) && ($lote == null) && ($hilo == null) && ($maquina == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE composiciones.id = '$composicion' AND empleados.id = '$trabajador' AND produccion.fecha = '$fecha1'";
    }elseif (($dibujo == null) && ($composicion == null) && ($lote == null) && ($hilo == null) && ($maquina == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE turnos.turno = '$turno' AND empleados.id = '$trabajador' AND produccion.fecha = '$fecha1'";
    }elseif (($dibujo == null) && ($composicion == null) && ($turno == null) && ($hilo == null) && ($maquina == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE lotes.lote = '$lote' AND empleados.id = '$trabajador' AND produccion.fecha = '$fecha1'";
    }elseif (($dibujo == null) && ($composicion == null) && ($turno == null) && ($trabajador == null) && ($maquina == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE lotes.lote = '$lote' AND hilos.nombreHilo = '$hilo' AND produccion.fecha = '$fecha1'";
    }elseif (($dibujo == null) && ($composicion == null) && ($lote == null) && ($trabajador == null) && ($maquina == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE turnos.turno = '$turno' AND hilos.nombreHilo = '$hilo' AND produccion.fecha = '$fecha1'";
    }elseif (($dibujo == null) && ($turno == null) && ($lote == null) && ($trabajador == null) && ($maquina == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE composiciones.id = '$composicion' AND hilos.nombreHilo = '$hilo' AND produccion.fecha = '$fecha1'";
    }elseif (($dibujo == null) && ($hilo == null) && ($lote == null) && ($trabajador == null) && ($maquina == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE turnos.turno = '$turno' AND composiciones.id = '$composicion' AND produccion.fecha = '$fecha1'";
    }elseif (($dibujo == null) && ($hilo == null) && ($turno == null) && ($trabajador == null) && ($maquina == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE lotes.lote = '$lote' AND composiciones.id = '$composicion' AND produccion.fecha = '$fecha1'";
    }elseif (($dibujo == null) && ($hilo == null) && ($composicion == null) && ($trabajador == null) && ($maquina == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE lotes.lote = '$lote' AND turnos.turno = '$turno' AND produccion.fecha = '$fecha1'";
    }elseif (($turno == null) && ($lote == null) && ($composicion == null) && ($maquina == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND produccion.fecha = '$fecha1'";
    }elseif (($turno == null) && ($lote == null) && ($hilo == null) && ($maquina == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND composiciones.id = '$composicion' AND produccion.fecha = '$fecha1'";
    }elseif (($turno == null) && ($lote == null) && ($hilo == null) && ($composicion == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND maquinas.id = '$maquina' AND produccion.fecha = '$fecha1'";
    }elseif (($turno == null) && ($lote == null) && ($hilo == null) && ($composicion == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND turnos.turno = '$turno' AND produccion.fecha = '$fecha1'";
    }elseif (($maquina == null) && ($turno == null) && ($hilo == null) && ($composicion == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha1'";
    }elseif (($maquina == null) && ($turno == null) && ($trabajador == null) && ($composicion == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND hilos.nombreHilo = '$hilo' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha1'";
    }elseif (($maquina == null) && ($turno == null) && ($trabajador == null) && ($lote == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND produccion.fecha = '$fecha1'";
    }elseif (($composicion == null) && ($turno == null) && ($trabajador == null) && ($lote == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND hilos.nombreHilo = '$hilo' AND maquinas.id = '$maquina' AND produccion.fecha = '$fecha1'";
    }elseif (($composicion == null) && ($maquina == null) && ($trabajador == null) && ($lote == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND hilos.nombreHilo = '$hilo' AND turnos.turno = '$turno' AND produccion.fecha = '$fecha1'";
    }elseif (($turno == null) && ($hilo == null) && ($trabajador == null) && ($lote == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND produccion.fecha = '$fecha1'";
    }elseif (($maquina == null) && ($hilo == null) && ($trabajador == null) && ($lote == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND composiciones.id = '$composicion' AND turnos.turno = '$turno' AND produccion.fecha = '$fecha1'";
    }elseif (($maquina == null) && ($hilo == null) && ($trabajador == null) && ($turno == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND composiciones.id = '$composicion' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha1'";
    }elseif (($composicion == null) && ($hilo == null) && ($trabajador == null) && ($lote == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND maquinas.id = '$maquina' AND turnos.turno = '$turno' AND produccion.fecha = '$fecha1'";
    }elseif (($composicion == null) && ($hilo == null) && ($trabajador == null) && ($turno== null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND maquinas.id = '$maquina' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha1'";
    }elseif (($composicion == null) && ($hilo == null) && ($trabajador == null) && ($maquina == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND turnos.turno = '$turno' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha1'";
    }elseif (($dibujo == null) && ($turno == null) && ($lote == null) && ($maquina == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND produccion.fecha = '$fecha1'";
    }elseif (($dibujo == null) && ($turno == null) && ($lote == null) && ($composicion == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND maquinas.id = '$maquina' AND produccion.fecha = '$fecha1'";
    }elseif (($dibujo == null) && ($maquina == null) && ($lote == null) && ($composicion == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND turnos.turno = '$turno' AND produccion.fecha = '$fecha1'";
    }elseif (($dibujo == null) && ($maquina == null) && ($turno == null) && ($composicion == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha1'";
    }elseif (($dibujo == null) && ($hilo == null) && ($turno == null) && ($lote == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND produccion.fecha = '$fecha1'";
    }elseif (($dibujo == null) && ($hilo == null) && ($maquina == null) && ($lote == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND composiciones.id = '$composicion' AND turnos.turno = '$turno' AND produccion.fecha = '$fecha1'";
    }elseif (($dibujo == null) && ($hilo == null) && ($maquina == null) && ($turno == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND composiciones.id = '$composicion' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha1'";
    }elseif (($dibujo == null) && ($hilo == null) && ($composicion == null) && ($lote == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND maquinas.id = '$maquina' AND turnos.turno = '$turno' AND produccion.fecha = '$fecha1'";
    }elseif (($dibujo == null) && ($hilo == null) && ($composicion == null) && ($turno == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND maquinas.id = '$maquina' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha1'";
    }elseif (($dibujo == null) && ($hilo == null) && ($composicion == null) && ($maquina == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND turnos.turno = '$turno' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha1'";
    }elseif (($dibujo == null) && ($trabajador == null) && ($turno == null) && ($lote == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND produccion.fecha = '$fecha1'";
    }elseif (($dibujo == null) && ($trabajador == null) && ($maquina == null) && ($lote == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND turnos.turno = '$turno' AND produccion.fecha = '$fecha1'";
    }elseif (($dibujo == null) && ($trabajador == null) && ($maquina == null) && ($turno == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha1'";
    }elseif (($dibujo == null) && ($trabajador == null) && ($composicion == null) && ($lote == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE hilos.nombreHilo = '$hilo' AND maquinas.id = '$maquina' AND turnos.turno = '$turno' AND produccion.fecha = '$fecha1'";
    }elseif (($dibujo == null) && ($trabajador == null) && ($composicion == null) && ($turno == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE hilos.nombreHilo = '$hilo' AND maquinas.id = '$maquina' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha1'";
    }elseif (($dibujo == null) && ($trabajador == null) && ($composicion == null) && ($maquina == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE hilos.nombreHilo = '$hilo' AND turnos.turno = '$turno' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha1'";
    }elseif (($dibujo == null) && ($trabajador == null) && ($hilo == null) && ($lote == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND turnos.turno = '$turno' AND produccion.fecha = '$fecha1'";
    }elseif (($dibujo == null) && ($trabajador == null) && ($hilo == null) && ($turno == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha1'";
    }elseif (($dibujo == null) && ($trabajador == null) && ($hilo == null) && ($maquina == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE composiciones.id = '$composicion' AND turnos.turno = '$turno' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha1'";
    }elseif (($dibujo == null) && ($trabajador == null) && ($hilo == null) && ($composicion == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE maquinas.id = '$maquina' AND turnos.turno = '$turno' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha1'";
    }elseif (($turno == null) && ($lote == null) && ($maquina == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND produccion.fecha = '$fecha1'";
    }elseif (($composicion == null) && ($lote == null) && ($turno == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND maquinas.id = '$maquina' AND produccion.fecha = '$fecha1'";
    }elseif (($composicion == null) && ($lote == null) && ($maquina == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND turnos.turno = '$turno' AND produccion.fecha = '$fecha1'";
    }elseif (($composicion == null) && ($turno == null) && ($maquina == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha1'";
    }elseif (($turno == null) && ($trabajador == null) && ($lote == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND produccion.fecha = '$fecha1'";
    }elseif (($maquina == null) && ($trabajador == null) && ($lote == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND turnos.turno = '$turno' AND produccion.fecha = '$fecha1'";
    }elseif (($maquina == null) && ($trabajador == null) && ($turno == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha1'";
    }elseif (($turno == null) && ($lote == null) && ($hilo == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND produccion.fecha = '$fecha1'";
    }elseif (($maquina == null) && ($lote == null) && ($hilo == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND composiciones.id = '$composicion' AND turnos.turno = '$turno' AND produccion.fecha = '$fecha1'";
    }elseif (($maquina == null) && ($turno == null) && ($hilo == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND composiciones.id = '$composicion' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha1'";
    }elseif (($lote == null) && ($hilo == null) && ($composicion == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND maquinas.id = '$maquina'AND turnos.turno = '$turno' AND produccion.fecha = '$fecha1'";
    }elseif (($turno == null) && ($hilo == null) && ($composicion == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND maquinas.id = '$maquina'AND lotes.lote = '$lote' AND produccion.fecha = '$fecha1'";
    }elseif (($maquina == null) && ($hilo == null) && ($composicion == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND turnos.turno = '$turno' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha1'";
    }elseif (($composicion == null) && ($trabajador == null) && ($lote == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND hilos.nombreHilo = '$hilo' AND maquinas.id = '$maquina' AND turnos.turno = '$turno' AND produccion.fecha = '$fecha1'";
    }elseif (($composicion == null) && ($trabajador == null) && ($turno == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND hilos.nombreHilo = '$hilo' AND maquinas.id = '$maquina' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha1'";
    }elseif (($composicion == null) && ($maquina == null) && ($trabajador == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND hilos.nombreHilo = '$hilo' AND turnos.turno = '$turno' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha1'";
    }elseif (($hilo == null) && ($trabajador == null) && ($lote == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND turnos.turno = '$turno' AND produccion.fecha = '$fecha1'";
    }elseif (($hilo == null) && ($trabajador == null) && ($turno == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha1'";
    }elseif (($maquina == null) && ($hilo == null) && ($trabajador == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND composiciones.id = '$composicion' AND turnos.turno = '$turno' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha1'";
    }elseif (($composicion == null) && ($hilo == null) && ($trabajador == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND maquinas.id = '$maquina' AND turnos.turno = '$turno' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha1'";
    }elseif (($dibujo == null) && ($turno == null) && ($lote == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND produccion.fecha = '$fecha1'";
    }elseif (($dibujo == null) && ($maquina == null) && ($lote == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND turnos.turno = '$turno' AND produccion.fecha = '$fecha1'";
    }elseif (($dibujo == null) && ($maquina == null) && ($turno == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha1'";
    }elseif (($dibujo == null) && ($lote == null) && ($composicion == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND maquinas.id = '$maquina' AND turnos.turno = '$turno' AND produccion.fecha = '$fecha1'";
    }elseif (($dibujo == null) && ($turno == null) && ($composicion == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND maquinas.id = '$maquina' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha1'";
    }elseif (($dibujo == null) && ($maquina == null) && ($composicion == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND turnos.turno = '$turno' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha1'";
    }elseif (($dibujo == null) && ($hilo == null) && ($lote == null) && ($fecha2 == null)){
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND turnos.turno = '$turno' AND produccion.fecha = '$fecha1'";
    }elseif (($dibujo == null) && ($hilo == null) && ($turno == null) && ($fecha2 == null)){
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha1'";
    }elseif (($dibujo == null) && ($hilo == null) && ($maquina == null) && ($fecha2 == null)){
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND composiciones.id = '$composicion' AND turnos.turno = '$turno' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha1'";
    }elseif (($dibujo == null) && ($hilo == null) && ($composicion == null) && ($fecha2 == null)){
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND maquinas.id = '$maquina' AND turnos.turno = '$turno' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha1'";
    }elseif (($dibujo == null) && ($trabajador == null) && ($lote == null) && ($fecha2 == null)){
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND turnos.turno = '$turno' AND produccion.fecha = '$fecha1'";
    }elseif (($dibujo == null) && ($trabajador == null) && ($turno == null) && ($fecha2 == null)){
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha1'";
    }elseif (($dibujo == null) && ($trabajador == null) && ($maquina == null) && ($fecha2 == null)){
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND turnos.turno = '$turno' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha1'";
    }elseif (($dibujo == null) && ($trabajador == null) && ($composicion == null) && ($fecha2 == null)){
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE hilos.nombreHilo = '$hilo' AND maquinas.id = '$maquina' AND turnos.turno = '$turno' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha1'";
    }elseif (($dibujo == null) && ($trabajador == null) && ($hilo == null) && ($fecha2 == null)){
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND turnos.turno = '$turno' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha1'";
    }elseif (($turno == null) && ($lote == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND produccion.fecha = '$fecha1'";
    }elseif (($maquina == null) && ($lote == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND turnos.turno = '$turno' AND produccion.fecha = '$fecha1'";
    }elseif (($maquina == null) && ($turno == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha1'";
    }elseif (($composicion == null) && ($turno == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND maquinas.id = '$maquina' AND turnos.turno = '$turno' AND produccion.fecha = '$fecha1'";
    }elseif (($composicion == null) && ($turno == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND maquinas.id = '$maquina' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha1'";
    }elseif (($composicion == null) && ($maquina == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND turnos.turno = '$turno' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha1'";
    }elseif (($lote == null) && ($hilo == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND turnos.turno = '$turno' AND produccion.fecha = '$fecha1'";
    }elseif (($turno == null) && ($hilo == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha1'";
    }elseif (($maquina == null) && ($hilo == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND composiciones.id = '$composicion' AND turnos.turno = '$turno' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha1'";
    }elseif (($hilo == null) && ($composicion == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND maquinas.id = '$maquina' AND turnos.turno = '$turno' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha1'";
    }elseif (($trabajador == null) && ($lote == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND turnos.turno = '$turno' AND produccion.fecha = '$fecha1'";
    }elseif (($trabajador == null) && ($turno == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha1'";
    }elseif (($maquina == null) && ($trabajador == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND turnos.turno = '$turno' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha1'";
    }elseif (($composicion == null) && ($trabajador == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND hilos.nombreHilo = '$hilo' AND maquinas.id = '$maquina' AND turnos.turno = '$turno' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha1'";
    }elseif (($hilo == null) && ($trabajador == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND turnos.turno = '$turno' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha1'";
    }elseif (($dibujo == null) && ($lote == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND turnos.turno = '$turno' AND produccion.fecha = '$fecha1'";
    }elseif (($dibujo == null) && ($turno == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha1'";
    }elseif (($dibujo == null) && ($maquina == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND turnos.turno = '$turno' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha1'";
    }elseif (($dibujo == null) && ($composicion == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND maquinas.id = '$maquina' AND turnos.turno = '$turno' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha1'";
    }elseif (($dibujo == null) && ($hilo == null) && ($fecha2 == null)){
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND turnos.turno = '$turno' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha1'";
    }elseif (($dibujo == null) && ($trabajador == null) && ($fecha2 == null)){
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND turnos.turno = '$turno' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha1'";
    }elseif (($lote == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND turnos.turno = '$turno' AND produccion.fecha = '$fecha1'";
    }elseif (($turno == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha1'";
    }elseif (($maquina == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND turnos.turno = '$turno' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha1'";
    }elseif (($composicion == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND maquinas.id = '$maquina' AND turnos.turno = '$turno' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha1'";
    }elseif (($hilo == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND turnos.turno = '$turno' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha1'";
    }elseif (($trabajador == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND turnos.turno = '$turno' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha1'";
    }elseif (($dibujo == null) && ($fecha2 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND turnos.turno = '$turno' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha1'";






    }elseif (($dibujo == null) && ($hilo == null) && ($lote == null) && ($maquina == null) && ($trabajador == null) && ($turno == null) && ($fecha1 == null)) {
        $consulta = "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
             FROM produccion
             INNER JOIN empleados ON produccion.trabajador_id=empleados.id
             INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
             INNER JOIN hilos ON produccion.hilo_id = hilos.id
             INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
             INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
             INNER JOIN turnos ON produccion.turno_id = turnos.id
             INNER JOIN lotes ON produccion.lote_id = lotes.id
             WHERE composiciones.id = '$composicion' AND produccion.fecha = '$fecha2'";
    }elseif (($composicion == null) && ($hilo == null) && ($lote == null) && ($maquina == null) && ($trabajador == null) && ($turno == null) && ($fecha1 == null)) {
        $consulta1 = "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
                 FROM produccion
                 INNER JOIN empleados ON produccion.trabajador_id=empleados.id
                 INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
                 INNER JOIN hilos ON produccion.hilo_id = hilos.id
                 INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
                 INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
                 INNER JOIN turnos ON produccion.turno_id = turnos.id
                 INNER JOIN lotes ON produccion.lote_id = lotes.id
                 WHERE dibujos.id = '$dibujo' AND produccion.fecha = '$fecha2'";
    }elseif (($composicion == null) && ($dibujo == null) && ($lote == null) && ($maquina == null) && ($trabajador == null) && ($turno == null) && ($fecha1 == null)) {
        $consulta = "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
             FROM produccion
             INNER JOIN empleados ON produccion.trabajador_id=empleados.id
             INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
             INNER JOIN hilos ON produccion.hilo_id = hilos.id
             INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
             INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
             INNER JOIN turnos ON produccion.turno_id = turnos.id
             INNER JOIN lotes ON produccion.lote_id = lotes.id
             WHERE hilos.nombreHilo = '$hilo' AND produccion.fecha = '$fecha2'";
    }elseif (($composicion == null) && ($dibujo == null) && ($hilo == null) && ($maquina == null) && ($trabajador == null) && ($turno == null) && ($fecha1 == null)) {
        $consulta = "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
             FROM produccion
             INNER JOIN empleados ON produccion.trabajador_id=empleados.id
             INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
             INNER JOIN hilos ON produccion.hilo_id = hilos.id
             INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
             INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
             INNER JOIN turnos ON produccion.turno_id = turnos.id
             INNER JOIN lotes ON produccion.lote_id = lotes.id
             WHERE lotes.lote = '$lote' AND produccion.fecha = '$fecha2'";
    }elseif (($composicion == null) && ($dibujo == null) && ($hilo == null) && ($lote == null) && ($trabajador == null) && ($turno == null) && ($fecha1 == null)) {
        $consulta = "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
             FROM produccion
             INNER JOIN empleados ON produccion.trabajador_id=empleados.id
             INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
             INNER JOIN hilos ON produccion.hilo_id = hilos.id
             INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
             INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
             INNER JOIN turnos ON produccion.turno_id = turnos.id
             INNER JOIN lotes ON produccion.lote_id = lotes.id
             WHERE maquinas.id = '$maquina' AND produccion.fecha = '$fecha2'";
    }elseif (($composicion == null) && ($dibujo == null) && ($hilo == null) && ($lote == null) && ($maquina == null) && ($turno == null) && ($fecha1 == null)) {
        $consulta = "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
                 FROM produccion
                 INNER JOIN empleados ON produccion.trabajador_id=empleados.id
                 INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
                 INNER JOIN hilos ON produccion.hilo_id = hilos.id
                 INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
                 INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
                 INNER JOIN turnos ON produccion.turno_id = turnos.id
                 INNER JOIN lotes ON produccion.lote_id = lotes.id
                 WHERE empleados.id = '$trabajador' AND produccion.fecha = '$fecha2'";
    }elseif (($composicion == null) && ($dibujo == null) && ($hilo == null) && ($lote == null) && ($maquina == null) && ($trabajador == null) && ($fecha1 == null)) {
        $consulta = "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
             FROM produccion
             INNER JOIN empleados ON produccion.trabajador_id=empleados.id
             INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
             INNER JOIN hilos ON produccion.hilo_id = hilos.id
             INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
             INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
             INNER JOIN turnos ON produccion.turno_id = turnos.id
             INNER JOIN lotes ON produccion.lote_id = lotes.id
             WHERE turnos.turno = '$turno' AND produccion.fecha = '$fecha2'";

    }elseif (($composicion == null) && ($dibujo == null) && ($hilo == null) && ($trabajador == null) && ($turno == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE lotes.lote = '$lote' AND maquinas.id = '$maquina' AND produccion.fecha = '$fecha2'";
    }elseif (($composicion == null) && ($hilo == null) && ($lote == null) && ($trabajador == null) && ($turno == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND maquinas.id = '$maquina' AND produccion.fecha = '$fecha2'";
    }elseif (($composicion == null) && ($dibujo == null) && ($hilo == null) && ($lote == null) && ($turno == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND maquinas.id = '$maquina' AND produccion.fecha = '$fecha2'";
    }elseif (($composicion == null) && ($dibujo == null) && ($lote == null) && ($trabajador == null) && ($turno == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE hilos.nombreHilo = '$hilo' AND maquinas.id = '$maquina' AND produccion.fecha = '$fecha2'";
    }elseif (($dibujo == null) && ($hilo == null) && ($lote == null) && ($trabajador == null) && ($turno == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND produccion.fecha = '$fecha2'";
    }elseif (($composicion == null) && ($dibujo == null) && ($hilo == null) && ($lote == null) && ($trabajador == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE turnos.turno = '$turno' AND maquinas.id = '$maquina' AND produccion.fecha = '$fecha2'";
    }elseif (($composicion == null) && ($lote == null) && ($trabajador == null) && ($turno == null) && ($maquina == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND hilos.nombreHilo = '$hilo' AND produccion.fecha = '$fecha2'";
    }elseif (($hilo == null) && ($lote == null) && ($trabajador == null) && ($turno == null) && ($maquina == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND composiciones.id = '$composicion' AND produccion.fecha = '$fecha2'";
    }elseif (($hilo == null) && ($lote == null) && ($trabajador == null) && ($composicion == null) && ($maquina == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND turnos.turno = '$turno' AND produccion.fecha = '$fecha2'";
    }elseif (($hilo == null) && ($turno == null) && ($trabajador == null) && ($composicion == null) && ($maquina == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha2'";
    }elseif (($hilo == null) && ($turno == null) && ($lote == null) && ($composicion == null) && ($maquina == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND produccion.fecha = '$fecha2'";
    }elseif (($dibujo == null) && ($turno == null) && ($lote == null) && ($composicion == null) && ($maquina == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE hilos.nombreHilo = '$hilo' AND empleados.id = '$trabajador' AND produccion.fecha = '$fecha2'";
    }elseif (($dibujo == null) && ($turno == null) && ($lote == null) && ($hilo == null) && ($maquina == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE composiciones.id = '$composicion' AND empleados.id = '$trabajador' AND produccion.fecha = '$fecha2'";
    }elseif (($dibujo == null) && ($composicion == null) && ($lote == null) && ($hilo == null) && ($maquina == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE turnos.turno = '$turno' AND empleados.id = '$trabajador' AND produccion.fecha = '$fecha2'";
    }elseif (($dibujo == null) && ($composicion == null) && ($turno == null) && ($hilo == null) && ($maquina == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE lotes.lote = '$lote' AND empleados.id = '$trabajador' AND produccion.fecha = '$fecha2'";
    }elseif (($dibujo == null) && ($composicion == null) && ($turno == null) && ($trabajador == null) && ($maquina == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE lotes.lote = '$lote' AND hilos.nombreHilo = '$hilo' AND produccion.fecha = '$fecha2'";
    }elseif (($dibujo == null) && ($composicion == null) && ($lote == null) && ($trabajador == null) && ($maquina == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE turnos.turno = '$turno' AND hilos.nombreHilo = '$hilo' AND produccion.fecha = '$fecha2'";
    }elseif (($dibujo == null) && ($turno == null) && ($lote == null) && ($trabajador == null) && ($maquina == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE composiciones.id = '$composicion' AND hilos.nombreHilo = '$hilo' AND produccion.fecha = '$fecha2'";
    }elseif (($dibujo == null) && ($hilo == null) && ($lote == null) && ($trabajador == null) && ($maquina == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE turnos.turno = '$turno' AND composiciones.id = '$composicion' AND produccion.fecha = '$fecha2'";
    }elseif (($dibujo == null) && ($hilo == null) && ($turno == null) && ($trabajador == null) && ($maquina == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE lotes.lote = '$lote' AND composiciones.id = '$composicion' AND produccion.fecha = '$fecha2'";
    }elseif (($dibujo == null) && ($hilo == null) && ($composicion == null) && ($trabajador == null) && ($maquina == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE lotes.lote = '$lote' AND turnos.turno = '$turno' AND produccion.fecha = '$fecha2'";
    }elseif (($turno == null) && ($lote == null) && ($composicion == null) && ($maquina == null) && ($$fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND produccion.fecha = '$fecha2'";
    }elseif (($turno == null) && ($lote == null) && ($hilo == null) && ($maquina == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND composiciones.id = '$composicion' AND produccion.fecha = '$fecha2'";
    }elseif (($turno == null) && ($lote == null) && ($hilo == null) && ($composicion == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND maquinas.id = '$maquina' AND produccion.fecha = '$fecha2'";
    }elseif (($turno == null) && ($lote == null) && ($hilo == null) && ($composicion == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND turnos.turno = '$turno' AND produccion.fecha = '$fecha2'";
    }elseif (($maquina == null) && ($turno == null) && ($hilo == null) && ($composicion == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha2'";
    }elseif (($maquina == null) && ($turno == null) && ($trabajador == null) && ($composicion == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND hilos.nombreHilo = '$hilo' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha2'";
    }elseif (($maquina == null) && ($turno == null) && ($trabajador == null) && ($lote == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND produccion.fecha = '$fecha2'";
    }elseif (($composicion == null) && ($turno == null) && ($trabajador == null) && ($lote == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND hilos.nombreHilo = '$hilo' AND maquinas.id = '$maquina' AND produccion.fecha = '$fecha2'";
    }elseif (($composicion == null) && ($maquina == null) && ($trabajador == null) && ($lote == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND hilos.nombreHilo = '$hilo' AND turnos.turno = '$turno' AND produccion.fecha = '$fecha2'";
    }elseif (($turno == null) && ($hilo == null) && ($trabajador == null) && ($lote == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND produccion.fecha = '$fecha2'";
    }elseif (($maquina == null) && ($hilo == null) && ($trabajador == null) && ($lote == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND composiciones.id = '$composicion' AND turnos.turno = '$turno' AND produccion.fecha = '$fecha2'";
    }elseif (($maquina == null) && ($hilo == null) && ($trabajador == null) && ($turno == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND composiciones.id = '$composicion' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha2'";
    }elseif (($composicion == null) && ($hilo == null) && ($trabajador == null) && ($lote == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND maquinas.id = '$maquina' AND turnos.turno = '$turno' AND produccion.fecha = '$fecha2'";
    }elseif (($composicion == null) && ($hilo == null) && ($trabajador == null) && ($turno== null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND maquinas.id = '$maquina' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha2'";
    }elseif (($composicion == null) && ($hilo == null) && ($trabajador == null) && ($maquina == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND turnos.turno = '$turno' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha2'";
    }elseif (($dibujo == null) && ($turno == null) && ($lote == null) && ($maquina == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND produccion.fecha = '$fecha2'";
    }elseif (($dibujo == null) && ($turno == null) && ($lote == null) && ($composicion == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND maquinas.id = '$maquina' AND produccion.fecha = '$fecha2'";
    }elseif (($dibujo == null) && ($maquina == null) && ($lote == null) && ($composicion == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND turnos.turno = '$turno' AND produccion.fecha = '$fecha2'";
    }elseif (($dibujo == null) && ($maquina == null) && ($turno == null) && ($composicion == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha2'";
    }elseif (($dibujo == null) && ($hilo == null) && ($turno == null) && ($lote == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND produccion.fecha = '$fecha2'";
    }elseif (($dibujo == null) && ($hilo == null) && ($maquina == null) && ($lote == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND composiciones.id = '$composicion' AND turnos.turno = '$turno' AND produccion.fecha = '$fecha2'";
    }elseif (($dibujo == null) && ($hilo == null) && ($maquina == null) && ($turno == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND composiciones.id = '$composicion' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha2'";
    }elseif (($dibujo == null) && ($hilo == null) && ($composicion == null) && ($lote == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND maquinas.id = '$maquina' AND turnos.turno = '$turno' AND produccion.fecha = '$fecha2'";
    }elseif (($dibujo == null) && ($hilo == null) && ($composicion == null) && ($turno == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND maquinas.id = '$maquina' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha2'";
    }elseif (($dibujo == null) && ($hilo == null) && ($composicion == null) && ($maquina == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND turnos.turno = '$turno' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha2'";
    }elseif (($dibujo == null) && ($trabajador == null) && ($turno == null) && ($lote == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND produccion.fecha = '$fecha2'";
    }elseif (($dibujo == null) && ($trabajador == null) && ($maquina == null) && ($lote == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND turnos.turno = '$turno' AND produccion.fecha = '$fecha2'";
    }elseif (($dibujo == null) && ($trabajador == null) && ($maquina == null) && ($turno == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha2'";
    }elseif (($dibujo == null) && ($trabajador == null) && ($composicion == null) && ($lote == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE hilos.nombreHilo = '$hilo' AND maquinas.id = '$maquina' AND turnos.turno = '$turno' AND produccion.fecha = '$fecha2'";
    }elseif (($dibujo == null) && ($trabajador == null) && ($composicion == null) && ($turno == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE hilos.nombreHilo = '$hilo' AND maquinas.id = '$maquina' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha2'";
    }elseif (($dibujo == null) && ($trabajador == null) && ($composicion == null) && ($maquina == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE hilos.nombreHilo = '$hilo' AND turnos.turno = '$turno' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha2'";
    }elseif (($dibujo == null) && ($trabajador == null) && ($hilo == null) && ($lote == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND turnos.turno = '$turno' AND produccion.fecha = '$fecha2'";
    }elseif (($dibujo == null) && ($trabajador == null) && ($hilo == null) && ($turno == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha2'";
    }elseif (($dibujo == null) && ($trabajador == null) && ($hilo == null) && ($maquina == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE composiciones.id = '$composicion' AND turnos.turno = '$turno' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha2'";
    }elseif (($dibujo == null) && ($trabajador == null) && ($hilo == null) && ($composicion == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE maquinas.id = '$maquina' AND turnos.turno = '$turno' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha2'";
    }elseif (($turno == null) && ($lote == null) && ($maquina == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND produccion.fecha = '$fecha2'";
    }elseif (($composicion == null) && ($lote == null) && ($turno == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND maquinas.id = '$maquina' AND produccion.fecha = '$fecha2'";
    }elseif (($composicion == null) && ($lote == null) && ($maquina == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND turnos.turno = '$turno' AND produccion.fecha = '$fecha2'";
    }elseif (($composicion == null) && ($turno == null) && ($maquina == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha2'";
    }elseif (($turno == null) && ($trabajador == null) && ($lote == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND produccion.fecha = '$fecha2'";
    }elseif (($maquina == null) && ($trabajador == null) && ($lote == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND turnos.turno = '$turno' AND produccion.fecha = '$fecha2'";
    }elseif (($maquina == null) && ($trabajador == null) && ($turno == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha2'";
    }elseif (($turno == null) && ($lote == null) && ($hilo == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND produccion.fecha = '$fecha2'";
    }elseif (($maquina == null) && ($lote == null) && ($hilo == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND composiciones.id = '$composicion' AND turnos.turno = '$turno' AND produccion.fecha = '$fecha2'";
    }elseif (($maquina == null) && ($turno == null) && ($hilo == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND composiciones.id = '$composicion' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha2'";
    }elseif (($lote == null) && ($hilo == null) && ($composicion == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND maquinas.id = '$maquina'AND turnos.turno = '$turno' AND produccion.fecha = '$fecha2'";
    }elseif (($turno == null) && ($hilo == null) && ($composicion == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND maquinas.id = '$maquina'AND lotes.lote = '$lote' AND produccion.fecha = '$fecha2'";
    }elseif (($maquina == null) && ($hilo == null) && ($composicion == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND turnos.turno = '$turno' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha2'";
    }elseif (($composicion == null) && ($trabajador == null) && ($lote == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND hilos.nombreHilo = '$hilo' AND maquinas.id = '$maquina' AND turnos.turno = '$turno' AND produccion.fecha = '$fecha2'";
    }elseif (($composicion == null) && ($trabajador == null) && ($turno == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND hilos.nombreHilo = '$hilo' AND maquinas.id = '$maquina' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha2'";
    }elseif (($composicion == null) && ($maquina == null) && ($trabajador == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND hilos.nombreHilo = '$hilo' AND turnos.turno = '$turno' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha2'";
    }elseif (($hilo == null) && ($trabajador == null) && ($lote == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND turnos.turno = '$turno' AND produccion.fecha = '$fecha2'";
    }elseif (($hilo == null) && ($trabajador == null) && ($turno == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha2'";
    }elseif (($maquina == null) && ($hilo == null) && ($trabajador == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND composiciones.id = '$composicion' AND turnos.turno = '$turno' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha2'";
    }elseif (($composicion == null) && ($hilo == null) && ($trabajador == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND maquinas.id = '$maquina' AND turnos.turno = '$turno' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha2'";
    }elseif (($dibujo == null) && ($turno == null) && ($lote == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND produccion.fecha = '$fecha2'";
    }elseif (($dibujo == null) && ($maquina == null) && ($lote == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND turnos.turno = '$turno' AND produccion.fecha = '$fecha2'";
    }elseif (($dibujo == null) && ($maquina == null) && ($turno == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha2'";
    }elseif (($dibujo == null) && ($lote == null) && ($composicion == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND maquinas.id = '$maquina' AND turnos.turno = '$turno' AND produccion.fecha = '$fecha2'";
    }elseif (($dibujo == null) && ($turno == null) && ($composicion == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND maquinas.id = '$maquina' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha2'";
    }elseif (($dibujo == null) && ($maquina == null) && ($composicion == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND turnos.turno = '$turno' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha2'";
    }elseif (($dibujo == null) && ($hilo == null) && ($lote == null) && ($fecha1 == null)){
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND turnos.turno = '$turno' AND produccion.fecha = '$fecha2'";
    }elseif (($dibujo == null) && ($hilo == null) && ($turno == null) && ($fecha1 == null)){
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha2'";
    }elseif (($dibujo == null) && ($hilo == null) && ($maquina == null) && ($fecha1 == null)){
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND composiciones.id = '$composicion' AND turnos.turno = '$turno' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha2'";
    }elseif (($dibujo == null) && ($hilo == null) && ($composicion == null) && ($fecha1 == null)){
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND maquinas.id = '$maquina' AND turnos.turno = '$turno' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha2'";
    }elseif (($dibujo == null) && ($trabajador == null) && ($lote == null) && ($fecha1 == null)){
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND turnos.turno = '$turno' AND produccion.fecha = '$fecha2'";
    }elseif (($dibujo == null) && ($trabajador == null) && ($turno == null) && ($fecha1 == null)){
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha2'";
    }elseif (($dibujo == null) && ($trabajador == null) && ($maquina == null) && ($fecha1 == null)){
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND turnos.turno = '$turno' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha2'";
    }elseif (($dibujo == null) && ($trabajador == null) && ($composicion == null) && ($fecha1 == null)){
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE hilos.nombreHilo = '$hilo' AND maquinas.id = '$maquina' AND turnos.turno = '$turno' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha2'";
    }elseif (($dibujo == null) && ($trabajador == null) && ($hilo == null) && ($fecha1 == null)){
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND turnos.turno = '$turno' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha2'";
    }elseif (($turno == null) && ($lote == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND produccion.fecha = '$fecha2'";
    }elseif (($maquina == null) && ($lote == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND turnos.turno = '$turno' AND produccion.fecha = '$fecha2'";
    }elseif (($maquina == null) && ($turno == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha2'";
    }elseif (($composicion == null) && ($turno == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND maquinas.id = '$maquina' AND turnos.turno = '$turno' AND produccion.fecha = '$fecha2'";
    }elseif (($composicion == null) && ($turno == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND maquinas.id = '$maquina' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha2'";
    }elseif (($composicion == null) && ($maquina == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND turnos.turno = '$turno' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha2'";
    }elseif (($lote == null) && ($hilo == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND turnos.turno = '$turno' AND produccion.fecha = '$fecha2'";
    }elseif (($turno == null) && ($hilo == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha2'";
    }elseif (($maquina == null) && ($hilo == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND composiciones.id = '$composicion' AND turnos.turno = '$turno' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha2'";
    }elseif (($hilo == null) && ($composicion == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND maquinas.id = '$maquina' AND turnos.turno = '$turno' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha2'";
    }elseif (($trabajador == null) && ($lote == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND turnos.turno = '$turno' AND produccion.fecha = '$fecha2'";
    }elseif (($trabajador == null) && ($turno == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha2'";
    }elseif (($maquina == null) && ($trabajador == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND turnos.turno = '$turno' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha2'";
    }elseif (($composicion == null) && ($trabajador == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND hilos.nombreHilo = '$hilo' AND maquinas.id = '$maquina' AND turnos.turno = '$turno' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha2'";
    }elseif (($hilo == null) && ($trabajador == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND turnos.turno = '$turno' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha2'";
    }elseif (($dibujo == null) && ($lote == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND turnos.turno = '$turno' AND produccion.fecha = '$fecha2'";
    }elseif (($dibujo == null) && ($turno == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha2'";
    }elseif (($dibujo == null) && ($maquina == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND turnos.turno = '$turno' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha2'";
    }elseif (($dibujo == null) && ($composicion == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND maquinas.id = '$maquina' AND turnos.turno = '$turno' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha2'";
    }elseif (($dibujo == null) && ($hilo == null) && ($fecha1 == null)){
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND turnos.turno = '$turno' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha2'";
    }elseif (($dibujo == null) && ($trabajador == null) && ($fecha1 == null)){
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND turnos.turno = '$turno' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha2'";
    }elseif (($lote == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND turnos.turno = '$turno' AND produccion.fecha = '$fecha2'";
    }elseif (($turno == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha2'";
    }elseif (($maquina == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND turnos.turno = '$turno' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha2'";
    }elseif (($composicion == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND maquinas.id = '$maquina' AND turnos.turno = '$turno' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha2'";
    }elseif (($hilo == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND empleados.id = '$trabajador' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND turnos.turno = '$turno' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha2'";
    }elseif (($trabajador == null) && ($fecha1 == null)) {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE dibujos.id = '$dibujo' AND hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND turnos.turno = '$turno' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha2'";
    }else {
        $consulta= "SELECT ID_usuario,empleados.nombres,dibujos.dibujo,hilos.nombreHilo,composiciones.composicion,maquinas.numero,turnos.turno,lotes.lote,produccion.fecha,produccion.rollo,produccion.kg
            FROM produccion
            INNER JOIN empleados ON produccion.trabajador_id=empleados.id
            INNER JOIN dibujos ON produccion.dibujo_id = dibujos.id
            INNER JOIN hilos ON produccion.hilo_id = hilos.id
            INNER JOIN composiciones ON produccion.composicion_id = composiciones.id
            INNER JOIN maquinas ON produccion.maquina_id = maquinas.id
            INNER JOIN turnos ON produccion.turno_id = turnos.id
            INNER JOIN lotes ON produccion.lote_id = lotes.id
            WHERE empleados.id = '$trabajador' AND hilos.nombreHilo = '$hilo' AND composiciones.id = '$composicion' AND maquinas.id = '$maquina' AND turnos.turno = '$turno' AND lotes.lote = '$lote' AND produccion.fecha = '$fecha2'";
    }

      ?>
<table border="1">
  <tr style="background-color:magenta; ">
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
 $resultado = $mysqli->query($consulta);
    //while ($row=mysqli_fetch_assoc($consulta)) {

        while($row = $resultado->fetch_assoc()){
      ?>

      <tr>
          <td><?php echo $row['ID_usuario']; ?></td>
          <td><?php echo $row['nombres']; ?></td>
          <td><?php echo $row['dibujo']; ?></td>
          <td><?php echo $row['nombreHilo']; ?></td>
          <td><?php echo $row['composicion']; ?></td>
          <td><?php echo $row['numero']; ?></td>
          <td><?php echo $row['turno']; ?></td>
          <td><?php echo $row['lote']; ?></td>
          <td><?php echo $row['fecha']; ?></td>
          <td><?php echo $row['rollo']; ?></td>
          <td><?php echo $row['kg']; ?></td>
          </tr> 

      <?php
        }
        ?>