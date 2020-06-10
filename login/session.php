<?php
include ("../funciones/config.php");
session_start();
if(!isset($_SESSION['$id_login'])){
  session_destroy();
  header("location:../index.php");
}
?>