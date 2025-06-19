<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/MODEL/cliente.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/DAL/cliente.php';

$cliente = new \MODEL\Cliente();
$cliente->setId($_POST['id']);
$cliente->setNome($_POST['nome']);
$cliente->setCpf($_POST['cpf']);
$cliente->setTelefone($_POST['telefone']);
$cliente->setEmail($_POST['email']);

$dalCliente = new \DAL\ClienteDAL();
$dalCliente->Update($cliente);

header("location: lstCliente.php");
?>