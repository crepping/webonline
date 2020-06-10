<?php
ini_set('display_errors', 1);
$mysqli = mysqli_connect("localhost","aiepnet1_root","Jugando123","aiepnet1_proyecto");

$salida ="";
$query ="select r.id_reserva,c.rut,c.nombres,c.apellidos,c.telefono,v.patente,r.fecha_reserv,r.Hora,r.ingreso_fecha from reserva r,cliente c, vehiculo v where r.id_cliente = r.id_cliente and c.id_cliente = r.id_cliente and r.id_cliente = v.id_vehiculo and r.estado_reserva =1";
if (isset($_POST['consulta'])) {
	$q = $mysqli->real_escape_string($_POST['consulta']);
	$query = "select r.id_reserva,c.rut,c.nombres,c.apellidos,c.telefono,v.patente,r.fecha_reserv,r.Hora,r.ingreso_fecha from reserva r,cliente c, vehiculo v where r.id_cliente = r.id_cliente and c.id_cliente = r.id_cliente and r.id_cliente = v.id_vehiculo and r.estado_reserva =1";
}
$resultado = $mysqli->query($query);
if ($resultado->num_rows >0){
	$salida.="
				<tr>
                <td></td>
                <td></td>
				    <td>Codigo</td>
					<td>Rut</td>
					<td>Nombre Cliente</td>
                    <td>Telefono</td>
					<td>Patente</td>
                    <td>Agendado</td>
                    <td>Hora</td>
                    <td>Fecha Ingreso</td>
				</tr>
				</thead>
				<tbody>";
	while($fila=$resultado->fetch_assoc()){
		//$number++;
		$salida.="<tr>
                    <td><a class=\"btn btn-success product\" codigo1=".$fila['id_reserva']." data-toggle=\"modal\" data-target=\"#Ingreso\"><i class=\"fas fa-edit\"></i></a></td>
                    <td><a class=\"btn btn-danger product1\" borrar=".$fila['id_reserva']." data-toggle=\"modal\" data-target=\"#Ingreso1\"><i class=\"far fa-trash-alt\"></i></a></td>
					<td>".$fila['id_reserva']."</td>
                    <td>".$fila['rut']."</td>
					<td>".$fila['nombres'].' '.$fila['apellidos']."</td>
                    <td>".$fila['telefono']."</td>
                    <td>".$fila['patente']."</td>
                    <td>".$fila['fecha_reserv']."</td>
                    <td>".$fila['Hora']."</td>
                    <td>".$fila['ingreso_fecha']."</td>
                   
					
				</tr>";	
	}
	$salida.="";
}else{
	$salida.="
	<div class='col-sm-6'>
	<div class='alert alert-danger'><strong>Oh no!</strong> no hay Reservas</div>
	<div class='col-sm-6'>
	";

	}
	$mysqli->close();
	echo $salida;
	 
?>