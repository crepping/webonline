<?php
error_reporting(0);
$mysqli =new mysqli("localhost","aiepnet1_root","Jugando123","aiepnet1_proyecto");

$salida ="";
$query ="SELECT * FROM cliente ORDER BY id_cliente ASC LIMIT 10";
if (isset($_POST['consulta'])) {
	$q = $mysqli->real_escape_string($_POST['consulta']);
	$query = "SELECT * FROM cliente ORDER BY id_cliente ASC LIMIT 10";
}
$resultado = $mysqli->query($query);
if ($resultado->num_rows >0){
	$salida.="
				<tr>
                <td></td>
                <td></td>
				    <td>Codigo</td>
					<td>Rut</td>
					<td>Nombres</td>
					<td>Apellidos</td>
                    <td>Telefono</td>
                    <td>Email</td>
                    <td>Fecha Ingreso</td>
				</tr>
				</thead>
				<tbody>";
	while($fila=$resultado->fetch_assoc()){
		$number++;
		$salida.="<tr>
                    <td><a class=\"btn btn-success product\" codigo=".$fila['id_cliente']." data-toggle=\"modal\" data-target=\"#Ingreso\"><i class=\"fas fa-edit\"></i></a></td>
                   <td><a class=\"btn btn-danger\" href=\"funciones/borrar_reserva.php?id_reserva=".$fila['id_reserva']."\"><i class=\"fas fa-trash-alt\"></i></a></td>
					<td>".$fila['id_cliente']."</td>
                    <td>".$fila['rut']."</td>
					<td>".$fila['nombres']."</td>
                    <td>".$fila['apellidos']."</td>
                    <td>".$fila['telefono']."</td>
                    <td>".$fila['email_cl']."</td>
                    <td>".$fila['fecha_ingreso']."</td>
					
				</tr>";	
	}
	$salida.="";
}else{
	$salida.="no hay datos";

	}
	$mysqli->close();
	echo $salida;
	 
?>