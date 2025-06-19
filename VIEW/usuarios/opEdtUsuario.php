<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/MODEL/usuario.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/locadora_carros/DAL/usuario.php';

$usuario = new \MODEL\Usuario();
$usuario->setId($_POST['id']);
$usuario->setUsuario($_POST['usuario']);

// Apenas define a senha se uma nova foi digitada
if (!empty($_POST['senha'])) {
    $usuario->setSenha(md5($_POST['senha']));
}

$dalUsuario = new \DAL\UsuarioDAL();
$dalUsuario->Update($usuario);

header("location: lstUsuario.php");
?>