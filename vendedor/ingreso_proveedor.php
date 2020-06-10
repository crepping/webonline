<?php
include ("../../login/session.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>SB Admin 2 - Tables</title>
  <!-- Custom fonts for this template -->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <!-- Custom styles for this template -->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">
  <link href="../css/sweetalert.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  
</head>

<body id="page-top">
    <div id="wrapper">
<!-- Sidebar -->
<?php include '../menu/menu.php'; ?>
<div id="content-wrapper" class="d-flex flex-column">
<div id="content">
        
        <!-- Submenu -->
        <?php include '../menu/submenu.php'; ?>
<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Ingresar Productos</h1>
              </div>
              <form class="user" id="formulario" method="post" action="../f_guardar/in_proveedor.php">
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" oninput="checkRut(this)" name="rut" id="rut" placeholder="Rut Cliente o Empresa" >
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" id="exampleLastName" name="social" placeholder="Razon Social" required>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="Text" class="form-control form-control-user" id="exampleInputPassword" name="telefono" placeholder="Telefono" required>
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" id="exampleRepeatPassword" name="email" placeholder="Email" required>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="Text" class="form-control form-control-user" id="exampleInputPassword" name="dir" placeholder="Direccion" required>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="Text" class="form-control form-control-user" id="exampleInputPassword" name="cont" placeholder="Contacto" required>
                  </div>
                </div>
                <button type="submit" id="btnEnviar" name="btnEnviar" class="btn btn-primary btn-user btn-block">
                  Ingresar Producto
                </button>
                <hr>
              </form>
              <br>
              <hr>
            <p class="respuesta">
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
</div>
</div>
  </div>
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="../../index.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin-2.min.js"></script>
  <!-- Page level plugins -->
  <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script>
  $(document).ready(function () {
    $("#formulario").bind("submit",function(){
        // Capturamnos el boton de envío
        var btnEnviar = $("#btnEnviar");
        $.ajax({
            type: $(this).attr("method"),
            url: $(this).attr("action"),
            data:$(this).serialize(),
            beforeSend: function(){
                /*
                * Esta función se ejecuta durante el envió de la petición al
                * servidor.
                * */
                // btnEnviar.text("Enviando"); Para button 
                btnEnviar.val("Enviando"); // Para input de tipo button
                btnEnviar.attr("disabled","disabled");
            },
            complete:function(data){
                /*
                * Se ejecuta al termino de la petición
                * */
                btnEnviar.val("Enviar formulario");
                btnEnviar.removeAttr("disabled");
            },
            success: function(data){
                /*
                * Se ejecuta cuando termina la petición y esta ha sido
                * correcta
                * */
             
                $(".respuesta").html(data);
               
            },
            error: function(data){
                /*
                * Se ejecuta si la peticón ha sido erronea
                * */
                alert("Problemas al tratar de enviar el formulario");
            }
        });
        // Nos permite cancelar el envio del formulario
        return false;
    });
});

  </script>
  <!-- Page level custom scripts -->
  <!-- <script>
  $('#id').click(function(){
    swal({
        title: "Seguro que quieres hacer esto?",
          text: "Esta acción ya no se podrá deshacer, Así que piénsalo bien.",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Si, estoy seguro',
          cancelButtonText: "Cancelar"
        });
});
  </script> -->
  <script src="../js/demo/datatables-demo.js"></script>
<!------ Validador Rut------->
 <script src="../js/validar.js"></script>
<script src="../js/sweetalert.min.js"></script>
</body>
</html>
