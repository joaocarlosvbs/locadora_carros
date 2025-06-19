<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/MODEL/usuario.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/DAL/usuario.php';

$usuario = new \MODEL\Usuario();
$usuario->setUsuario($_POST['usuario']);
$usuario->setSenha(md5($_POST['senha'])); // Criptografa a senha

$dalUsuario = new \DAL\UsuarioDAL();
$dalUsuario->Insert($usuario);

header("location: lstUsuario.php");
?>