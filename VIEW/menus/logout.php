<?php
session_start();
unset($_SESSION['login']);
header("location: /locadora_carros/VIEW/menus/index.php");
?>