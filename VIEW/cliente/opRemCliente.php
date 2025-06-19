<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/DAL/cliente.php';

$id = $_GET['id'];

$dalCliente = new \DAL\ClienteDAL();
$dalCliente->Delete($id);

header("location: lstCliente.php");
?>