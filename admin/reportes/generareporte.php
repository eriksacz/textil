<?php
  require('php/conexion.php');
 
session_start();
 
 if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
 
 } else {
  echo "Inicia Sesion para acceder a este contenido.<br>";
  echo "<br><a href='login.html'>Login</a>";
  header('Location: ../../index.html'); //redirige a la página de login si el usuario quiere ingresar sin iniciar sesion
 
 
 exit;
 }
 
 $now = time();
 
 if($now > $_SESSION['expire']) {
 session_destroy();
 header('Location: ../../index.html');//redirige a la página de login, modifica la url a tu conveniencia
 echo "Tu sesion a expirado,
 <a href='vista/index.html'>Inicia Sesion</a>";
 exit;
 }
 
 
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generacion de Reporte</title>
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="css/util.css">
        <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->
    <script type="text/javascript" src="js/main.js"></script>

  </head>
  <body>
    <div class="class=col-xl-1-12">
  		<div class="container-login100" style="background-image: url('images/textil.jpeg');">
        <div class="container-fluid">
          <div class="card">
            <div class="card-header">
              Reporte:
              <a href="../menu.php" class="btn btn-danger" role="button" aria-pressed="true" style="float: right">Regrersar</a>
            </div>
            <div class="card-body">
              <div class="row justify-content-md-center">
                <div class="col-4">
                  <div class="list-group" id="list-tab" role="tablist">
                    <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-pdf" role="tab" aria-controls="home">PDF</a>
                    <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-excel" role="tab" aria-controls="profile">EXCEL</a>
                  </div>
                </div>
                <div class="col-32">
                  <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="list-pdf" role="tabpanel" aria-labelledby="list-home-list">
                      
                      <div id="fecha" name="fecha" class="element">
                      	  <form action="reportes/pdf.php" method="post">
                          <div class="form-row">
                            <div class="col">
                            De: <input class="form-control" type="date" name="fecha1">
                            </div>
                            <div class="col">
                            Hasta: <input class="form-control" type="date" name="fecha2">
                            </div>
                            <div class="col">
                            Dibujo:
                              <select class="form-control" name="draw">
                                <option></option>
                                <?php
                                $sql = "SELECT id, dibujo FROM dibujos";
                                $query = $mysqli->query($sql);
                                while ($valores2 = mysqli_fetch_array($query)) {
                                  echo "<option value=$valores2[id]>$valores2[dibujo]</option>";
                                }?>
                              </select>
                            </div>
                            </div>
                            <div class="form-row">
                            <div class="col">
                            Trabajador:
                              <select class="form-control" name="trabajador">
                                <option></option>
                                <?php
                                $sql1 = "SELECT id, nombres FROM empleados";
                                $query1 = $mysqli->query($sql1);
                                while ($valores1 = mysqli_fetch_array($query1)) {
                                  echo "<option value=$valores1[id]>$valores1[nombres]</option>";
                                }?>
                              </select>
                            </div>
                            <div class="col">
                            Hilo:<br/>
                              <select class="form-control" name="hilo">
                                <option></option>
                                <?php
                                $sql2 = "SELECT nombreHilo FROM hilos";
                                $query2 = $mysqli->query($sql2);
                                while ($valores2 = mysqli_fetch_array($query2)) {
                                  echo "<option value=$valores2[nombreHilo]>$valores2[nombreHilo]</option>";
                                }
                                 ?>
                              </select>
                            </div>
                            <div class="col">
                            Composición:<br/>
                              <select class="form-control" name="composicion">
                                <option></option>
                                <!--<option value="24/1 100% algodon oe">24/1 100% algodon oe</option>
                                <option value="22/1 100% algodon oe">22/1 100% algodon oe</option>-->
                                <?php
                                $sql3 = "SELECT id, composicion FROM composiciones";
                                $query3 = $mysqli->query($sql3);
                                while ($valores3 = mysqli_fetch_array($query3)) {
                                  echo "<option value=$valores3[id]>$valores3[composicion]</option>";
                                }
                                 ?>
                              </select>
                            </div>
                            </div>
                            <div class="form-row">
                            <div class="col">
                            Máquina:<br/>
                              <select class="form-control" name="maquina">
                                <option></option>
                                <?php
                                $sql4 = "SELECT id, numero FROM maquinas";
                                $query4 = $mysqli->query($sql4);
                                while ($valores4 = mysqli_fetch_array($query4)) {
                                  echo "<option value=$valores4[id]>$valores4[numero]</option>";
                                }
                                 ?>
                              </select>
                            </div>
                            <div class="col">
                            Turno:<br/>
                              <select class="form-control" name="turno">
                                <option></option>
                                <?php
                                $sql5 = "SELECT turno FROM turnos";
                                $query5 = $mysqli->query($sql5);
                                while ($valores5 = mysqli_fetch_array($query5)) {
                                  echo "<option value=$valores5[turno]>$valores5[turno]</option>";
                                }
                                 ?>
                              </select>
                            </div>
                            <div class="col">
                            Lote:<br/>
                              <select class="form-control" name="lote">
                                <option></option>
                                <?php
                                $sql6 = "SELECT lote FROM lotes";
                                $query6 = $mysqli->query($sql6);
                                while ($valores6 = mysqli_fetch_array($query6)) {
                                  echo "<option value=$valores6[lote]>$valores6[lote]</option>";
                                }
                                 ?>
                              </select>
                            </div>
                            </div>
                               <br>
                               <input class="btn btn-primary" type="submit" name="send" value="Enviar" />
                          </form>
                      </div>    	
                    </div>



                    <!--Este es el codigo del excel para la vista-->
                    <div class="tab-pane fade" id="list-excel" role="tabpanel" aria-labelledby="list-profile-list">
                    <form action="reportes/excel.php" method="post">
                          <div class="form-row">
                            <div class="col">
                            De: <input class="form-control" type="date" name="fecha1">
                            </div>
                            <div class="col">
                            Hasta: <input class="form-control" type="date" name="fecha2">
                            </div>
                            <div class="col">
                            Dibujo:
                              <select class="form-control" name="draw">
                                <option></option>
                                <?php
                                $sql = "SELECT id, dibujo FROM dibujos";
                                $query = $mysqli->query($sql);
                                while ($valores2 = mysqli_fetch_array($query)) {
                                  echo "<option value=$valores2[id]>$valores2[dibujo]</option>";
                                }?>
                              </select>
                            </div>
                            </div>
                            <div class="form-row">
                            <div class="col">
                            Trabajador:
                              <select class="form-control" name="trabajador">
                                <option></option>
                                <?php
                                $sql1 = "SELECT id, nombres FROM empleados";
                                $query1 = $mysqli->query($sql1);
                                while ($valores1 = mysqli_fetch_array($query1)) {
                                  echo "<option value=$valores1[id]>$valores1[nombres]</option>";
                                }?>
                              </select>
                            </div>
                            <div class="col">
                            Hilo:<br/>
                              <select class="form-control" name="hilo">
                                <option></option>
                                <?php
                                $sql2 = "SELECT nombreHilo FROM hilos";
                                $query2 = $mysqli->query($sql2);
                                while ($valores2 = mysqli_fetch_array($query2)) {
                                  echo "<option value=$valores2[nombreHilo]>$valores2[nombreHilo]</option>";
                                }
                                 ?>
                              </select>
                            </div>
                            <div class="col">
                            Composición:<br/>
                              <select class="form-control" name="composicion">
                                <option></option>
                                <!--<option value="24/1 100% algodon oe">24/1 100% algodon oe</option>
                                <option value="22/1 100% algodon oe">22/1 100% algodon oe</option>-->
                                <?php
                                $sql3 = "SELECT id, composicion FROM composiciones";
                                $query3 = $mysqli->query($sql3);
                                while ($valores3 = mysqli_fetch_array($query3)) {
                                  echo "<option value=$valores3[id]>$valores3[composicion]</option>";
                                }
                                 ?>
                              </select>
                            </div>
                            </div>
                            <div class="form-row">
                            <div class="col">
                            Máquina:<br/>
                              <select class="form-control" name="maquina">
                                <option></option>
                                <?php
                                $sql4 = "SELECT id, numero FROM maquinas";
                                $query4 = $mysqli->query($sql4);
                                while ($valores4 = mysqli_fetch_array($query4)) {
                                  echo "<option value=$valores4[id]>$valores4[numero]</option>";
                                }
                                 ?>
                              </select>
                            </div>
                            <div class="col">
                            Turno:<br/>
                              <select class="form-control" name="turno">
                                <option></option>
                                <?php
                                $sql5 = "SELECT turno FROM turnos";
                                $query5 = $mysqli->query($sql5);
                                while ($valores5 = mysqli_fetch_array($query5)) {
                                  echo "<option value=$valores5[turno]>$valores5[turno]</option>";
                                }
                                 ?>
                              </select>
                            </div>
                            <div class="col">
                            Lote:<br/>
                              <select class="form-control" name="lote">
                                <option></option>
                                <?php
                                $sql6 = "SELECT lote FROM lotes";
                                $query6 = $mysqli->query($sql6);
                                while ($valores6 = mysqli_fetch_array($query6)) {
                                  echo "<option value=$valores6[lote]>$valores6[lote]</option>";
                                }
                                 ?>
                              </select>
                            </div>
                            </div>
                               <br>
                               <input class="btn btn-primary" type="submit" name="send" value="Enviar" />
                          </form>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<!--===============================================================================================-->
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/daterangepicker/moment.min.js"></script>
<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="js/main.js"></script>
</body>
</html>
