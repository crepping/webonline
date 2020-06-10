<?php
// error_reporting(0);
// $mysqli =new mysqli("localhost","root","","proyecto");
// $salida ="";
// $variable=$_POST['codigo'];
// $query ="update reserva set estado_reserva=2 Where id_reserva='$variable'";
// $resultado = $mysqli->query($query);
// if($resultado >2){
// 	echo '<div class="alert alert-danger"><strong>Oh no!</strong> Reserva ya Agendada</div>';
// }else{
// echo '<div class="alert alert-Success"><strong>Excelente</strong> Reserva Aceptada.</div>';
// }
// //echo '<div class="alert alert-Success"><strong>Excelente</strong> Reserva Aceptada.</div>';
// ob_start(); 
//   //header("refresh: 1; url = ../reservapendientes.php"); 
// ob_end_flush();
// 	$mysqli->close();
// 	echo $salida; 
include "../funciones/config.php";
$cnn = Conectar();
$codigo = $_POST['borrar'];

$ver ="SELECT * FROM reserva WHERE estado_reserva = '3' and id_reserva='$codigo'";
$busqueda= mysqli_query($cnn,$ver);
if(mysqli_num_rows($busqueda)>0) { 
   echo"<br>"."<br>";
   echo '<div class="alert alert-danger"><strong>Oh no!</strong> Reserva ya fue Cancelada.</div>';
   $error =array("Error");
   json_encode($error);
} else {
$in="update reserva set estado_reserva=3 Where id_reserva='$codigo'";   
$dato=mysqli_query($cnn,$in); 
if (!$dato) {
  echo '<div class="alert alert-danger"><strong>Oh no!</strong> Error al Cancelar La Reserva</div>';
}else{
echo"<br>"."<br>";
echo '<div class="alert alert-success"><strong>Excelente!</strong> Reserva Cancelada</div>';
//echo"<script type='text/javascript'>window.location='../pages/ingresoproductos.php'</script>";
//echo"<script type='text/javascript'>window.location='alumnotodos.php'</script>";
    }
  }

?>
