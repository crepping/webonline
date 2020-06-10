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
if (isset($_POST['codigo'])){
         if ($_POST['action']=='infoProducto'){
            $variable=$_POST['codigo'];
            $query = mysqli_query($conexion,"select * from vehiculo where id_cliente='$variable'");
            ?>
            <select class="form-control form-control-user" id="car" name="car" onchange="myFunction()" required>
                 <option>Seleccione Una Patente</option>
            <?php
            while ($dat=mysqli_fetch_assoc($query)){
                $auto= 0;
               $id=$dat['patente'];
               $auto=$dat['id_vehiculo'];
               $cod =$dat['id_cliente'];
               
               ?> 
              
               <option value="<?php echo $auto; ?>"><?php echo $id;?></option>
               
               <?php 
            }
            ?>
            </select>
            <input type="hidden" class="form-control form-control-user codigo" id="exampleInputPassword" name="cod" value="<?php echo $cod; ?>" required>
          <?php 
         }else{
         
        echo "Error 1";
         }
    }else{
    
    	echo "Error 2";
    }
 ?>


 
 