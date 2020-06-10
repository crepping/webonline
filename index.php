
<?php
error_reporting(0);
include("funciones/config.php");
session_start();
?>

<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
  
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Bienvenido</h1>
                  </div>
                  <form class="user" method="POST">
                    <div class="form-group">
                      <input type="Text" class="form-control form-control-user"  name="login" aria-describedby="emailHelp" placeholder="Ingresa Usuario...">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="exampleInputPassword" name="pass" placeholder="Contraseña">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>
                    <button  type="Submit" name="btnAceptar" value="Aceptar" class="btn btn-primary btn-user btn-block">
                      Conectar
                    </button>
                    
                    <hr>
                    <a href="index.html" class="btn btn-google btn-user btn-block">
                      <i class="fab fa-google fa-fw"></i> Login with Google
                    </a>
                    <a href="index.html" class="btn btn-facebook btn-user btn-block">
                      <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                    </a>
                  </form>
                  <?php  
if($_POST['btnAceptar'] == "Aceptar") 
{
   
   $user=$_POST['login'];
   $clave=$_POST['pass'];
   $sql="Select * from usuario where user='$user' and pasword='$clave'";
   $cnn= Conectar();
$rs=mysqli_query($cnn,$sql);

if (mysqli_num_rows($rs)!=0) 
   
   {
  
   if ($row=mysqli_fetch_array($rs)) 
   {  
$_SESSION['$nuestroNombre']=$row["nombres"];
$_SESSION['$apellidos']=$row["apellidos"];
//$_SESSION['$nestroCargo']=$row["cargo"];
$_SESSION['$nuestroTipo']=$row["tipo"];
$_SESSION['$id_login']=$row["id"];

   
   switch ($_SESSION['$nuestrotipo']=$row["tipo"]) 
   {

     case 1:
       echo"<script>alert('Bienvenido(a)')</script>";
        echo"<script type='text/javascript'>window.location='vendedor/bus_ingreso_reserva.php';</script>";
     break;

     case 2:
      echo"<script>alert('Bienvenido(a)')</script>";
       echo"<script type='text/javascript'>window.location='acp_precitacion1.php';</script>";
       break;
     
     case 3:
      echo"<script>alert('Bienvenido(a)')</script>";
       echo"<script type='text/javascript'>window.location='acp_precitacion1.php';</script>";
       break;

     default:
       echo"<script>alert('Usted no es usuario') </script>";
       echo"<script type='text/javascript'>window.location='index.php';</script>";
       break;
    

    }
    }
    
    }else{

      echo"<script>alert('usuario o clave Incorrecta') </script>";
        
   }
}
?>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="register.html">Create an Account!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
