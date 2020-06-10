
<?php 
include '../login/session.php';
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

  <!-- Custom styles for this template -->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php include '../menu/menu.php'; ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">
        
        <!-- Submenu -->
        <?php include '../menu/submenu.php'; ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Tables</h1>
          <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="productos" width="100%" cellspacing="0">
                  <thead>
                    <?php include '../f_buscar/re_canceladas.php'?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php include '../menu/footer.php'; ?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="Ingreso" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">RESERVAR HORA</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Estas seguro de Reservar?.
        <form method="post" id="reserva"  onsubmit="event.preventDefault(); sendDataProduct();">
        <div class="col-sm-6">
                    <input type="hidden" class="form-control form-control-user" id="codigo" name="codigo" placeholder="Stock" required>
                 </div>
                 <BR>
                 <BR>
                 <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                 <button class="btn btn-primary" id="ingresar" type="submit">Reservar</button>
        </form>
        <HR>
        <BR>
        <BR>
        <div class="col-sm-6">
        <p class="estado"></p>
        </div>
        </div>
        <div class="modal-footer">
        <!--
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <button class="btn btn-primary" id="ingresar" type="submit">Reservar</button>
          -->
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="Ingreso1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">BORRAR RESERVAR</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Estas seguro de Reservar Borrar la Reserva?.
        <form method="post" id="reserva1"  onsubmit="event.preventDefault(); sendDataProduct1();">
        <div class="col-sm-6">
                    <input type="hidden" class="form-control form-control-user" id="codigo1" name="codigo1" placeholder="Stock" required>
                 </div>
                 <BR>
                 <BR>
                 <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                 <button class="btn btn-primary" id="ingresar1" type="submit">Borrar Reserva</button>
        </form>
        <HR>
        <BR>
        <BR>
        <div class="col-sm-6">
        <p class="estado1"></p>
        </div>
        </div>
        <div class="modal-footer">
        <!--
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <button class="btn btn-primary" id="ingresar" type="submit">Reservar</button>
          -->
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

  <!-- Page level custom scripts -->
  <!--Envio Mensaje -->
  <script type="text/javascript">
   $('.product').click(function(event){
    event.preventDefault();
    var codigo = $(this).attr('codigo');
    var action = 'infoProducto';
    $.ajax({
      url:'../f_buscar/bus_reserva.php',
      type: 'POST',
      async:true,
      data:{action:action,codigo:codigo},
    
    success:function(response){
      console.log(response);
      if(response != 'error'){
        var info = JSON.parse(response);
        console.log(info);
        //$('#codigo').val(info.id_cliente);
        //$('#car').text(response.patente);
        for (var i =0; i< info.length; i++){
          $('#codigo').val(info[i].id_reserva);
          $('#car').val(info[i].id_cliente);
          
        }
      }
    },
    error:function(error){
      console.log(error);
    }
    });
    $('#Ingreso').fadeIn();
   });
   //funcion Recargar web

   function actualizar(){
     location.reload(true);
     }

   //Agregar Productos//
   function sendDataProduct(){
     $('.alertAddProduct').html('');
     $.ajax({
      url:'../f_update/re_confirmar.php',
      type: 'POST',
      async:true,
      data:$('#reserva').serialize(),
      
    success:function(data){
      //console.log(data);
      if(data =='error'){
        $('.estado').html(data);
        setInterval("actualizar()",2000);
      }else{
       
        $('.estado').html(data);
        setInterval("actualizar()",2000);
      }
      
     
    },
    error:function(error){
      console.log(error);
    }
    });
   }

   function closemodal(){
     $('.modal').fadeOut();
   }
  </script>

  <!-- MODAL DE BORRADO DE RESERVAS-->
  <script type="text/javascript">
   $('.product1').click(function(event){
    event.preventDefault();
    var borrar = $(this).attr('borrar');
    var action = 'infoProducto1';
    $.ajax({
      url:'../f_buscar/bus_borrar_reserva.php',
      type: 'POST',
      async:true,
      data:{action:action,borrar:borrar},
    
    success:function(response){
      console.log(response);
      if(response != 'error'){
        var info = JSON.parse(response);
        console.log(info);
       // $('#codigo1').val(info.id_reserva);
        //$('#car').text(response.patente);
        for (var i =0; i< info.length; i++){
          $('#codigo1').val(info[i].id_reserva);
          $('#car').val(info[i].id_cliente);
        }
      }
    },
    error:function(error){
      console.log(error);
    }
    });
    $('#Ingreso1').fadeIn();
   });

   //Agregar Productos//
   function sendDataProduct1(){
     $('.alertAddProduct').html('');
     $.ajax({
      url:'../f_update/re_borrar_reserva.php',
      type: 'POST',
      async:true,
      data:$('#reserva1').serialize(),
      
    success:function(data){
      //console.log(data);
      if(data =='error'){
        $('.estado1').html(data);
        setInterval("actualizar()",2000);
      }else{
        $('.estado1').html(data);
        setInterval("actualizar()",2000);
      }
      
     
    },
    error:function(error){
      console.log(error);
    }
    });
   }

   function closemodal(){
     $('.modal').fadeOut();
   }
  </script>
  <script>
$(document).ready(function() {
$('div.dataTables_filter input').focus();
$('#productos').DataTable({
'language': {
'url': '//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json'
}
} );
} );
</script>
</body>
</html>
