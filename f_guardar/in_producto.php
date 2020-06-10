<?php
include "../config/config.php";
$cnn = Conectar();
$codigo = $_POST['barra'];
$nom = $_POST['nomb'];
$des = $_POST['Des'];
$pre = $_POST['precio'];
$stock =$_POST['stock'];
$hoy = date("Y-m-d H:i:s");

$ver ="SELECT * FROM mis_productos WHERE Barra ='$codigo' ";
$busqueda= mysqli_query($cnn,$ver);
if(mysqli_num_rows($busqueda)>0) { 
   echo"<br>"."<br>";
echo"<script>alert('El producto ya Existe')</script>";
echo"<script type='text/javascript'>window.location='../pages/ingresoproductos.php'</script>";
} else {
$in="insert into mis_productos(Barra,name,description,price,Stock,created) values ('$codigo','$nom','$des','$pre','$stock','$hoy')";   
$dato=mysqli_query($cnn,$in); 
if (!$dato) {
echo"<br>"."<br>";
  echo"<script>alert('Error de ingresar producto')</script>";
}else{
echo"<br>"."<br>";
echo"<script>alert('Producto Ingreso')</script>";
echo"<script type='text/javascript'>window.location='../pages/ingresoproductos.php'</script>";
//echo"<script type='text/javascript'>window.location='alumnotodos.php'</script>";
}
}
?>