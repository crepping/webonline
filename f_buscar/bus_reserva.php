<?php
//  include '../config/config.php';
// // include '../../login/session.php';
// $cnn=Conectar();
// if (!empty($_POST)){
//     if ($_POST['action']=='infoProducto'){
        
//  $variable=$_POST['codigo'];
//  $sql ="select *from vehiculo where id_cliente ='$variable'" ;
//  //"rut_apoderado='$variable'
// $rs = mysqli_query($cnn,$sql);

//             if ( $row = mysqli_fetch_assoc($rs) ) {
                
              
//                echo json_encode($row,JSON_UNESCAPED_UNICODE);
//                   exit;
//             }
//             echo "error";
//             exit;
//         }
//     }
$conexion = mysqli_connect("localhost","aiepnet1_root","Jugando123","aiepnet1_proyecto");
if (isset($_POST['codigo1'])){
         if ($_POST['action']=='infoProducto'){
            $variable=$_POST['codigo1'];
            $query = mysqli_query($conexion,"select * from reserva where id_reserva='$variable'");
            ?>
            <?php
            while ($dat=mysqli_fetch_assoc($query)){
                $auto= 0;
               $id=$dat['id_reserva'];
               $auto=$dat['id_vehiculo'];
               $cod =$dat['id_cliente'];
               
               ?>
               
               
               <?php 
            }
            ?>
            <input type="hidden" class="form-control form-control-user codigo" id="exampleInputPassword" name="cod" value="<?php echo $id; ?>" required>
          <?php 
         }else{
         
        echo "Error 1";
         }
    }else{
    
    	echo "Error 2";
    }
 ?>



 
 