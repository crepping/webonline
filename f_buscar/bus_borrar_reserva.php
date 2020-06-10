<?php
ini_set('display_errors', 1);
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
if (!empty($_POST)){
         if ($_POST['action']=='infoProducto1'){
            $variable=$_POST['borrar'];
            $query = mysqli_query($conexion,"select * from reserva where id_reserva='$variable'");
            while ($dat=mysqli_fetch_assoc($query)){
                $arr1[]=$dat;
            }
            echo json_encode($arr1);
         }
    }
 ?>


 
 