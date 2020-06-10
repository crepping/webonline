<?php
include "../funciones/config.php";
$cnn = Conectar();
$codigo = $_POST['cod'];
$patente = $_POST['codigo'];
$ingreso = $_POST['datepicker'];
$hora = $_POST['hora'];
$hoy = date("Y-m-d H:i:s");

$ver ="SELECT * FROM reserva WHERE fecha_reserv ='$ingreso' and Hora='$hora'";
$busqueda= mysqli_query($cnn,$ver);
if(mysqli_num_rows($busqueda)>0) { 
   echo"<br>"."<br>";
   echo '<div class="alert alert-danger"><strong>Oh no!</strong> Reserva no disponible.</div>';
   $error =array("Error");
   json_encode($error);
} else {
$in="insert into reserva(id_cliente,id_vehiculo,fecha_reserv,Hora,ingreso_fecha) values ('$codigo','$patente','$ingreso','$hora','$hoy')";   
$dato=mysqli_query($cnn,$in); 
if (!$dato) {
  echo '<div class="alert alert-danger"><strong>Oh no!</strong> Error al ingresar Los datos</div>';
}else{
echo"<br>"."<br>";
echo '<div class="alert alert-success"><strong>Oh no!</strong> Reserva Ingresada</div>';
//echo"<script type='text/javascript'>window.location='../pages/ingresoproductos.php'</script>";
//echo"<script type='text/javascript'>window.location='alumnotodos.php'</script>";
    }
  }

?>