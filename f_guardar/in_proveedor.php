<?php
include "../config/config.php";
$cnn = Conectar();
$rut = $_POST['rut'];
$nom = $_POST['social'];
$tel = $_POST['telefono'];
$email = $_POST['email'];
$dir =$_POST['dir'];
$cont =$_POST['cont'];
$hoy = date("Y-m-d H:i:s");

$ver ="SELECT * FROM proveedor WHERE rut ='$rut' ";
$busqueda= mysqli_query($cnn,$ver);
if(mysqli_num_rows($busqueda)>0) { 
   echo"<br>"."<br>";
//echo"<script>alert('El producto ya Existe')</script>";
//echo"<script type='text/javascript'>window.location='../pages/ingreso_proveedor.php'</script>";
echo "<script> swal({
  position: 'top-center',
  icon: 'error',
  title: 'El Proveedor ya Existe',
  buttons: false,
  timer: 1500
});</script>";

//echo '<div class="alert alert-danger"><strong>Oh no!</strong> Reserva ya Reservada.</div>';
} else {
$in="insert into proveedor(rut,empresa,vendedor,email,telefono,direccion,ingreso_fecha) values ('$rut','$nom','$cont','$email','$tel','$dir','$hoy')";   
$dato=mysqli_query($cnn,$in); 
if (!$dato) {
echo"<br>"."<br>";
  //echo"<script>alert('Error de ingresar producto')</script>";
  echo "<script> swal({
    title: '¡ERROR!',
    icon: 'error',
    text: 'Al ingresar el Proveedor',
    type: 'error',
  });</script>";
}else{
echo"<br>"."<br>";

echo '<div class="alert alert-success"><strong>Excelente!</strong> Proveedor Ingresado.</div>';
//echo"<script>alert('Producto Ingreso')</script>";
//echo"<script type='text/javascript'>window.location='../pages/ingreso_proveedor.php'</script>";
//echo"<script type='text/javascript'>window.location='alumnotodos.php'</script>";
}
}
?>