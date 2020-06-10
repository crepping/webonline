<?php
function Conectar(){
if (! ($cnn=mysqli_connect("localhost","aiepnet1_root","Jugando123")))
{
	mysqli_error();
	exit();
}
if (!mysqli_select_db($cnn,"aiepnet1_proyecto"))
{
	exit();
}
return $cnn;
}
?>