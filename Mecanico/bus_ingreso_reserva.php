
<?php 
include '../login/session.php';
//include '../f_buscar/ajax.php';
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
  <link href="../css/sb-admin-2.css" rel="stylesheet">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <!-- <script src="../js/fecha.js"></script> -->
  <!-- Custom styles for this page -->
  <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <script>
  $( function() {
    $( "#datepicker" ).datepicker({ 
      minDate: '+0d',
      dateFormat: 'dd-mm-yy'
    });
  });
  </script>
  <script>
 $.datepicker.regional['es'] = {
 closeText: 'Cerrar',
 prevText: '< Ant',
 nextText: 'Sig >',
 currentText: 'Hoy',
 monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
 monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
 dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
 dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
 dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
 weekHeader: 'Sm',
 dateFormat: 'dd/mm/yy',
 firstDay: 1,
 isRTL: false,
 showMonthAfterYear: false,
 yearSuffix: ''
 };
 $.datepicker.setDefaults($.datepicker.regional['es']);
$(function () {
$("#datepicker").datepicker();
});
</script>
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
          <h1 class="h3 mb-2 text-gray-800">Datos</h1>
          <p class="mb-4"> <a target="_blank" href="https://datatables.net"></a>.</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="productos" width="100%" cellspacing="0">
                  <thead>
                    <?php include '../f_buscar/bus_ingreso_reserva.php'?>
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
          <h5 class="modal-title" id="exampleModalLabel">Ingresar Reserva</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
        <form method="post" id="reserva"  onsubmit="event.preventDefault(); sendDataProduct();">
        <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <select class="form-control form-control-user" id="car" name="car"></select>
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" autocomplete="off" id="datepicker" name="datepicker" required>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                  <select class="form-control form-control-user" id= "hora" name="hora">
                  <option value="10:00">10:00</option>
                  <option value="11:00">11:00</option>
                  <option value="12:00">12:00</option>
                  <option value="13:00">13:00</option>
                  <option value="14:00">14:00</option>
                  <option value="15:00">15:00</option>
                  </select>
                  </div>
                  
                  <div class="col-sm-6">
                    <input type="hidden" class="form-control form-control-user" id="codigo" name="codigo" placeholder="Stock" required>
                 </div>
                 <p class="estado"></p>
                <!-- <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="Text" class="form-control form-control-user" id="exampleInputPassword" name="precio" placeholder="Precio" required>
                  </div>
                </div> -->
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" onclick="closemodal();" data-dismiss="modal">Cancelar</button>
          <button class="btn btn-primary" id="ingresar" type="submit">Ingresar Reserva</button>
        </div> 
      </form>
        </div>
    
      </div>
    </div>
  </div>
  <div class="modal fade" id="Ingresar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" onclick="closemodal();" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" type="submit">Logout</a>
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
  <script src="../js/custom.js"></script>
  <script src="../js/jquery-ui.js"></script>
  
  <!-- Page level plugins -->
  <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script type="text/javascript">
   $('.product').click(function(event){
    event.preventDefault();
    var codigo = $(this).attr('codigo');
    var action = 'infoProducto';
    $.ajax({
      url:'../f_buscar/ajax.php',
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
          $('#codigo').val(info[i].id_cliente);
          $('#car').val(info[i].id_cliente);
        }
        var imprimir = "";
        for (var i=0; i<info.length; i++){
        imprimir += "<option value='"+info[i].id_vehiculo+"'>"+info[i].patente+"</option>";
        }
        $("#car").html(imprimir);
      }
    },
    error:function(error){
      console.log(error);
    }
    });
    $('#Ingreso').fadeIn();
   });

   //Agregar Productos//
   function sendDataProduct(){
     $('.alertAddProduct').html('');
     $.ajax({
      url:'../f_guardar/reservar.php',
      type: 'POST',
      async:true,
      data:$('#reserva').serialize(),
      
    success:function(data){
      //console.log(data);
      if(data =='error'){
        $('.estado').html(data);
      }else{
        $('.estado').html(data);
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
